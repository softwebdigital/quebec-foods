<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
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
            'payment' => ['required']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        $request['amount'] = (int)(str_replace(",", "", $request['amount']));

        // Check for deposit method and process
        if ($request['payment'] == 'card') {
            $data = ['type' => 'deposit'];
            return OnlinePaymentController::initializeOnlineTransaction($request['amount'], $data);
        }
        $transaction = auth()->user()->transactions()->create([
            'type' => 'deposit', 'amount' => $request['amount'],
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
            'method' => 'wallet', 'channel' => 'web',
            'status' => 'approved'
        ]);
    }

    public function withdraw(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'amount' => ['required'],
            'account' => ['required']
        ]);

        $request['amount'] = (int)(str_replace(",", "", $request['amount']));

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Check if withdrawal is allowed
        if (Setting::all()->first()['withdrawal'] == 0){
            return back()->with('error', 'Withdrawal from wallet is currently unavailable, check back later');
        }
        // Check if user has sufficient balance
        if (!auth()->user()->hasSufficientBalanceForTransaction((int)$request['amount'])) return back()->withInput()->with('error', 'Insufficient wallet balance');
        // Process withdrawal
        auth()->user()->wallet()->decrement('balance', (int)$request['amount']);
        $bank = auth()->user()->bankAccounts()->where('id', $request['account'])->first();
        $transaction = auth()->user()->transactions()->create([
            'type' => 'withdrawal', 'amount' => (int)$request['amount'],
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
