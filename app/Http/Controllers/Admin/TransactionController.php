<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\NotificationController;
use App\Models\BankAccounts;
use Exception;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index($type = 'all')
    {
        return view('admin.transaction.index', compact('type'));
    }

    public function deposit(Request $request)
    {
//        Validate request
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'amount' => ['required'],
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Find user
        $user = User::all()->where('id', $request['user_id'])->first();
        if (!$user) {
            return back()->with('error', 'Can\'t process investment, user not found');
        }
        $request['amount'] = (int)(str_replace(",", "", $request['amount']));

//        Check for deposit method and process
        $user->wallet()->increment('balance', $request['amount']);
        $transaction = $user->transactions()->create([
            'type' => 'deposit', 'amount' => $request['amount'],
            'description' => 'Deposit by '.env('APP_NAME'),
            'method' => 'deposit' ,'status' => 'approved'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendDepositSuccessfulNotification($transaction);
            } catch(Exception $e) {
                logger($e->getMessage());
            }
            return redirect()->route('admin.users.show', $user['id'])->with('success', 'Deposit made successfully');
        }
        return redirect()->route('admin.users.show', $user['id'])->with('error', 'Error processing deposit');
    }

    public function withdraw(Request $request): \Illuminate\Http\RedirectResponse
    {
//        Validate request
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'amount' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Find user
        $user = User::all()->where('id', $request['user_id'])->first();
        if (!$user) {
            return back()->with('error', 'Can\'t process investment, user not found');
        }
        $request['amount'] = (int)(str_replace(",", "", $request['amount']));
//        Check if user has sufficient balance
        if (!$user->hasSufficientBalanceForTransaction($request['amount'])) return back()->withInput()->with('error', 'Insufficient wallet balance');
//        Process withdrawal
        $user->wallet()->decrement('balance', $request['amount']);
        $transaction = $user->transactions()->create([
            'type' => 'withdrawal', 'amount' => $request['amount'], 'method' => 'wallet',
            'description' => 'Withdrawal by '.env('APP_NAME'), 'status' => 'approved'
        ]);
        if ($transaction) {
            try {
                NotificationController::sendWithdrawalSuccessfulNotification($transaction);
            } catch (Exception $e) {
                logger($e->getMessage());
            }
            return redirect()->route('admin.users.show', $user['id'])->with('success', 'Withdrawal made successfully');
        }
        return redirect()->route('admin.users.show', $user['id'])->with('error', 'Error processing withdrawal');
    }

    public function approve(Transaction $transaction): \Illuminate\Http\RedirectResponse
    {
//        Check if transaction is pending
        if ($transaction['status'] != 'pending'){
            return back()->with('error', 'Transaction already processed');
        }
//        Process transaction based on type
        $user = $transaction['user'];
        switch ($transaction['type']){
            case 'deposit':
                $user->wallet()->increment('balance', (int)$transaction['amount']);
                try {
                    NotificationController::sendDepositSuccessfulNotification($transaction);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
                break;
            case 'withdrawal':
                try {
                    NotificationController::sendWithdrawalSuccessfulNotification($transaction);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
                break;
            case 'investment':
                if ($transaction['investment']){
                    $package = $transaction['investment']['package'];
                    if (Carbon::make($package['start_date'])->lt(now())) {
                        $startDate = now();
                    } else {
                        $startDate = $package['start_date'];
                    }
                    $transaction->investment()->update([
                        'investment_date' => now()->format('Y-m-d H:i:s'),
                        'payment'          => 'approved',
                        'status'          => 'active',
                        'start_date'      => $startDate
                    ]);
                    try {
                        NotificationController::sendInvestmentCreatedNotification($transaction['investment']);
                    } catch (Exception $e) {
                        logger($e->getMessage());
                    }
                }
                break;
        }
//        Update transaction
        if ($transaction->update(['status' => 'approved'])){
            return back()->with('success', 'Transaction approved successfully');
        }
        return back()->with('error', 'Error approving transaction');
    }

    public function decline(Transaction $transaction): \Illuminate\Http\RedirectResponse
    {
//        Check if transaction is pending
        if (!$transaction['status'] == 'pending'){
            return back()->with('error', 'Transaction already processed');
        }
//        Process transaction based on type
        $user = $transaction['user'];
        switch ($transaction['type']){
            case 'withdrawal':
                $user->wallet()->increment('balance', (int)$transaction['amount']);
                try {
                    NotificationController::sendWithdrawalCancelledNotification($transaction);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
                break;
            case 'deposit':
                try {
                    NotificationController::sendDepositCancelledNotification($transaction);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
                break;
            case 'investment':
                if ($transaction['investment']){
                    $transaction->investment()->update([
                        'payment' => 'declined',
                        'status'  => 'cancelled'
                    ]);
                    try {
                        NotificationController::sendInvestmentCancelledNotification($transaction['investment']);
                    } catch(Exception $e){
                        logger($e->getMessage());
                    }
                }
                break;
        }
//        Update transaction
        if ($transaction->update(['status' => 'declined'])){
            return back()->with('success', 'Transaction declined successfully');
        }
        return back()->with('error', 'Error declining transaction');
    }

    public function fetchTransactionsWithAjax(Request $request, $type)
    {
//        Define all column names
        $columns = [
            'id', 'name', 'amount', 'description', 'date', 'id', 'method', 'channel', 'status', 'action'
        ];
//        Find data based on page
        $transactions = Transaction::query()->latest();
        if (!in_array($type, ['all', 'pending'])) {
            $transactions = Transaction::query()->latest()->where('type', $type);
        }
        if ($type == 'pending') {
            $transactions = Transaction::query()->latest()->where('status', $type);
        }

//        Set helper variables from request and DB
        $totalData = $totalFiltered = $transactions->count();
        $limit = $request['length'];
        $start = $request['start'];
        $order = $columns[$request['order.0.column']];
        $dir = $request['order.0.dir'];
        $search = $request['search.value'];
//        Check if request wants to search or not and fetch data
        if(empty($search))
        {
            $transactions = $transactions->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $transactions = $transactions->where('description','LIKE',"%{$search}%")
                ->orWhereHas('user',function ($q) use ($search) { $q->where('first_name', 'LIKE',"%{$search}%")->orWhere('last_name', "%{$search}%"); })
                ->orWhere('type', 'LIKE',"%{$search}%")
                ->orWhere('amount', 'LIKE',"%{$search}%")
                ->orWhere('status', 'LIKE',"%{$search}%");
            $totalFiltered = $transactions->count();
            $transactions = $transactions->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
//        Loop through all data and mutate data
        $data = [];
        $i = $start + 1;
        foreach ($transactions as $transaction)
        {
            $status = $action = $disabled = $details = null;
            $bank = json_decode($transaction['preferred_bank'], true);
            if($transaction['type'] == 'withdrawal' && $bank){
                $bank_id = $bank['id'];
                $bank_detail = BankAccounts::find($bank_id);
                $bank_name = $bank_detail['bank_name'];
                $account_name = $bank_detail['account_name'];
                $account_number = $bank_detail['account_number'];
                $details = '<button data-bs-toggle="modal" onclick="populateTransactionDetails(\''.$account_name.'\', \''.$account_number.'\', \''.$bank_name.'\');" data-bs-target="#transactionDetailModal" class="btn btn-sm btn-primary" type="button">
                                View
                            </button>';
            }else{
                $details = '---';
            }
            if($transaction['status'] == 'approved'){
                $status = '<span class="badge badge-pill badge-success">Approved</span>';
                $disabled = 'disabled';
            }elseif ($transaction['status'] == 'pending') {
                $status = '<span class="badge badge-pill badge-warning">Pending</span>';
                // if (auth()->user()->can('Approve Transactions')){
                    $action .= '<div class="menu-item px-3">
                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'transactionApprove' . $transaction['id'] . '\')" href="' . route('admin.transactions.approve', $transaction['id']) . '"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Approve</span></a>
                            <form id="transactionApprove' . $transaction['id'] . '" action="' . route('admin.transactions.approve', $transaction['id']) . '" method="POST">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="PUT">
                            </form>
                        </div>';
                // }
                // if (auth()->user()->can('Decline Transactions')) {
                    $action .= '<div class="menu-item px-3">
                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'transactionDecline' . $transaction['id'] . '\')" href="' . route('admin.transactions.decline', $transaction['id']) . '"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Decline</span></a>
                            <form id="transactionDecline' . $transaction['id'] . '" action="' . route('admin.transactions.decline', $transaction['id']) . '" method="POST">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="PUT">
                            </form>
                        </div>';
                // }
                // if (!auth()->user()->can('Approve Transactions') && !auth()->user()->can('Decline Transactions')){
                    // $disabled = 'disabled';
                // }
            }elseif ($transaction['status'] == 'declined'){
                $status = '<span class="badge badge-pill badge-danger">Declined</span>';
                $disabled = 'disabled';
            }
            $datum['sn'] = '<span class="text-dark fw-bolder ps-4 d-block mb-1 fs-6">' . $i . '</span>';
            // if (auth()->user()->can('View Users')){
                $datum['name'] = '<a class="text-primary-700 text-hover-primary fw-bolder d-block fs-6" style="white-space: nowrap;" href="'.route('admin.users.show', $transaction->user['id']).'">'.ucwords($transaction->user['name']).'</a>';
            // }else{
            //     $datum['name'] = ucwords($transaction->user['name']);
            // }
            $datum['amount'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦ '.number_format((int)$transaction['amount']).'</span>';
            $datum['description'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$transaction['description'].'</span>';
            $datum['date'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">'.$transaction['created_at']->format('M d, Y \a\t h:i A').'</span>';
            $datum['details'] = '<span class="text-gray-600 fw-bolder d-block fs-6 text-center">'.$details.'</span>';
            $datum['method'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$transaction['method'].'</span>';
            $datum['channel'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$transaction['channel'].'</span>';
            $datum['status'] = $status;
            $datum['action'] = '<a href="javascript:void();" class="btn btn-sm btn-light-primary btn-active-primary '.$disabled.'" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end" style="white-space: nowrap;">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">'
                                    .$action.'
                                </div>';
            $data[] = $datum;
            $i++;
        }
//      Ready results for datatable
        $res = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo json_encode($res);
    }
}
