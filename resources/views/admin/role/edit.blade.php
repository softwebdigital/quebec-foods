@extends('layouts.admin')

@section('pageTitle', 'Edit Role')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.roles') }}" class="@if (request()->routeIs(['admin.roles'])) text-dark @else text-muted @endif">Roles</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Edit Role</a></li>
@endsection

@section('content')
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-lg-7 me-xl-10">
        <!--begin::Card-->
        <div class="card ">
            <div class="card-body p-9">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h4 class="mb-10">Edit ROLE</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Form-->
                <form action="{{ route('admin.roles.update', $role['id']) }}" id="update-role-form" class="form mb-3" method="post">
                    @csrf
                    @method('PUT')
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-13 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" class="form-control form-control-solid" id="name" name="name" value="{{ old('name') ?? $role['name'] }}"/>
                            <!--end::Input-->
                            @error('name')
                                <span class="text-danger small">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="form-group row">
                        <div class="col-12 d-flex justify-content-between">
                            <label>Permissions</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input id="selectAll" type="checkbox" class="form-check-input">
                                    Select All
                                </label>
                            </div>
                        </div>
                        @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                            <div class="col-md-6 my-4">
                                <div class="form-check">
                                    <label style="white-space: normal" class="form-check-label">
                                        <input name="permissions[]" @if($permission['name'] == 'View Quick Overview') disabled @endif @if($role->hasPermissionTo($permission['name']) || $permission['name'] == 'View Quick Overview') checked @endif value="{{ $permission['name'] }}" type="checkbox" class="form-check-input permission-check-box">
                                        {{ $permission['name'] }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            @error('permissions')
                            <div class="small text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @can('Edit Roles')
                        <!--begin::Submit-->
                        <button type="button" class="btn btn-primary mt-3" onclick="confirmFormSubmit(event, 'update-role-form')">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Update Role</span>
                            <!--end::Indicator-->
                        </button>
                        <!--end::Submit-->
                    @endcan
                </form>
               <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            let selectAll = $('#selectAll');
            let permissionCheckBoxes = $('.permission-check-box');
            selectAll.on('change', toggleAllPermissions);
            function toggleAllPermissions(){
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
        });
    </script>
@endsection
