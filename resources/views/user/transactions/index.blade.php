@extends('layouts.user')

@section('pageTitle', 'Transactions')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-muted">Transactions</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">{{ ucfirst($type) }}</a></li>
@endsection

@section('content')
<!--begin::Col-->
<div class="col-xl-12 mb-5 mb-xl-10">
    <!--begin::Table Widget 4-->
    <div class="card card-flush h-xl-100">
        <!--begin::Card header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">{{ ucfirst($type) }} Transactions</span>
            </h3>
            <!--end::Title-->
            <!--begin::Actions-->
            <div class="card-toolbar">
                <!--begin::Filters-->
                <div class="d-flex flex-stack flex-wrap gap-4">
                    <!--begin::Destination-->
                    <div class="d-flex align-items-center fw-bolder">
                        <!--begin::Label-->
                        <div class="text-muted fs-7 me-2">Method</div>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
                            <option></option>
                            <option value="Show All" selected="selected">Show All</option>
                            <option value="a">Card</option>
                            <option value="b">Bank Transfer</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Destination-->
                    <!--begin::Status-->
                    <div class="d-flex align-items-center fw-bolder">
                        <!--begin::Label-->
                        <div class="text-muted fs-7 me-2">Status</div>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
                            <option></option>
                            <option value="Show All" selected="selected">Show All</option>
                            <option value="Shipped">Pending</option>
                            <option value="Confirmed">Approved</option>
                            <option value="Rejected">Declined</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Search-->
                    <div class="position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Filters-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-3" id="!kt_table_widget_4_table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 text-dark rounded-start">SN</th>
                        <th class="text-dark">Amount</th>
                        <th class="text-dark">Description</th>
                        <th class="text-dark">Date</th>
                        <th class="text-dark text-center">Details</th>
                        <th class="text-dark">Method</th>
                        <th class="text-dark">Channel</th>
                        <th class="text-dark rounded-end">Status</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($transactions as $key=>$transaction )
                        <tr>
                            @php
                                $bank = json_decode($transaction['preferred_bank'], true);
                                if($transaction['type'] == 'withdrawal' && $bank){
                                    $bank_id = $bank['id'];
                                    $bank_detail = \App\Models\BankAccounts::find($bank_id);
                                    $bank_name = $bank_detail['bank_name'];
                                    $account_name = $bank_detail['account_name'];
                                    $account_number = $bank_detail['account_number'];
                                    $details = '<button data-bs-toggle="modal" onclick="populateTransactionDetails(\''.$account_name.'\', \''.$account_number.'\', \''.$bank_name.'\');" data-bs-target="#transactionDetailModal" class="btn btn-sm btn-primary" type="button">
                                                    View
                                                </button>';
                                }else{
                                    $details = '---';
                                }
                            @endphp
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ {{ number_format($transaction['amount']) }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['description'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['created_at']->format('M d, Y') }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-center">{!! $details !!}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['method'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['channel'] }}</span></td>
                            <td>
                                @if($transaction['status'] == 'approved')
                                    <span class="badge badge-pill badge-success">Approved</span>
                                @elseif($transaction['status'] == 'pending')
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                @elseif($transaction['status'] == 'declined')
                                    <span class="badge badge-pill badge-danger">Declined</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Table Widget 4-->





    <div class="modal fade" tabindex="-1" id="transactionDetailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Withdrawal</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <table class="table table-borderless">
                        <tr>
                            <th class="fw-bolder">Account Name: </th>
                            <td id="accountName"></td>
                        </tr>
                        <tr>
                            <th class="fw-bolder">Account Number: </th>
                            <td id="accountNumber"></td>
                        </tr>
                        <tr>
                            <th class="fw-bolder">Bank Name: </th>
                            <td id="bankName"></td>
                        </tr>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Col-->
@endsection

@section('script')
<script>
    function populateTransactionDetails(accountName, accountNumber, bankName) {
        $('#accountName').text(accountName);
        $('#accountNumber').text(accountNumber);
        $('#bankName').text(bankName);
    }
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
@endsection

