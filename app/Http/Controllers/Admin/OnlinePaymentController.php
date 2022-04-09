<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OnlinePaymentController extends Controller
{
    public function index () {
        return view('admin.onlinepayment.index');
    }

    public function fetchPaymentsWithAjax (Request $request)
    {
        // Define all the column
        $columns = [ 'id', 'name', 'amount', 'reference', 'payment type', 'created_at', 'status', 'action' ];

        // Fetch data for the page from database
        $payments = OnlinePayment::query()->latest();

        // Set helper variables from request and DB
        $totalData = $totalFiltered = $payments->count();
        $limit = $request['length'];
        $start = $request['start'];
        $order = $columns[$request['order.0.column']];
        $dir = $request['order.0.dir'];
        $search = $request['search.value'];

        // Check if request wants to search or not and fetch data
        if(empty($search))
        {
            $payments = $payments->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
            $payments = $payments->where('reference','LIKE',"%{$search}%")
                ->orWhereHas('user',function ($q) use ($search) { $q->where('first_name', 'LIKE',"%{$search}%")->orWhere('last_name', 'LIKE',"%{$search}%")->orWhere('email', 'LIKE',"%{$search}%"); })
                ->orWhere('type', 'LIKE',"%{$search}%")
                ->orWhere('created_at', 'LIKE',"%{$search}%")
                ->orWhere('amount', 'LIKE',"%{$search}%")
                ->orWhere('status', 'LIKE',"%{$search}%");
            $totalFiltered = $payments->count();
            $payments = $payments->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }

        // Loop through all data and mutate data
        $data = [];
        $i = $start + 1;

        foreach ($payments as $payment)
        {
            $status = $action = $disabled = null;
            if($payment['status'] == 'success'){
                $status = '<span class="badge badge-pill badge-success text-center">Success</span>';
                $disabled = 'disabled';
            }elseif ($payment['status'] == 'pending') {
                $status = '<span class="badge badge-pill badge-warning text-center">Pending</span>';
                // if (auth()->user()->can('Resolve Payments')) {
                    $action = '<div class="menu-item px-3">
                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, \'onlinePaymentResolve' . $payment['id'] . '\')" href="' . route('admin.onlinepayments.resolve', $payment['id']) . '"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Resolve</span></a>
                        <form id="onlinePaymentResolve' . $payment['id'] . '" action="' . route('admin.onlinepayments.resolve', $payment['id']) . '" method="POST">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="POST">
                        </form>
                    </div>';
                // }

                // if (!auth()->user()->can('Resolve Payments')){
                    // $disabled = 'disabled';
                // }
            }elseif ($payment['status'] == 'failed') {
                $status = '<span class="badge badge-pill badge-danger text-center">Failed</span>';
                $disabled = 'disabled';
            }

            $datum['sn'] = '<span class="text-dark fw-bolder ps-4 d-block mb-1 fs-6">' . $i . '</span>';
            // if ($payment->user && auth()->user()->can('View Users')){
                $datum['name'] = '<a class="text-primary-700 text-hover-primary fw-bolder d-block fs-6" style="white-space: nowrap;" href="'.route('admin.users.show', $payment->user['id']).'">'.ucwords($payment->user['name']).'</a>';
            // }else{
                // $datum['name'] = $payment->user['name'] ?? '---';
            // }
            $datum['amount'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦ '.number_format($payment['amount']).'</span>';
            $datum['reference'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$payment['reference'].'</span>';
            $datum['date'] = '<span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">'.$payment['created_at']->format('M d, Y \a\t h:i A').'</span>';
            $datum['payment type'] = '<span class="text-gray-600 fw-bolder d-block fs-6">'.$payment['type'].'</span>';
            $datum['status'] = $status;
            $datum['action'] = '<a href="javascript:void();" class="btn btn-sm btn-primary btn-active-primary '.$disabled.'" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end" style="white-space: nowrap;">Action
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

        // Ready results for datatable
        $res = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo json_encode($res);
    }

    public function resolve(OnlinePayment $payment): \Illuminate\Http\RedirectResponse
    {
        $paymentDetails = Http::withHeaders([
            'Authorization' => 'Bearer '.env('PAYSTACK_SECRET_KEY')
        ])->get('https://api.paystack.co/transaction/verify/'.$payment['reference']);
        if ($payment['status'] == 'pending' && isset($paymentDetails['status'])) {
            $res = $paymentDetails['data'] ?? null;
            if (isset($res) && $res["status"] == 'success') {
                \App\Http\Controllers\OnlinePaymentController::processTransaction($payment, $res['metadata']);
            }
        }
        if ($payment['status'] != "success") {
            $payment->update(['status' => 'failed']);
        }
        return back()->with('success', 'Payment resolved successfully');
    }

}
