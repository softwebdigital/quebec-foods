@extends('layouts.admin')

@section('pageTitle', 'Create Administrator')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="#" class="text-muted">Administrators</a></li>
<li class="breadcrumb-item"><a href="#" class="text-dark">Create</a></li>
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
                    <h4 class="mb-10">CREATE ADMINSTRATOR</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Form-->
                <form action="{{ route('admin.admins.store') }}" id="create-admin-form" class="form mb-3" method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
                            <!--end::Input-->
                            @error('name')
                                <span class="text-danger small">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="email">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"/>
                            <!--end::Input-->
                            @error('email')
                                <span class="text-danger small">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                            <span class="required">Role</span>
                            {{-- <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your payment statements may very based on selected position"></i> --}}
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="role" aria-label="Select the Admin Role" data-placeholder="Select the admin role" data-control="select2" class="form-select text-dark" id="role">
                            <option value="">Select Role</option>
                            @foreach(\Spatie\Permission\Models\Role::all()->where('name', '!=', 'Super Admin') as $role)
                                <option @if(old('role') == $role['id']) selected @endif value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                        @error('role')
                            <span class="text-danger small">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Submit-->
                    <button type="button" class="btn btn-primary" onclick="confirmFormSubmit(event, 'create-admin-form')">
                        <!--begin::Indicator-->
                        <span class="indicator-label">Create Administrator</span>
                        <!--end::Indicator-->
                    </button>
                    <!--end::Submit-->
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

@endsection