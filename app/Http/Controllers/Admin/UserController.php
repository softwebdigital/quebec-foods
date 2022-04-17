<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function showUserInvestments (User $user, $type)
    {
        $investments = $user->investments()->whereHas('package', function ($query) use ($type) {
            $query->where('type', $type);
        })->latest()->get();
        return view('admin.user.investments', compact('user', 'investments', 'type'));
    }

    public function showTransactions (User $user)
    {
        $transactions = $user->transactions()->latest()->get();
        return view('admin.user.transactions', compact('user', 'transactions'));
    }

    public function showWallet (User $user)
    {
        $setting = Setting::all()->first();

        $pendingTransactions = $user->transactions()->where('status', 'pending');
        $investments = $user->investments()->where('payment', 'approved');
        $activeInvestments = $user->investments()->where('status', 'active');
        $pendingInvestments = $user->investments()->where('status', 'pending');

        $data = [
            'investments' => [
                'activeInvestments'   => HomeController::formatHumanFriendlyNumber($activeInvestments->sum('amount')),
                'pendingInvestments'   => HomeController::formatHumanFriendlyNumber($pendingInvestments->sum('amount')),
            ],
            'transactions' => HomeController::formatHumanFriendlyNumber($pendingTransactions->sum('amount')),
            'wallet'       => $user->wallet->balance,
        ];
        return view('admin.user.wallet', compact('user', 'setting', 'data'));
    }

    public function showReferrals (User $user)
    {
        return view('admin.user.referrals', ['user' => $user]);
    }

    public function block(User $user): \Illuminate\Http\RedirectResponse
    {
//        if user is blocked
        if ($user['active'] == 0){
            return back()->with('error', 'Can\'t block user, user already blocked');
        }
//        block user
        if ($user->update(['active' => 0])){
            return back()->with('success', 'User blocked successfully');
        }
        return back()->with('error', 'Error blocking user');
    }

    public function unblock(User $user): \Illuminate\Http\RedirectResponse
    {
//        if user is active
        if ($user['active'] == 1){
            return back()->with('error', 'Can\'t unblock user, user already active');
        }
//        unblock user
        if ($user->update(['active' => 1])){
            return back()->with('success', 'User unblocked successfully');
        }
        return back()->with('error', 'Error unblocking user');
    }

    public function destroy(User $user)
    {
        $user->transactions()->delete();
        $user->investments()->delete();
        $user->wallet()->delete();
        $user->onlinepayments()->delete();
        $user->referrals()->delete();
        $user->delete();
        return redirect('/admin/users')->with('success', 'User deleted successfully');
    }

    public function fetchUsersWithAjax(Request $request, $type, $status)
    {
//        Define all column names
        $columns = [
            'created_at', 'first_name', 'email', 'phone', 'email_verified_at', 'created_at', 'active', 'created_at'
        ];
//        Find data based on page
        switch ($type){
            case 'verified':
                $users = User::query()->whereNotNull('email_verified_at');
                break;
            case 'unverified':
                $users = User::query()->whereNull('email_verified_at');
                break;
            default:
                $users = User::query();
        }
        if ($status == 'active') {
            $users->where('active', 1);
        } else if ($status == 'blocked') {
            $users->where('active', 0);
        }
//        Set helper variables from request and DB
        $totalData = $totalFiltered = $users->count();
        $limit = $request['length'];
        $start = $request['start'];
        $order = $columns[$request['order.0.column']];
        $dir = $request['order.0.dir'];
        $search = $request['search.value'];
        if ($request['draw'] == '1')  $dir = 'desc';
//        Check if request wants to search or not and fetch data
        if(empty($search))
        {
            $users = $users->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $users = $users->where('email','LIKE',"%{$search}%")
                ->orWhere('first_name', 'LIKE',"%{$search}%")
                ->orWhere('phone', 'LIKE',"%{$search}%")
                ->orWhere('last_name', 'LIKE',"%{$search}%");
            $totalFiltered = $users->count();
            $users = $users->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
//        Loop through all data and mutate
        $data = [];
        $i = $start + 1;
        foreach ($users as $user)
        {
            $action = '';
            if (auth()->user()->can('View Transactions')) {
                $action .= '<div class="menu-item px-3">
                    <a class="menu-link px-3" href="/admin/users/'.$user['id'].'/transactions"><span class="">Transactions</span></a>
                </div>';
            }
            if (auth()->user()->can('View Investments')) {
                $action .= '<div class="menu-item px-3">
                        <div class="menu-link px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                            Investments
                            <span class="svg-icon svg-icon-5 ms-3 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="/admin/users/'.$user['id'].'/plant/investments" class="menu-link px-3">
                                    Processing Plants
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="/admin/users/'.$user['id'].'/farm/investments" class="menu-link px-3">
                                    Farms
                                </a>
                            </div>
                        </div>
                    </div>';
            }
            if (auth()->user()->can('View Referrals')) {
                $action .= '<div class="menu-item px-3">
                <a class="menu-link px-3" href="/admin/users/'.$user['id'].'/referrals"><span class="">Referrals</span></a>
            </div>';
            }
            if ($user['active'] == 1){
                if (auth()->user()->can('Block Users')) {
                    $action .= '<div class="menu-item px-3">
                                    <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'userBlock'.$user['id'].'\')" href="'.route('admin.users.block', $user['id']).'"><span class="">Block</span></a>
                                </div>
                                <form id="userBlock'.$user['id'].'" action="'.route('admin.users.block', $user['id']).'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="PUT">
                                </form>';
                }
            }else{
                if (auth()->user()->can('Unblock Users')) {
                    $action .= '<div class="menu-item px-3">
                                    <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'userUnblock'.$user['id'].'\')" href="'.route('admin.users.unblock', $user['id']).'"><span class="">Unblock</span></a>
                                </div>
                                <form id="userUnblock'.$user['id'].'" action="'.route('admin.users.unblock', $user['id']).'" method="POST">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <input type="hidden" name="_method" value="PUT">
                                </form>';
                }
            }
            $datum['sn'] = '<span class="text-dark fw-bolder ps-4 d-block mb-1 fs-6">' . $i . '</span>';
            $datum['name'] = '<a href="'.route('admin.users.show', $user['id']).'" class="text-primary-700 text-hover-primary fw-bolder d-block fs-6" style="white-space: nowrap;">'.ucwords($user['first_name']).' '.ucwords($user['last_name']).'</a>';
            $datum['email'] = '<span class="text-gray-600 fw-bolder d-block fs-6">' . $user['email'] . '</span>';
            $datum['phone'] = '<span class="text-gray-600 fw-bolder d-block fs-6">' . $user['phone'] ?? '---' . '</span>';
            $datum['joined'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">' . $user['created_at']->format('F d, Y') . '</span>';
            $datum['verification'] = $user['email_verified_at'] ? '<span class="badge badge-pill badge-success">Verified</span>' : '<span class="badge badge-pill badge-warning">Unverified</span>';
            $datum['status'] = $user['active'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Blocked</span>';
            $datum['action'] = '<a href="javascript:void();" class="btn btn-sm btn-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end" style="white-space: nowrap;">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" href="'.route('admin.users.show', $user['id']).'"><span class="">View User</span></a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" href="/admin/users/'.$user['id'].'/wallet"><span class="">Wallet</span></a>
                                    </div>'.
                                    $action.'
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
