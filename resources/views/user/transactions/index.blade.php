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
                        <tr>
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
    <div class="card card-flush h-xl-100">
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">All Transactions</span>
            </h3>
            <!--end::Title-->
        </div>
        <!--begin::Card header-->
        <div class="card-header border-0 pt-0">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Transactions" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Filter</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Month:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="month" data-hide-search="true">
                                    <option></option>
                                    <option value="jan">January</option>
                                    <option value="feb">February</option>
                                    <option value="mar">March</option>
                                    <option value="apr">April</option>
                                    <option value="may">May</option>
                                    <option value="jun">June</option>
                                    <option value="jul">July</option>
                                    <option value="aug">August</option>
                                    <option value="sep">September</option>
                                    <option value="oct">October</option>
                                    <option value="nov">November</option>
                                    <option value="dec">December</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Status:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="status" data-hide-search="true">
                                    <option></option>
                                    <option value="Active">Active</option>
                                    <option value="Expiring">Expiring</option>
                                    <option value="Suspended">Suspended</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Billing Method:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="billing" data-hide-search="true">
                                    <option></option>
                                    <option value="Auto-debit">Auto-debit</option>
                                    <option value="Manual - Credit Card">Manual - Credit Card</option>
                                    <option value="Manual - Cash">Manual - Cash</option>
                                    <option value="Manual - Paypal">Manual - Paypal</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Product:</label>
                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="product" data-hide-search="true">
                                    <option></option>
                                    <option value="Basic">Basic</option>
                                    <option value="Basic Bundle">Basic Bundle</option>
                                    <option value="Teams">Teams</option>
                                    <option value="Teams Bundle">Teams Bundle</option>
                                    <option value="Enterprise">Enterprise</option>
                                    <option value=" Enterprise Bundle">Enterprise Bundle</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_subscriptions_export_modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Export</button>
                    <!--end::Export-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_subscriptions_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Method</th>
                        <th>Channel</th>
                        <th>Status</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    @foreach ($transactions as $key=>$transaction )
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
                        <tr>
                            <!--begin::Checkbox-->
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $key + 1 }}" />
                                </div>
                            </td>
                            <!--end::Checkbox-->
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

