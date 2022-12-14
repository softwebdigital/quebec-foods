<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OnlinePaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Resources\InvestmentResource;
use App\Repositories\InvestmentRepository;
use App\Repositories\PackageRepository;
use Illuminate\Http\JsonResponse;
use App\Models\Investment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class InvestmentController extends Controller
{
    public function __construct(
        protected InvestmentRepository $investmentRepository,
        protected PackageRepository $packageRepository
    ) {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        $status = request()->input('status');
        $type = request()->input('type');
        return $this->success(data: InvestmentResource::collection($this->investmentRepository->getForUser(type: $type, status: $status)));
    }

    public function store(StoreInvestmentRequest $request)//: JsonResponse
    {
        $data = $request->validated();
        // Check if investment is allowed
        if (!investment_enabled())
            return $this->failure('Investment in packages is currently unavailable, check back later.', status:400);
        // Find package and check if investment is enabled
        $package = $this->packageRepository->find($data['package']);
        if (!($package && $package->canRunInvestment()))
            return $this->failure('Can\'t process investment!', 'Package is either not found, disabled or closed.', 400);
        // Check if package is sold out.
        if ($package['type'] == "farm" && $package['available_slots'] < $data['slots'])
            return $this->failure('Can\'t process investment!', "Insufficient slots ({$package['available_slots']} left).", 400);
        // Process investment based on payment method
        switch ($data['payment']) {
            case 'deposit':
                $payment = 'pending';
                $msg = 'Investment queued successfully';
                break;
            case 'wallet':
                if (!$request->user()->hasSufficientBalanceForTransaction($data['slots'] * $package['price']))
                    return $this->failure('Insufficient wallet balance!', status: 400);
                $request->user()->wallet()->decrement('balance', $data['slots'] * $package['price']);
                $payment = 'approved';
                $msg = 'Investment created successfully!';
                break;
            case 'card':
                $data = ['type' => 'investment', 'package' => $package, 'slots' => $data['slots']];
                return OnlinePaymentController::initializeOnlineTransaction($data['slots'] * $package['price'], $data, $request->input('gateway'), $request->input('currency'), true);
            default:
                return $this->failure('Invalid payment method',  status: 400);
        }
        // Create Investment
        if ($package['type'] == 'farm')
            $returns = $data['slots'] * $package['price'] * ((100 + $package['roi']) / 100 );
        else
            $returns = $package->getPlantTotalROI($data['slots'] * $package['price']);

        $startDate = Carbon::make($package['start_date'])->lt(now()) ? now() : $package['start_date'];
        $investment = $this->investmentRepository->create([
            'user_id' => $request->user()->id, 'package_id'=>$package['id'],
            'slots' => $data['slots'], 'amount' => $data['slots'] * $package['price'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($data['slots'] * $package['price']),
            'total_return' => $returns, 'investment_date' => now()->format('Y-m-d H:i:s'),
            'rollover' => isset($data['rollover']) && $data['rollover'] == true,
            'start_date' => $startDate, 'payment' => $payment,
            'package_data' => json_encode($package)
        ]);
        if ($investment) {
            TransactionController::storeInvestmentTransaction($investment, $data['payment']);
            if ($investment['payment'] == 'approved') {
                \App\Http\Controllers\Admin\InvestmentController::processReferral($request->user(), $investment);
                NotificationController::sendInvestmentCreatedNotification($investment);
            }
            else NotificationController::sendInvestmentQueuedNotification($investment);
            return $this->success($msg, new InvestmentResource($this->investmentRepository->find($investment['id'])));
        }
        return $this->failure('Error processing investment!', status: 400);
    }

    public function show(Investment $investment): JsonResponse
    {
        Gate::authorize('view', $investment);
        return $this->success(data: new InvestmentResource($investment));
    }
}
