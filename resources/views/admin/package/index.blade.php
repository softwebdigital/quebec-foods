@extends('layouts.admin')

@section('pageTitle', 'Packages')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item text-muted"><a href="javascript:void()" class="text-dark">Packages</a></li>
@endsection

@section('content')
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
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Packages" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                                <label class="form-label fs-5 fw-bold mb-3">Type:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-solid fw-bolder" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="category" data-dropdown-parent="#kt-toolbar-filter">
                                    <option value="">Show All</option>
                                    <option value="plant">Processing Plants</option>
                                    <option value="farm">Farm</option>
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
                                        <input class="form-check-input" type="radio" name="status" value="closed" />
                                        <span class="form-check-label text-gray-600">Closed</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="status" value="open" />
                                        <span class="form-check-label text-gray-600">Open</span>
                                    </label>
                                    <!--end::Option-->
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
                    <!--begin::Export-->
                    {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                            <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Export</button> --}}
                    <!--end::Export-->
                    <div>
                        <a href="#" class="btn btn-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">New Package
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            @can('Create Packages')
                                <div class="menu-item px-3">
                                    <a class="menu-link px-3" href="{{ route('admin.packages.create', ['type' => 'plant']) }}"><span class="text-nowrap">Plant</span></a>
                                </div>
                                <div class="menu-item px-3">
                                    <a class="menu-link px-3" href="{{ route('admin.packages.create', ['type' => 'farm']) }}"><span class="">Farm</span></a>
                                </div>
                            @endcan
                        </div>
                    </div>
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
                        <th class="text-muted text-nowrap">Name</th>
                        <th class="text-muted text-nowrap">ROI in %</th>
                        <th class="text-muted text-nowrap">Price per slot</th>
                        <th class="text-muted text-nowrap">Start date</th>
                        <th class="text-muted text-nowrap">Type</th>
                        <th class="text-muted text-nowrap">Investments</th>
                        <th class="text-muted text-nowrap">Status</th>
                        <th class="text-muted text-end rounded-end">Action</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @foreach ($packages as $key=>$package )
                        <tr>
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6 text-nowrap">{{ $key + 1 }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $package['name'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $package['roi'] }}%</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">₦ {{ number_format($package['price']) }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $package['start_date']->format('M d, Y \a\t h:i A') }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ ucwords($package['type'])}}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6 text-center">{{ $package->investments()->count() }}</span></td>
                            <td>
                                @if ($package['status'] == 'open')
                                    <span class="badge badge-pill badge-success">Open</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Closed</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    @can('Edit Packages')
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" href="{{ route('admin.packages.edit', ['package' => $package['id'], 'type' => $package['type']]) }}"><span class="">Edit</span></a>
                                        </div>
                                    @endcan
                                    @can('Delete Packages')
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" href="" onclick="confirmFormSubmit(event, 'deletePackage{{ $package['id'] }}')"><span class="">Delete</span></a>
                                        </div>
                                        <form action="{{ route('admin.packages.destroy', ['package' => $package['id'], 'type' => $package['type']]) }}" method="post" id="deletePackage{{ $package['id'] }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
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
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

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
