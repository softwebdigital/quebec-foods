<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Setting;
use App\Models\InternationalBank;
use App\Notifications\WithdrawalTokenNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = auth()->user()->transactions()->latest()->get();
        return view('user.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }


    public function deposit(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'amount' => ['required'],
            'payment' => ['required'],
            'gateway' => ['required_if:payment,card'],
            'currency' => ['required_if:payment,card', 'in:NGN,USD']
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        $request['amount'] = (int)(str_replace(",", "", $request['amount']));

        // Check for deposit method and process
        if ($request['payment'] == 'card') {
            $data = ['type' => 'deposit'];
            return OnlinePaymentController::initializeOnlineTransaction($request['amount'], $data, $request['gateway'], $request['currency']);
        }
        $transaction = auth()->user()->transactions()->create([
            'type' => 'deposit', 'amount' => $request['amount'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($request['amount'], auth()->user()),
            'method' => $request['payment'],
            'description' => 'Deposit', 'status' => 'pending'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendDepositQueuedNotification($transaction);
            } catch(Exception $e) {
                logger($e->getMessage());
            }
            return redirect()->route('wallet')->with('success', 'Deposit queued successfully');
        }
        return redirect()->route('wallet')->with('error', 'Error processing deposit');
    }

    public static function storeInvestmentTransaction($investment, $method, $byCompany = false, $channel = 'web')
    {
        $desc = !$byCompany ? 'Investment' : 'Investment by '.env('APP_NAME');
        Transaction::create([
            'investment_id' => $investment['id'],
            'user_id' => $investment->user['id'], 'type' => 'investment',
            'amount' => $investment['amount'], 'description' => $desc,
            'amount_in_naira' => $investment['amount_in_naira'],
            'method' => $method, 'channel' => $channel,
            'status' => $investment['payment'] == 'approved' ? 'approved' : 'pending'
        ]);
    }

    public static function storeInvestmentPayoutTransaction($investment, $amount)
    {
        Transaction::create([
            'investment_id' => $investment['id'],
            'user_id' => $investment->user['id'], 'type' => 'payout',
            'amount' => $amount, 'description' => "Payout",
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($amount, $investment->user),
            'method' => 'wallet', 'channel' => 'web',
            'status' => 'approved'
        ]);
    }

    public function withdrawalToken(Request $request) {
        $user = auth()->user();
        $user->generateWithdrawalToken();
        $user->notify(new WithdrawalTokenNotification());
        return response()->json(['success' => true]);
    }

    public function withdraw(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'amount' => ['required'],
            'account' => ['required'],
            'input1' => ['required', 'integer'],
            'input2' => ['required', 'integer'],
            'input3' => ['required', 'integer'],
            'input4' => ['required', 'integer'],
            'input5' => ['required', 'integer'],
            'input6' => ['required', 'integer'],
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }

        if (!auth()->user()->documents()->where('status', 'approved')->exists()) {
            return redirect()->back()->with('error', 'Identity not verified');
        }

        $request['amount'] = (int)(str_replace(",", "", $request['amount']));
        $user = auth()->user();
        $token = $request['input1'].$request['input2'].$request['input3'].$request['input4'].$request['input5'].$request['input6'];

        if ($token != $user->withdrawal_otp) {
            return redirect()->back()->with('error', 'The withdrawal token you entered does not match');
        }

        if (Carbon::parse($user->withdrawal_otp_expiry)->lt(now())) {
            return redirect()->back()->with('error', 'The withdrawal token you entered has expired');
        }

        $user->resetWithdrawalToken();
        // Check if withdrawal is allowed
        if (Setting::all()->first()['withdrawal'] == 0){
            return back()->with('error', 'Withdrawal from wallet is currently unavailable, check back later');
        }
        // Check if user has sufficient balance
        if (!auth()->user()->hasSufficientBalanceForTransaction($request['amount'])) return back()->withInput()->with('error', 'Insufficient wallet balance');
        // Process withdrawal
        auth()->user()->wallet()->decrement('balance', $request['amount']);
        $bank = auth()->user()->bankAccounts()->where('id', $request['account'])->first();
        $transaction = auth()->user()->transactions()->create([
            'type' => 'withdrawal', 'amount' => $request['amount'],
            'amount_in_naira' => OnlinePaymentController::getAmountInNaira($request['amount'], auth()->user()),
            'method' => 'wallet',
            'preferred_bank' => json_encode($bank),
            'description' => 'Withdrawal', 'status' => 'pending'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendWithdrawalQueuedNotification($transaction);
            } catch(Exception $e) {
                logger($e->getMessage());
            }
            return redirect()->route('wallet')->with('success', 'Withdrawal queued successfully');
        }
        return redirect()->route('wallet')->with('error', 'Error processing withdrawal');
    }
}
