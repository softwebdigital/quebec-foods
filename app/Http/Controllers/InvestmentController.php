<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Setting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\InternationalBank;
use App\Models\Investment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;
use Illuminate\Support\Carbon;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($type)
    {
        $investments = auth()->user()->investments()->latest()->whereHas('package', function($query) use ($type) {
            $query->where('type', $type);
        })->get();
        return view('user.investments.index', compact('investments', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'package' => ['required', 'exists:packages,name'],
            'slots' => ['required', 'numeric', 'min:1', 'integer'],
            'payment' => ['required'],
            'gateway' => ['required_if:payment,card'],
            'currency' => ['required_if:payment,card', 'in:NGN,USD']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Check if investment is allowed
        if (Setting::all()->first()['invest'] == 0){
            return back()->with('error', 'Investment in packages is currently unavailable, check back later');
        }
        // Find package and check if investment is enabled
        $package = Package::all()->where('name', $request['package'])->first();
        if (!($package && $package->canRunInvestment())){
            return back()->with('error', 'Can\'t process investment, package not found, disabled or closed');
        }
        // Check if package is sold out.
        if ($package->type == "farm" && $package->available_slots < $request->slots) {
            return back()->with('error', "Can't process investment, not enough available slots ({$package->available_slots} left)");
        }
        // Process investment based on payment method
        switch ($request['payment']){
            case 'wallet':
                if (!auth()->user()->hasSufficientBalanceForTransaction($request['slots'] * $package['price'])){
                    return back()->withInput()->with('error', 'Insufficient wallet balance');
                }
                auth()->user()->wallet()->decrement('balance', $request['slots'] * $package['price']);
                $payment = 'approved';
                $msg = 'Investment created successfully';
                break;
            case 'deposit':
                $payment = 'pending';
                $msg = 'Investment queued successfully';
                break;
            case 'card':
                $data = ['type' => 'investment', 'package' => $package, 'slots' => $request['slots']];
                return OnlinePaymentController::initializeOnlineTransaction($request['slots'] * $package['price'], $data, $request['gateway'], $request['currency']);
            default:
                return back()->withInput()->with('error', 'Invalid payment method');
        }
//        Create Investment
        if ($package->type == 'farm') {
            $returns = $request['slots'] * $package['price'] * (( 100 + $package['roi'] ) / 100 );
        } else {
            $returns = $package->getPlantTotalROI($request['slots'] * $package['price']);
        }
        if (Carbon::make($package['start_date'])->lt(now())) {
            $startDate = now();
        } else {
            $startDate = $package['start_date'];
        }
        $investment = auth()->user()->investments()->create([
            'package_id'=>$package['id'], 'slots' => $request['slots'],
            'amount' => $request['slots'] * $package['price'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($request['slots'] * $package['price']),
            'total_return' => $returns,
            'investment_date' => now()->format('Y-m-d H:i:s'),
            'rollover' => isset($request['rollover']) && $request['rollover'] == 'yes',
            'start_date' => $startDate, 'payment' => $payment,
            'package_data' => json_encode($package)
        ]);
        if ($investment) {
            TransactionController::storeInvestmentTransaction($investment, $request['payment']);
            if ($investment['payment'] == 'approved'){
                Admin\InvestmentController::processReferral(auth()->user(), $investment);
                NotificationController::sendInvestmentCreatedNotification($investment);
            }else{
                NotificationController::sendInvestmentQueuedNotification($investment);
            }
            return redirect()->route('investments', ['filter' => 'all', 'type' => $package['type']])->with('success', $msg);
        }
        return back()->withInput()->with('error', 'Error processing investment');
    }

    /**
     * Display the specified resource.
     *
     * @param Investment $investment
     * @return Renderable
     */
    public function show(Investment $investment)
    {
        $packages = Package::where('status', 'open')->get();
        return view('user.investments.show', compact('investment', 'packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Investment $investment
     * @return Response
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInvestmentRequest $request
     * @param Investment $investment
     * @return Response
     */
    public function update(UpdateInvestmentRequest $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Investment $investment
     * @return Response
     */
    public function destroy(Investment $investment)
    {
        //
    }

    public function invest($type)
    {
        $setting = Setting::all()->first();
        $international = InternationalBank::all()->first();
        $packages = Package::all()->where('status', 'open')->where('type', $type);
        return view('user.investments.create', compact('packages', 'setting', 'type', 'international'));
    }

    public function showUserInvestment($type, Investment $investment, $filter = 'all')
    {
        $user = auth()->user();
        $packages = Package::all();
        return view('user.profile.showInvestment', compact('user', 'type', 'packages', 'investment', 'filter'));
    }

    public function updateRollover (Request $request, Investment $investment)
    {
        if (auth()->id() != $investment["user_id"]) {
            return back()->with('error', 'Investment not found');
        }
        $data['rollover'] = isset($request['rollover']) && $request['rollover'] == 'yes';
        if($investment->update($data)) {
            return redirect()->route('investments.show', ['type' => $request->type, 'investment' => $investment['id']])->with('success', 'Rollover updated successfully');
        }
        return back()->with('error', 'Error updating rollover status');
    }
}
