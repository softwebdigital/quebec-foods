@extends('layouts.admin')

@section('pageTitle', 'Roles')

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Roles</a></li>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
    @foreach($roles as $key=>$role)
        <!--begin::Col-->
        <div class="col-md-4">
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
                    <div class="fw-bolder text-gray-600 mb-5">Total users with this role: {{ \App\Models\Admin::role($role['name'])->count() }}</div>
                    <!--end::Users-->
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">
                        @php
                            $permissions = $role->permissions()->limit(5)->get();
                            $all = $role->permissions()->get();
                            $remains = max(0, count($all) - count($permissions));
                        @endphp
                        @foreach ($permissions as $permission)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{ $permission['name'] }}</div>
                        @endforeach
                        @if ($remains > 0)
                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>
                            <em>and {{ $remains }} more...</em>
                        </div>
                        @endif
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer flex-wrap pt-0">
                    <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                    <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role{{ $role['id'] }}">Edit Role</button>
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
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
                        <form action="{{ route('admin.roles.update', $role['id']) }}" id="update-role-form-{{$role['id']}}" class="form mb-3" method="post">
                            <!--begin::Scroll-->
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px" style="max-height: 406px;">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">Role name</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="name" value="{{ old('name') ?? $role['name'] }}"/>
                                    @error('name')
                                        <span class="text-danger small">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
                                            <tbody class="text-gray-600 fw-bold" id="allPermissions{{ $role['id'] }}">
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td class="text-gray-800">Administrator Access
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Allows a full access to the system" aria-label="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                            <input class="form-check-input" type="checkbox" value="" onchange="selectAll('selectAll{{ $role['id'] }}', 'allPermissions{{ $role['id'] }}')" id="selectAll{{ $role['id'] }}">
                                                            <span class="form-check-label" for="selectAll{{ $role['id'] }}">Select all</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                @foreach(\Spatie\Permission\Models\Permission::orderBy('name')->get() as $permission)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">{{ $permission['name'] }}</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input name="permissions[]" @if($permission['name'] == 'View Dashbaord') disabled @endif @if($role->hasPermissionTo($permission['name']) || $permission['name'] == 'View Dashbaord') checked @endif value="{{ $permission['name'] }}" class="form-check-input @if($permission['name'] != 'View Dashbaord') permission-check-box @endif" type="checkbox">
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
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" onclick="confirmFormSubmit(event, 'update-role-form-{{$role['id']}}')" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">Update</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        <div></div></form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    @endforeach
    @can('Create Roles')
        <!--begin::Add new card-->
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card h-md-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets/media/illustrations/dozzy-1/4.png') }}" alt="" class="mw-100 mh-150px mb-7">
                        <!--end::Illustration-->
                        <!--begin::Label-->
                        <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                        <!--end::Label-->
                    </button>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
        <!--begin::Add new card-->

        <div class="modal fade" id="kt_modal_add_role" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Add a Role</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-lg-5 my-7">
                        <!--begin::Form-->
                        <form action="{{ route('admin.roles.store') }}" id="create-role-form" class="form mb-3" method="post">
                            <!--begin::Scroll-->
                            @csrf
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px" style="max-height: 406px;">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">
                                        <span class="required">Role name</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter a role name" name="name" value="{{ old('name') }}"/>
                                    @error('name')
                                        <span class="text-danger small">
                                            <span>{{ $message }}</span>
                                        </span>
                                    @enderror
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
                                            <tbody class="text-gray-600 fw-bold" id="allPermissionsCreate">
                                                <!--begin::Table row-->
                                                <tr>
                                                    <td class="text-gray-800">Administrator Access
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Allows a full access to the system" aria-label="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                            <input class="form-check-input" type="checkbox" value="" onchange="selectAll('selectAllCreate', 'allPermissionsCreate')" id="selectAllCreate">
                                                            <span class="form-check-label" for="selectAllCreate">Select all</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                    </td>
                                                </tr>
                                                <!--end::Table row-->
                                                @foreach(\Spatie\Permission\Models\Permission::orderBy('name')->get() as $permission)
                                                <!--begin::Table row-->
                                                <tr>
                                                    <!--begin::Label-->
                                                    <td class="text-gray-800">{{ $permission['name'] }}</td>
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input name="permissions[]" @if($permission['name'] == 'View Dashbaord') disabled @endif @if($permission['name'] == 'View Dashbaord') checked @endif value="{{ $permission['name'] }}" class="form-check-input @if($permission['name'] != 'View Dashbaord') permission-check-box @endif" type="checkbox">
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
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                <button type="submit" onclick="confirmFormSubmit(event, 'create-role-form')" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">Create</span>
                                    <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        <div></div></form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    @endcan
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
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
@endsection
