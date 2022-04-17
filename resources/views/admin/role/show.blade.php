@extends('layouts.admin')

@section('pageTitle', 'View Role')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.roles') }}"
            class="@if (request()->routeIs(['admin.roles'])) text-dark @else text-muted @endif">Roles</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">View Role</a></li>
@endsection

@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <!--begin::Col-->
        <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
            <!--begin::Card-->
            <div class="card card-flush h-md-100">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ $role['name'] }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-1">
                    <!--begin::Users-->
                    <div class="fw-bolder text-gray-600 mb-5">Total users with this role:
                        {{ \App\Models\Admin::role($role['name'])->count() }}</div>
                    <!--end::Users-->
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        @php
                            $permissions = $role->permissions()->get();
                        @endphp
                        @foreach ($permissions as $permission)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{ $permission['name'] }}
                            </div>
                        @endforeach
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer flex-wrap pt-0">
                    <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_update_role{{ $role['id'] }}">Edit Role</button>
                </div>
                <!--end::Card footer-->
                <div class="modal fade" id="kt_modal_update_role{{ $role['id'] }}" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Update Role</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 my-7">
                                <!--begin::Form-->
                                <form action="{{ route('admin.roles.update', $role['id']) }}"
                                    id="update-role-form-{{ $role['id'] }}" class="form mb-3" method="post">
                                    <!--begin::Scroll-->
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                        data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px"
                                        style="max-height: 406px;">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bolder form-label mb-2">
                                                <span class="required">Role name</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                                name="name" value="{{ old('name') ?? $role['name'] }}" />
                                            @error('name')
                                                <span class="text-danger small">
                                                    <span>{{ $message }}</span>
                                                </span>
                                            @enderror
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Permissions-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                            <!--end::Label-->
                                            @error('permissions')
                                                <div class="small text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                    <!--begin::Table body-->
                                                    <tbody class="text-gray-600 fw-bold"
                                                        id="allPermissions{{ $role['id'] }}">
                                                        <!--begin::Table row-->
                                                        <tr>
                                                            <td class="text-gray-800">Administrator Access
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Allows a full access to the system"
                                                                    aria-label="Allows a full access to the system"></i>
                                                            </td>
                                                            <td>
                                                                <!--begin::Checkbox-->
                                                                <label
                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                    <input class="form-check-input" type="checkbox" value=""
                                                                        onchange="selectAll('selectAll{{ $role['id'] }}', 'allPermissions{{ $role['id'] }}')"
                                                                        id="selectAll{{ $role['id'] }}">
                                                                    <span class="form-check-label"
                                                                        for="selectAll{{ $role['id'] }}">Select
                                                                        all</span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </td>
                                                        </tr>
                                                        <!--end::Table row-->
                                                        @foreach (\Spatie\Permission\Models\Permission::orderBy('name')->get() as $permission)
                                                            <!--begin::Table row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">{{ $permission['name'] }}</td>
                                                                <!--end::Label-->
                                                                <!--begin::Input group-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input name="permissions[]"
                                                                                @if ($permission['name'] == 'View Dashboard') disabled @endif
                                                                                @if ($role->hasPermissionTo($permission['name']) || $permission['name'] == 'View Dashboard') checked @endif
                                                                                value="{{ $permission['name'] }}"
                                                                                class="form-check-input @if ($permission['name'] != 'View Dashboard') permission-check-box @endif"
                                                                                type="checkbox">
                                                                            <span class="form-check-label">Enable</span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <!--end::Input group-->
                                                            </tr>
                                                            <!--end::Table row-->
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Permissions-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-bs-dismiss="modal">Discard</button>
                                        <button type="submit"
                                            onclick="confirmFormSubmit(event, 'update-role-form-{{ $role['id'] }}')"
                                            class="btn btn-primary" data-kt-roles-modal-action="submit">
                                            <span class="indicator-label">Update</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    <div></div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-10">
            <!--begin::Card-->
            <div class="card card-flush mb-6 mb-xl-9">
                <!--begin::Card header-->
                <div class="card-header pt-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="d-flex align-items-center">Users Assigned
                            <span
                                class="text-gray-600 fs-6 ms-1">({{ \App\Models\Admin::role($role['name'])->count() }})</span>
                        </h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1"
                            data-kt-view-roles-table-toolbar="base">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-roles-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Users">
                        </div>
                        <!--end::Search-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-view-roles-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2"
                                    data-kt-view-roles-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger"
                                data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_roles_view_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer"
                                id="kt_roles_view_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px sorting" tabindex="0" aria-controls="kt_roles_view_table"
                                            rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending"
                                            style="width: 58.9844px;">ID</th>
                                        <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_roles_view_table"
                                            rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                            style="width: 226.445px;">User</th>
                                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_roles_view_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Joined Date: activate to sort column ascending"
                                            style="width: 125px;">Joined Date</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($role->users()->get() as $key => $user)
                                    <tr class="@if($key % 2 == 0) even @else odd @endif">
                                        <!--begin::ID-->
                                        <td>{{ $key + 1 }}</td>
                                        <!--begin::ID-->
                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center">
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="/metronic8/demo15/../demo15/apps/user-management/users/view.html"
                                                    class="text-gray-800 text-hover-primary mb-1">{{ $user['name'] }}</a>
                                                <span>{{ $user['email'] }}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::user=-->
                                        <!--begin::Joined date=-->
                                        <td>{{ $user['created_at']->format('M d, Y') }}</td>
                                        <!--end::Joined date=-->
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@section('script')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    function selectAll(self, parent) {
        let selectAll = $(`#${self}`);
        let permissionCheckBoxes = $(`#${parent} .permission-check-box`);
        if (selectAll.prop('checked')){
            permissionCheckBoxes.each(function (){
                $(this).prop('checked', true);
            });
        }else {
            permissionCheckBoxes.each(function (){
                $(this).prop('checked', false);
            });
        }
    }
