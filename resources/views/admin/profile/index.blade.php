@extends('layouts.admin')

@section('pageTitle', 'Profile')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}" class="text-dark">Profile</a></li>
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
                    <h4 class="mb-10">PERSONNAL INFORMATION</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Form-->
                <form action="{{ route('admin.profile.update') }}" class="form mb-3" method="post" id="update-profile-form" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" class="form-control form-control-solid   " id="name" name="name" value="{{ old('name') ?? auth()->user()['name'] }}"/>
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
                            <input type="email" class="form-control form-control-solid bg-secondary" disabled id="email" name="email" value="{{ auth()->user()['email'] }}"/>
                            <!--end::Input-->
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
                         <input type="text" class="form-control form-control-solid" value="Super Admin" name="role" id="role" placeholder="Role"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Submit-->
                    <button type="submit" class="btn btn-primary" onclick="confirmFormSubmit(event, 'update-profile-form')">
                        <!--begin::Indicator-->
                        <span class="indicator-label">Update Profile</span>
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
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-100 w-lg-400px mb-10 mb-lg-0">
        <!--begin::Sticky aside-->
        <div class="card card-flush mb-0" data-kt-sticky="false" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '0px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <!--begin::Aside content-->
            <div class="card-body p-9">
                <div class="card-title flex-column">
                    <h4 class="mb-10">CHANGE PASSWORD</h2>
                </div>
                <!--begin:::Form-->
                <form action="{{ route('admin.password.custom.update') }}" class="form mb-3" method="post" id="changePasswordForm">
                    @csrf
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2" for="old_password">Old Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" name="old_password" type="password" id="old_password" autocomplete="off" placeholder="Old Password" />
                        <!--end::Input-->
                        @error('old_password')
                            <span class="text-danger small">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2" for="new_password">New Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" name="new_password" type="password" id="new_password" autocomplete="off" placeholder="New Password" />
                        <!--end::Input-->
                        @error('new_password')
                            <span class="text-danger small">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold mb-2" for="confirm_password">Confirm New Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
                        <!--end::Input-->
                        @error('confirm_password')
                            <span class="text-danger small">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Submit-->
                    <button type="submit" onclick="confirmFormSubmit(event, 'changePasswordForm')" class="btn btn-primary" id="bank_submit_button">
                        <!--begin::Indicator-->
                        <span class="indicator-label">Update Password</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator-->
                    </button>
                    <!--end::Submit-->
                </form>
                <!--end:::Form-->
            </div>
            <!--end::Aside content-->
        </div>
        <!--end::Sticky aside-->
    </div>
    <!--end::Sidebar-->
</div>
@endsection

@section('script')

@endsection
