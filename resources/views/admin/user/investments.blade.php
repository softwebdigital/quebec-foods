@extends('layouts.admin')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}" class="text-muted">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">{{ ucfirst($type) }} Investments</a></li>
@endsection

@section('content')
    @include('admin.user.partials.navbar');
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ ucfirst($type) }} Investments</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gs-0 gy-4" id="data-table">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 text-dark rounded-start">SN</th>
                                <th class="text-dark">Package</th>
                                <th class="text-dark">Slots</th>
                                <th class="text-dark" style="white-space: nowrap;">Total Invested</th>
                                <th class="text-dark" style="white-space: nowrap;">Expected Returns</th>
                                <th class="text-dark" style="white-space: nowrap;">Days Left</th>
                                <th class="text-dark">Payment</th>
                                <th class="text-dark">Status</th>
                                <th class="text-dark"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($investments as $key => $investment)
                                <tr>
                                    <td class="ps-4"><span
                                            class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                    <td><span
                                            class="text-gray-600 fw-bolder d-block fs-6">{{ $investment['package']['name'] }}</span>
                                    </td>
                                    <td><span
                                            class="text-gray-600 fw-bolder d-block fs-6">{{ $investment['slots'] }}</span>
                                    </td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦
                                            {{ number_format($investment['amount']) }}</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦
                                            {{ number_format($investment['total_return']) }}</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6"
                                            style="white-space: nowrap;">{{ $investment['return_date']->format('M d, Y') }}</span>
                                    </td>
                                    <td>
                                        @if ($investment['payment'] == 'approved')
                                            <span class="badge badge-pill badge-success">Approved</span>
                                        @elseif($investment['payment'] == 'declined')
                                            <span class="badge badge-pill badge-danger">Declined</span>
                                        @elseif($investment['payment'] == 'pending')
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($investment['status'] == 'active')
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @elseif($investment['status'] == 'pending')
                                            <span class="badge badge-pill badge-warning">Pending</span>
                                        @elseif($investment['status'] == 'settled')
                                            <span class="badge badge-pill badge-secondary">Settled</span>
                                        @elseif($investment['status'] == 'cancelled')
                                            <span class="badge badge-pill badge-danger">Declined</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-primary" data-kt-menu-trigger="click"
                                            style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3"
                                                    href="{{ route('admin.users.investment.show', ['user' => $user, 'type' => $type, 'investment' => $investment['id']]) }}"><span
                                                        class="">View</span></a>
                                            </div>
                                            @if ($investment['payment'] == 'pending')
                                                @can('Approve Transactions')
                                                    <div class="menu-item px-3">
                                                        <a class="menu-link px-3"
                                                            onclick="confirmFormSubmit(event, 'transactionApprove{{ $investment['id'] }}')"
                                                            href="{{ route('admin.transactions.approve', $investment['initial_transaction']['id']) }}"><i
                                                                data-feather="user-x" class="icon-sm mr-2"></i> <span
                                                                class="">Approve</span></a>
                                                        <form id="transactionApprove{{ $investment['id'] }}"
                                                            action="{{ route('admin.transactions.approve', $investment['initial_transaction']['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>
                                                    </div>
                                                @endcan
                                                @can('Deecline Transactions')
                                                    <div class="menu-item px-3">
                                                        <a class="menu-link px-3"
                                                            onclick="confirmFormSubmit(event, 'transactionDecline{{ $investment['id'] }}')"
                                                            href="{{ route('admin.transactions.decline', $investment['initial_transaction']['id']) }}"><i
                                                                data-feather="user-x" class="icon-sm mr-2"></i> <span
                                                                class="">Decline</span></a>
                                                        <form id="transactionDecline{{ $investment['id'] }}"
                                                            action="{{ route('admin.transactions.decline', $investment['initial_transaction']['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>
                                                    </div>
                                                @endcan
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--begin::Body-->
    </div>

    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15" placeholder="Search Investments" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                            id="kt-toolbar-filter">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex flex-column flex-wrap fw-bold"
                                        data-kt-customer-table-filter="status">
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="status" value=""
                                                checked="checked" />
                                            <span class="form-check-label text-gray-600">All</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="status" value="active" />
                                            <span class="form-check-label text-gray-600">Active</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="radio" name="status" value="pending" />
                                            <span class="form-check-label text-gray-600">Pending</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="radio" name="status" value="cancelled" />
                                            <span class="form-check-label text-gray-600">Cancelled</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="radio" name="status" value="settled" />
                                            <span class="form-check-label text-gray-600">Settled</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                        data-kt-customer-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                            Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="ps-4 text-muted rounded-start text-nowrap">SN</th>
                            <th class="text-muted text-nowrap">Package</th>
                            <th class="text-muted text-nowrap">Slots</th>
                            <th class="text-muted text-nowrap">Total Invested</th>
                            <th class="text-muted text-nowrap">Expected Returns</th>
                            <th class="text-muted text-nowrap">Return Date</th>
                            <th class="text-muted text-nowrap">Payment</th>
                            <th class="text-muted text-nowrap">Status</th>
                            <th class="text-muted text-end rounded-end">Action</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                        @foreach ($investments as $key => $investment)
                            <tr>
                                <td class="ps-4"><span
                                        class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span
                                        class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $investment['package']['name'] }}</span>
                                </td>
                                <td><span
                                        class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ number_format($investment['slots']) }}</span>
                                </td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">₦
                                        {{ number_format($investment['amount']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">₦
                                        {{ number_format($investment['total_return']) }}</span></td>
                                <td><span
                                        class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $investment['return_date']->format('M d, Y') }}</span>
                                </td>
                                <td>
                                    @if ($investment['payment'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($investment['payment'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @elseif($investment['payment'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($investment['status'] == 'active')
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @elseif($investment['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($investment['status'] == 'settled')
                                        <span class="badge badge-pill badge-secondary">Settled</span>
                                    @elseif($investment['status'] == 'cancelled')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-primary" data-kt-menu-trigger="click"
                                        style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3"
                                                href="{{ route('admin.users.investment.show', ['user' => $user, 'type' => $type, 'investment' => $investment['id']]) }}"><span
                                                    class="">View</span></a>
                                        </div>
                                        @if ($investment['payment'] == 'pending')
                                            @can('Approve Transactions')
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3"
                                                        onclick="confirmFormSubmit(event, 'transactionApprove{{ $investment['id'] }}')"
                                                        href="{{ route('admin.transactions.approve', $investment['initial_transaction']['id']) }}"><i
                                                            data-feather="user-x" class="icon-sm mr-2"></i> <span
                                                            class="">Approve</span></a>
                                                    <form id="transactionApprove{{ $investment['id'] }}"
                                                        action="{{ route('admin.transactions.approve', $investment['initial_transaction']['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                </div>
                                            @endcan
                                            @can('Decline Transactions')
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3"
                                                        onclick="confirmFormSubmit(event, 'transactionDecline{{ $investment['id'] }}')"
                                                        href="{{ route('admin.transactions.decline', $investment['initial_transaction']['id']) }}"><i
                                                            data-feather="user-x" class="icon-sm mr-2"></i> <span
                                                            class="">Decline</span></a>
                                                    <form id="transactionDecline{{ $investment['id'] }}"
                                                        action="{{ route('admin.transactions.decline', $investment['initial_transaction']['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                </div>
                                            @endcan
                                        @endif
                                    </div>
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
        <!--end::Card-->
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('#data-table').DataTable({
        //         "searching": true,
        //         "lengthMenu": [
        //             [100, 200, 300, 400],
        //             [100, 200, 300, 400]
        //         ]
        //     });
        // });

        var KTCustomersList = (function() {
            var t,
                e,
                o,
                n,
                c = () => {
                    n.querySelectorAll(
                        '[data-kt-customer-table-filter="delete_row"]'
                    ).forEach((e) => {
                        e.addEventListener("click", function(e) {
                            e.preventDefault();
                            const o = e.target.closest("tr"),
                                n = o.querySelectorAll("td")[1].innerText;
                            Swal.fire({
                                text: "Are you sure you want to delete " + n + "?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, delete!",
                                cancelButtonText: "No, cancel",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-danger",
                                    cancelButton: "btn fw-bold btn-active-light-primary",
                                },
                            }).then(function(e) {
                                e.value ?
                                    Swal.fire({
                                        text: "You have deleted " + n + "!.",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        },
                                    }).then(function() {
                                        t.row($(o)).remove().draw();
                                    }) :
                                    "cancel" === e.dismiss &&
                                    Swal.fire({
                                        text: n + " was not deleted.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        },
                                    });
                            });
                        });
                    });
                },
                r = () => {
                    const e = n.querySelectorAll('[type="checkbox"]'),
                        o = document.querySelector(
                            '[data-kt-customer-table-select="delete_selected"]'
                        );
                    e.forEach((t) => {
                            t.addEventListener("click", function() {
                                setTimeout(function() {
                                    l();
                                }, 50);
                            });
                        }),
                        o.addEventListener("click", function() {
                            Swal.fire({
                                text: "Are you sure you want to delete selected customers?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, delete!",
                                cancelButtonText: "No, cancel",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-danger",
                                    cancelButton: "btn fw-bold btn-active-light-primary",
                                },
                            }).then(function(o) {
                                o.value ?
                                    Swal.fire({
                                        text: "You have deleted all selected customers!.",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        },
                                    }).then(function() {
                                        e.forEach((e) => {
                                            e.checked &&
                                                t
                                                .row($(e.closest("tbody tr")))
                                                .remove()
                                                .draw();
                                        });
                                        n.querySelectorAll(
                                            '[type="checkbox"]'
                                        )[0].checked = !1;
                                    }) :
                                    "cancel" === o.dismiss &&
                                    Swal.fire({
                                        text: "Selected customers was not deleted.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        },
                                    });
                            });
                        });
                };
            const l = () => {
                const t = document.querySelector(
                        '[data-kt-customer-table-toolbar="base"]'
                    ),
                    e = document.querySelector(
                        '[data-kt-customer-table-toolbar="selected"]'
                    ),
                    o = document.querySelector(
                        '[data-kt-customer-table-select="selected_count"]'
                    ),
                    c = n.querySelectorAll('tbody [type="checkbox"]');
                let r = !1,
                    l = 0;
                c.forEach((t) => {
                        t.checked && ((r = !0), l++);
                    }),
                    r ?
                    ((o.innerHTML = l),
                        t.classList.add("d-none"),
                        e.classList.remove("d-none")) :
                    (t.classList.remove("d-none"), e.classList.add("d-none"));
            };
            return {
                init: function() {
                    (n = document.querySelector("#kt_customers_table")) &&
                    (n.querySelectorAll("tbody tr").forEach((t) => {
                            const e = t.querySelectorAll("td"),
                                o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
                            e[5].setAttribute("data-order", o);
                        }),
                        (t = $(n).DataTable({
                            info: !1,
                            order: [],
                            columnDefs: [{
                                    orderable: !1,
                                    targets: 0
                                },
                                {
                                    orderable: !1,
                                    targets: 6
                                },
                            ],
                        })).on("draw", function() {
                            r(), c(), l();
                        }),
                        r(),
                        document
                        .querySelector('[data-kt-customer-table-filter="search"]')
                        .addEventListener("keyup", function(e) {
                            t.search(e.target.value).draw();
                        }),
                        (o = document.querySelectorAll(
                            '[data-kt-customer-table-filter="status"] [name="status"]'
                        )),
                        document
                        .querySelector('[data-kt-customer-table-filter="filter"]')
                        .addEventListener("click", function() {
                            let c = "";
                            o.forEach((t) => {
                                t.checked && (c = t.value), "all" === c && (c = "");
                            });
                            const r = " " + c;
                            t.search(r).draw();
                        }),
                        c(),
                        document
                        .querySelector('[data-kt-customer-table-filter="reset"]')
                        .addEventListener("click", function() {
                            e.val(null).trigger("change"),
                                (o[0].checked = !0),
                                t.search("").draw();
                        }));
                },
            };
        })();
        KTUtil.onDOMContentLoaded(function() {
            KTCustomersList.init();
        });
    </script>
@endsection
