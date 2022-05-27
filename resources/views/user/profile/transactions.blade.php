@extends('layouts.user')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-muted">Account Overview</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Transactions</a></li>
@endsection

@section('content')
    @include('user.profile.partials.navbar', ['user' => $user]);

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
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Transactions" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
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
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
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
                                <label class="form-label fs-5 fw-bold mb-3">Category:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid fw-bolder" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="category" data-dropdown-parent="#kt-toolbar-filter">
                                    <option value="">Show All</option>
                                    <option value="withdrawal">Withdrawal</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="investment">Investment</option>
                                    <option value="payout">Payout</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold mb-3">Status:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="status">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="status" value="" checked="checked" />
                                        <span class="form-check-label text-gray-600">All</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="status" value="approved" />
                                        <span class="form-check-label text-gray-600">Approved</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="status" value="pending" />
                                        <span class="form-check-label text-gray-600">Pending</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="status" value="declined" />
                                        <span class="form-check-label text-gray-600">Declined</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
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
                        <th class="text-muted text-nowrap">Amount</th>
                        <th class="text-muted text-nowrap">Description</th>
                        <th class="text-muted text-nowrap">Date</th>
                        <th class="text-muted text-nowrap">Details</th>
                        <th class="text-muted text-nowrap">Category</th>
                        <th class="text-muted text-nowrap">Method</th>
                        <th class="text-muted text-nowrap">Channel</th>
                        <th class="text-muted text-center rounded-end">Status</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
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
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6 text-nowrap">{{ $key + 1 }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ {{ number_format($transaction['amount']) }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['description'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['created_at']->format('M d, Y') }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-center">{!! $details !!}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ ucwords($transaction['type']) }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ ucwords($transaction['method']) }}</span></td>
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
    <!--end::Card-->
</div>

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
<script>
    var KTCustomersList = (function () {
    var t,
        e,
        o,
        n,
        c = () => {
            n.querySelectorAll(
                '[data-kt-customer-table-filter="delete_row"]'
            ).forEach((e) => {
                e.addEventListener("click", function (e) {
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
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (e) {
                        e.value
                            ? Swal.fire({
                                  text: "You have deleted " + n + "!.",
                                  icon: "success",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              }).then(function () {
                                  t.row($(o)).remove().draw();
                              })
                            : "cancel" === e.dismiss &&
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
                t.addEventListener("click", function () {
                    setTimeout(function () {
                        l();
                    }, 50);
                });
            }),
                o.addEventListener("click", function () {
                    Swal.fire({
                        text: "Are you sure you want to delete selected customers?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (o) {
                        o.value
                            ? Swal.fire({
                                  text: "You have deleted all selected customers!.",
                                  icon: "success",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              }).then(function () {
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
                              })
                            : "cancel" === o.dismiss &&
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
            r
                ? ((o.innerHTML = l),
                  t.classList.add("d-none"),
                  e.classList.remove("d-none"))
                : (t.classList.remove("d-none"), e.classList.add("d-none"));
    };
    return {
        init: function () {
            (n = document.querySelector("#kt_customers_table")) &&
                (n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td"),
                        o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
                    e[5].setAttribute("data-order", o);
                }),
                (t = $(n).DataTable({
                    info: !1,
                    order: [],
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 6 },
                    ],
                })).on("draw", function () {
                    r(), c(), l();
                }),
                r(),
                document
                    .querySelector('[data-kt-customer-table-filter="search"]')
                    .addEventListener("keyup", function (e) {
                        t.search(e.target.value).draw();
                    }),
                (e = $('[data-kt-customer-table-filter="category"]')),
                (o = document.querySelectorAll(
                    '[data-kt-customer-table-filter="status"] [name="status"]'
                )),
                document
                    .querySelector('[data-kt-customer-table-filter="filter"]')
                    .addEventListener("click", function () {
                        const n = e.val();
                        let c = "";
                        o.forEach((t) => {
                            t.checked && (c = t.value), "all" === c && (c = "");
                        });
                        const r = n + " " + c;
                        t.search(r).draw();
                    }),
                c(),
                document
                    .querySelector('[data-kt-customer-table-filter="reset"]')
                    .addEventListener("click", function () {
                        e.val(null).trigger("change"),
                            (o[0].checked = !0),
                            t.search("").draw();
                    }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTCustomersList.init();
});
</script>
@endsection
