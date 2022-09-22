<?php

namespace App\Http\Controllers\Admin;

use App\Models\Referral;
use App\Models\User;
use App\Models\Package;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\NotificationController;
use Exception;

class InvestmentController extends Controller
{
    public function index()
    {
        return view('admin.investment.index');
    }

    public function show($type, Investment $investment, $filter = 'all')
    {
        $packages = Package::where('status', 'open')->get();
        return view('admin.investment.show', compact('type', 'filter', 'investment', 'packages'));
    }

    public function invest(User $user)
    {
        return view('admin.user.investment.add', ['packages' => Package::where('investment', 'enabled')->get(), 'user' => $user]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //        Validate request
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'package' => ['required'],
            'slots' => ['required', 'numeric', 'min:1', 'integer'],
            'payment' => ['required']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
//        Find package and check if investment is enabled
        $package = Package::all()->where('name', $request['package'])->first();
        if (!($package && $package->canRunInvestment())){
            return back()->with('error', 'Can\'t process investment, package not found or disabled');
        }
//        Find user
        $user = User::all()->where('id', $request['user_id'])->first();
        if (!$user) {
            return back()->with('error', 'Can\'t process investment, user not found');
        }
//        Process investment based on payment method
        if ($request['payment'] == 'wallet'){
            if (!$user->hasSufficientBalanceForTransaction($request['slots'] * $package['price'])){
                return back()->withInput()->with('error', 'Insufficient wallet balance');
            }
            $user->wallet()->decrement('balance', $request['slots'] * $package['price']);
        }
//        Create Investment
        $investment = $user->investments()->create([
            'package_id'=>$package['id'], 'slots' => $request['slots'], 'amount' => $request['slots'] * $package['price'],
            'total_return' => $request['slots'] * $package['price'] * (( 100 + $package['roi'] ) / 100 ),
            'investment_date' => now()->format('Y-m-d H:i:s'),
            'amount_in_naira' => \App\Http\Controllers\OnlinePaymentController::getAmountInNaira($request['slots'] * $package['price']),
            'return_date' => now()->addMonths($package['duration'])->format('Y-m-d H:i:s'), 'status' => 'active'
        ]);
        if ($investment) {
            try {
                self::processReferral($user, $investment['amount']);
                \App\Http\Controllers\TransactionController::storeInvestmentTransaction($investment, $request['payment'], true);
                NotificationController::sendInvestmentCreatedNotification($investment);
            } catch(Exception $e) {
                logger($e->getMessage());
            }
            return redirect()->route('admin.users.show', $user['id'])->with('success', 'Investment created successfully');
        }
        return back()->withInput()->with('error', 'Error processing investment');
    }

    public function showUserInvestment(User $user, $type, Investment $investment,  $filter = "all")
    {
        $packages = Package::all();
        return view('admin.user.showInvestments', compact('user', 'investment', 'packages', 'type', 'filter'));
    }

    public function fetchInvestmentsWithAjax(Request $request, $type, $filter)
    {
        //        Define all column names
        $columns = [
            'investments.created_at', 'users.first_name', 'packages.name', 'investments.slots', 'investments.amount', 'investments.total_return', 'investments.investment_date', 'investments.payment', 'investments.status', 'investments.created_at'
        ];
//        Find data based on page
        $investments = Investment::query()
                                    ->join('users', 'users.id', '=', 'investments.user_id')
                                    ->join('packages', 'packages.id', '=', 'investments.package_id')
                                    ->select('investments.*');
        if ($type !== 'all') {
            $investments->whereHas('package', function($query) use ($type) {
                $query->where('type', $type);
            });
        }
        if ($filter !== 'all') {
            $investments->where('investments.status', $filter);
        }
//        Set helper variables from request and DB
        $totalData = $totalFiltered = $investments->count();
        $limit = $request['length'];
        $start = $request['start'];
        $order = $columns[$request['order.0.column']];
        $dir = $request['order.0.dir'];
        $search = $request['search.value'];
        if ($request['draw'] == '1')  $dir = 'desc';
//        Check if request wants to search or not and fetch data
        if(empty($search))
        {
            $investments = $investments->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $investments = $investments->whereHas('user',function ($q) use ($search) { $q->where('first_name', 'LIKE',"%{$search}%")->orWhere('last_name', 'LIKE', "%{$search}"); })
                ->orWhereHas('package',function ($q) use ($search) { $q->where('name', 'LIKE',"%{$search}%"); })
                ->orWhere('investments.slots', 'LIKE',"%{$search}%")
                ->orWhere('investments.status', 'LIKE',"%{$search}%")
                ->orWhere('investments.total_return', 'LIKE',"%{$search}%")
                ->orWhere('investments.amount', 'LIKE',"%{$search}%");
            $totalFiltered = $investments->count();
            $investments = $investments->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
//        Loop through all data and mutate data
        $data = [];
        $i = $start + 1;
        foreach ($investments as $investment)
        {
            $status = $action = $payment = null;
            if($investment['status'] == 'active'){
                $status = '<span class="badge badge-pill badge-success">Active</span>';
            }elseif ($investment['status'] == 'pending'){
                $status = '<span class="badge badge-pill badge-warning">Pending</span>';
            }elseif ($investment['status'] == 'cancelled'){
                $status = '<span class="badge badge-pill badge-danger">Cancelled</span>';
            }elseif ($investment['status'] == 'settled'){
                $status = '<span class="badge badge-pill badge-secondary">Settled</span>';
            }

            if($investment['payment'] == 'approved'){
                $payment = '<span class="badge badge-pill badge-success">Approved</span>';
            }elseif ($investment['payment'] == 'pending'){
                $payment = '<span class="badge badge-pill badge-warning">Pending</span>';
                $action .= '<div class="menu-item px-3">
                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'transactionApprove' . $investment['id'] . '\')" href="' . route('admin.transactions.approve', $investment['initial_transaction']['id']) . '"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Approve</span></a>
                            <form id="transactionApprove' . $investment['id'] . '" action="' . route('admin.transactions.approve', $investment['initial_transaction']['id']) . '" method="POST">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="PUT">
                            </form>
                        </div>';

                $action .= '<div class="menu-item px-3">
                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'transactionDecline' . $investment['id'] . '\')" href="' . route('admin.transactions.approve', $investment['initial_transaction']['id']) . '"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Decline</span></a>
                            <form id="transactionDecline' . $investment['id'] . '" action="' . route('admin.transactions.decline', $investment['initial_transaction']['id']) . '" method="POST">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="PUT">
                            </form>
                        </div>';
                if (!auth()->user()->can('Approve Transactions') && !auth()->user()->can('Decline Transactions')){
                    $action = null;
                }
            }elseif ($investment['payment'] == 'declined'){
                $payment = '<span class="badge badge-pill badge-danger">Declined</span>';
            }

            $datum['sn'] = $i;
            if (auth()->user()->can('View Users')){
                $datum['name'] = '<a class="text-primary-700 text-hover-primary fw-bolder d-block fs-6 text-nowrap" href="'.route('admin.users.show', $investment->user['id']).'">'.ucwords($investment->user['name']).'</a>';
            }else{
                $datum['name'] = '<span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">'.ucwords($investment->user['name']).'</span>';
            }
            $datum['package'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$investment->package['name'].'</span>';
            $datum['slots'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$investment['slots'].'</span>';
            $datum['total_invested'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">' . getCurrency() .' '.number_format($investment['amount']).'</span>';
            $datum['expected_returns'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">' . getCurrency() .' '.number_format($investment['total_return']).'</span>';
            $datum['investment_date'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">'.$investment->investment_date->format('M d, Y').'</span>';
            $datum['status'] = $status;
            $datum['payment'] = $payment;
            $datum['action'] = '<a href="javascript:void();" class="btn btn-sm btn-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end" style="white-space: nowrap;">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" href="'.route('admin.investments.show', ['investment' => $investment['id'], 'type' => $type]).'"><span class="">View</span></a>
                                    </div>'
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

    public static function processReferral($user, $amount): bool
    {
        $referral = Referral::where('referred_id', $user['id'])->where('paid', false)->first();
        $referee = $referral->referee;
        if ($referral && $referee && $user->investments()->count() <= 1 && $amount >= 1000) {
            $transaction =  $referee->transactions()->create([
                'type' => 'deposit', 'amount' => 50,
                'method' => 'deposit',
                'amount_in_naira' => \App\Http\Controllers\OnlinePaymentController::getAmountInNaira(50),
                'description' => 'Referral', 'status' => 'approved'
            ]);
            if ($transaction) {
                $referee->wallet()->increment('balance', 50);
                $referral->update(['paid' => true]);
                try {
                    NotificationController::sendReferralTransactionNotification($transaction);
                } catch (Exception $e) {
                    logger($e->getMessage());
                }
                return true;
            }
            return false;
        }
        return false;
    }
}
