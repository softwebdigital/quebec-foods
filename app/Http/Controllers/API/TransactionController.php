<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OnlinePaymentController;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\StoreWithdrawalRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Setting;
use App\Models\Transaction;
use App\Notifications\WithdrawalTokenNotification;
use App\Repositories\TransactionRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function __construct(protected TransactionRepository $transactionRepository)
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        $type = request()->input('type');
        return $this->success(
            data: TransactionResource::collection($this->transactionRepository->getForUser(type: $type)),
            meta: $this->transactionRepository->getMeta(type: $type)
        );
    }

    public function show(Transaction $transaction): JsonResponse
    {
        Gate::authorize('view', $transaction);
        return $this->success(data: new TransactionResource($transaction));
    }

    public function wallet(): JsonResponse
    {
        return $this->success(data: [
            'balance' => round(request()->user()->wallet?->balance, 2),
            'history' => TransactionResource::collection($this->transactionRepository->getWalletHistory(per_page: 10))
        ]);
    }

    public function walletHistory(): JsonResponse
    {
        return $this->success(data: TransactionResource::collection($this->transactionRepository->getWalletHistory()));
    }

    public function deposit(StoreDepositRequest $request): JsonResponse
    {
        $data = $request->validated();
        if ($data['payment'] == 'card') {
            $data['type'] = 'deposit';
            return OnlinePaymentController::initializeOnlineTransaction($data['amount'], $data, $request->input('gateway'), $request->input('currency'), true);
        }
        $transaction = $this->transactionRepository->create([
            'user_id' => auth()->id(), 'type' => 'deposit', 'amount' => $request['amount'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($request['amount'], auth()->user()),
            'method' => $request['payment'], 'channel' => 'mobile',
            'description' => 'Deposit', 'status' => 'pending'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendDepositQueuedNotification($transaction);
            } catch(Exception $e) {
                logger("Deposit Error: " . $e->getMessage());
            }
            return $this->success(
                'Deposit queued successfully!',
                new TransactionResource($this->transactionRepository->find($transaction['id'])));
        }
        return $this->failure('Error processing deposit!', status: 400);
    }

    public function sendWithdrawalToken(): JsonResponse
    {
        $user = request()->user();
        if (!$user->hasSufficientBalanceForTransaction(request()->input('amount')))
            return $this->failure('Insufficient wallet balance!', status: 400);
        $user->generateWithdrawalToken();
        $user->notify(new WithdrawalTokenNotification);
        return $this->success('A withdrawal token has been sent to your mail!');
    }

    public function withdraw(StoreWithdrawalRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $request->user();
        if (!$user->documents()->where('status', 'approved')->exists())
            return $this->failure('Identity not verified!', status: 400);

        if ($data['token'] != $user->withdrawal_otp)
            return $this->failure('The withdrawal token is invalid!', status: 400);

        if (Carbon::parse($user->withdrawal_otp_expiry)->lt(now()))
            return $this->failure('The withdrawal token has expired!', status: 400);

        $user->resetWithdrawalToken();
        // Check if withdrawal is allowed
        if (Setting::query()->first()['withdrawal'] == 0)
            return $this->failure('Withdrawal from wallet is currently unavailable, check back later', status: 400);

        // Check if user has sufficient balance
        if (!$user->hasSufficientBalanceForTransaction($data['amount']))
            return $this->failure('Insufficient wallet balance!', status: 400);

        // Process withdrawal
        $user->wallet()->decrement('balance', $data['amount']);
        $bank = $user->bankAccounts()->where('id', $data['account'])->first();
        $transaction = $this->transactionRepository->create([
            'user_id' => $user->id, 'type' => 'withdrawal', 'amount' => $data['amount'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($data['amount'], $user),
            'method' => 'wallet', 'channel' => 'mobile',
            'preferred_bank' => json_encode($bank),
            'description' => 'Withdrawal', 'status' => 'pending'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendWithdrawalQueuedNotification($transaction);
            } catch(Exception $e) {
                logger($e->getMessage());
            }
            return $this->success('Withdrawal queued successfully!');
        }
        return $this->failure('Error processing withdrawal!', status: 400);
    }
}
