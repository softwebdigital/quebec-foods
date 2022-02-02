@extends('layouts.admin')

@section('pageTitle', 'Administrators')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="#" class="text-dark">Administrators</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Administrators</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{ count($admins) }} Total Records</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.admins.create') }}" class="btn btn-sm btn-light-primary">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->New Admin</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle dataTable gs-0 gy-4" id="data-table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 text-dark rounded-start">SN</th>
                        <th class="text-dark">Name</th>
                        <th class="text-dark">Email</th>
                        <th class="text-dark">Role</th>
                        <th class="text-dark">Status</th>
                        <th class="text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach($admins as $key=>$admin)
                        <tr>
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $admin['name'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $admin['email'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $admin->roles()->first()['name'] }}</span></td>
                            <td>
                                @if($admin['active'] == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Blocked</span>
                                @endif
                            </td>
                            <td class="text-end">
                                @if($admin->roles()->first()['name'] <> 'Super Admin')
                                <a href="#" class="btn btn-sm btn-light-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal" onclick="setParametersForChangingRole('{{ $admin->roles()->first()['id'] }}', {{ $admin['id'] }})" data-bs-target="#kt_modal_1" href="javascript:void();" onclick=""><span class="">Change Role</span></a>
                                        @if($admin['active'] == 1)
                                            <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'adminBlock{{ $admin['id'] }}')" href="{{ route('admin.admins.block', $admin['id']) }}"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Block</span></a>
                                            <form id="adminBlock{{ $admin['id'] }}" action="{{ route('admin.admins.block', $admin['id']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        @else
                                            <a class="menu-link px-3" href="{{ route('admin.admins.unblock', $admin['id']) }}" onclick="confirmFormSubmit(event, 'adminUnblock{{ $admin['id'] }}')"><i data-feather="user-check" class="icon-sm mr-2"></i> <span class="">Unblock</span></a>
                                            <form id="adminUnblock{{ $admin['id'] }}" action="{{ route('admin.admins.unblock', $admin['id']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                @endif
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
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.admins.role.change') }}" id="changeRoleForm">
                        @csrf
                        <div class="form-group">
                            <label for="oldAdminRole" class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Role</span>
                            </label>
                            <select name="role" aria-label="Select the Admin Role" data-placeholder="Select the admin role" data-control="select2" class="form-select text-dark" id="role">
                                <option value="">Select Role</option>
                                @foreach(\Spatie\Permission\Models\Role::all()->where('name', '!=', 'Super Admin') as $role)
                                    <option @if(old('role') == $role['id']) selected @endif value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="adminToChangeRoleID" name="admin">
                            @error('role')
                            <strong class="text-danger">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="confirmFormSubmit(event, 'changeRoleForm')" class="btn btn-primary">Change Role</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function setParametersForChangingRole(role, user){
        document.getElementById('adminToChangeRoleID').value = user;
    }
</script>
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
@endsection