</script>
<script>
    "use strict";
var KTUsersViewRole = (function () {
    var t,
        e,
        o = () => {
            const r = e.querySelectorAll('[type="checkbox"]'),
                c = document.querySelector(
                    '[data-kt-view-roles-table-select="delete_selected"]'
                );
            r.forEach((t) => {
                t.addEventListener("click", function () {
                    setTimeout(function () {
                        n();
                    }, 50);
                });
            }),
                c.addEventListener("click", function () {
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
                    }).then(function (c) {
                        c.value
                            ? Swal.fire({
                                  text: "You have deleted all selected customers!.",
                                  icon: "success",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              })
                                  .then(function () {
                                      r.forEach((e) => {
                                          e.checked &&
                                              t
                                                  .row($(e.closest("tbody tr")))
                                                  .remove()
                                                  .draw();
                                      });
                                      e.querySelectorAll(
                                          '[type="checkbox"]'
                                      )[0].checked = !1;
                                  })
                                  .then(function () {
                                      n(), o();
                                  })
                            : "cancel" === c.dismiss &&
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
    const n = () => {
        const t = document.querySelector(
                '[data-kt-view-roles-table-toolbar="base"]'
            ),
            o = document.querySelector(
                '[data-kt-view-roles-table-toolbar="selected"]'
            ),
            n = document.querySelector(
                '[data-kt-view-roles-table-select="selected_count"]'
            ),
            r = e.querySelectorAll('tbody [type="checkbox"]');
        let c = !1,
            l = 0;
        r.forEach((t) => {
            t.checked && ((c = !0), l++);
        }),
            c
                ? ((n.innerHTML = l),
                  t.classList.add("d-none"),
                  o.classList.remove("d-none"))
                : (t.classList.remove("d-none"), o.classList.add("d-none"));
    };
    return {
        init: function () {
            (e = document.querySelector("#kt_roles_view_table")) &&
                (e.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td"),
                        o = moment(e[3]?.innerHTML, "DD MMM YYYY, LT").format();
                    e[3]?.setAttribute("data-order", o);
                }),
                (t = $(e).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 5,
                    lengthChange: !1,
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 2 },
                    ],
                })),
                document
                    .querySelector('[data-kt-roles-table-filter="search"]')
                    .addEventListener("keyup", function (e) {
                        t.search(e.target.value).draw();
                    }),
                e
                    .querySelectorAll(
                        '[data-kt-roles-table-filter="delete_row"]'
                    )
                    .forEach((e) => {
                        e.addEventListener("click", function (e) {
                            e.preventDefault();
                            const o = e.target.closest("tr"),
                                n = o.querySelectorAll("td")[1].innerText;
                            Swal.fire({
                                text:
                                    "Are you sure you want to delete " +
                                    n +
                                    "?",
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
                                              confirmButton:
                                                  "btn fw-bold btn-primary",
                                          },
                                      }).then(function () {
                                          t.row($(o)).remove().draw();
                                      })
                                    : "cancel" === e.dismiss &&
                                      Swal.fire({
                                          text:
                                              customerName +
                                              " was not deleted.",
                                          icon: "error",
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, got it!",
                                          customClass: {
                                              confirmButton:
                                                  "btn fw-bold btn-primary",
                                          },
                                      });
                            });
                        });
                    }),
                o());
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewRole.init();
});
</script>
@endsection
