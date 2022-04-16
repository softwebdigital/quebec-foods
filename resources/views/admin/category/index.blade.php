@extends('layouts.admin')

@section('pageTitle', 'Category')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item text-muted"><a href="javascript:void()" class="text-dark">Category</a></li>
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
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Category" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">New Category</button>
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
                        <th class="text-muted text-nowrap">Packages</th>
                        <th class="text-muted text-nowrap">Date</th>
                        <th class="text-muted text-end rounded-end">Action</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    @if ($categories->count() > 0)
                        @foreach ($categories as $key=>$category )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6 text-nowrap">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $category['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $category->packages()->count() }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $category['created_at']->format('M d, Y') }}</span></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{  $category['id'] }}"><span class="">Edit</span></a>
                                            <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'deleteCategoryForm{{  $category['id'] }}')"><span class="">Delete</span></a>
                                            <form action="{{ route('admin.category.destroy', $category['id']) }}" method="post" id="deleteCategoryForm{{  $category['id'] }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!--begin::Deposit Modal-->
                                <div class="modal fade" tabindex="-1" id="updateCategoryModal{{  $category['id'] }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Category</h4>
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                    <span class="svg-icon svg-icon-2x"></span>
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <div class="modal-body">
                                                <!--begin:::Form-->
                                                <form class="form mb-3" method="POST" action="{{ route('admin.category.update', $category['id']) }}" id="updateCategoryForm" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="d-flex flex-column mb-5 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" placeholder="Category Name" value="{{ old("name") ?? $category['name']}}" class="form-control form-control-solid" name="name" id="name">
                                                        @error('name')
                                                        <span class="text-danger small" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mt-4 mb-5 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <textarea placeholder="Category Description" style="resize: none" class="form-control form-control-solid" name="description" id="description" rows="5">{{ old("description") ?? $category['description'] }}</textarea>
                                                        @error('description')
                                                        <span class="text-danger small" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <!--end::Input group-->
                                                </form>
                                                <!--end:::Form-->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <!--begin::Submit-->
                                                <button type="button" onclick="confirmFormSubmit(event, 'updateCategoryForm')" class="btn btn-primary">
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label">Update</span>
                                                    <!--end::Indicator-->
                                                </button>
                                                <!--end::Submit-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--end::Withdrawal Modal-->
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No available data</td>
                        </tr>
                    @endif

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    </div>

<!--begin::Deposit Modal-->
<div class="modal fade" tabindex="-1" id="createCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create a Category</h4>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <!--begin:::Form-->
                <form class="form mb-3" method="post" action="{{ route('admin.category.store') }}" id="createCategoryForm" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" placeholder="Category Name" value="{{ old("name")}}" class="form-control form-control-solid" name="name" id="name">
                        @error('name')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mt-4 mb-5 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <textarea placeholder="Category Description" style="resize: none" class="form-control form-control-solid" name="description" id="description" rows="5">{{ old("description") }}</textarea>
                        @error('description')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </form>
                <!--end:::Form-->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <!--begin::Submit-->
                <button type="button" onclick="confirmFormSubmit(event, 'createCategoryForm')" class="btn btn-primary">
                    <!--begin::Indicator-->
                    <span class="indicator-label">Create</span>
                    <!--end::Indicator-->
                </button>
                <!--end::Submit-->
            </div>
        </div>
    </div>
</div>
<!--end::Withdrawal Modal-->

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
