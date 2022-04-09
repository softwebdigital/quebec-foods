@extends('layouts.admin')

@section('pageTitle', 'Profile')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Profile</a></li>
@endsection

@section('content')
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <span
                                class="symbol-label fs-2x fw-bold text-primary bg-light-primary">{{ ucfirst($user['name'][0]) }}</span>
                            <div class="bg-success position-absolute border border-4 border-white"></div>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <p href="#"
                            class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ ucwords($user['name']) }}</p>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">Administrator</div>
                            <!--begin::Badge-->
                        </div>
                        <!--end::Position-->
                    </div>
                    <!--end::User Info-->
                    <!--end::Summary-->
                    <!--begin::Details toggle-->
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                            role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                            <span class="ms-2 rotate-180">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $user['email'] }}</a>
                            </div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bolder mt-5">Roles</div>
                            <div class="text-gray-600">Super Admin</div>
                            <!--begin::Details item-->
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->

        @php
            $securityError = $errors->first('new_password') || $errors->first('old_password');
            $overviewError = $errors->first('name') || $errors->first('email') || $errors->first('role');
        @endphp

        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 @if (!$securityError && !$overviewError) active @endif" data-bs-toggle="tab"
                        href="#kt_user_view_overview_tab">Overview</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 @if ($securityError) active @endif" data-kt-countup-tabs="true" data-bs-toggle="tab"
                        href="#kt_user_view_overview_security">Security</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade @if (!$securityError && !$overviewError) show active @endif" id="kt_user_view_overview_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h2>Personal Information</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body p-9 pt-0">
                            <!--begin::Form-->
                            <form action="{{ route('admin.profile.update') }}" class="form mb-3" method="post"
                                id="update-profile-form" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid   " id="name" name="name"
                                            value="{{ old('name') ?? auth()->user()['name'] }}" />
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
                                        <input type="email" class="form-control form-control-solid bg-secondary" disabled
                                            id="email" name="email" value="{{ auth()->user()['email'] }}" />
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
                                    <input type="text" class="form-control form-control-solid" value="Super Admin"
                                        name="role" id="role" placeholder="Role" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Submit-->
                                <button type="submit" class="btn btn-primary"
                                    onclick="confirmFormSubmit(event, 'update-profile-form')">
                                    <!--begin::Indicator-->
                                    <span class="indicator-label">Update Profile</span>
                                    <!--end::Indicator-->
                                </button>
                                <!--end::Submit-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade @if ($securityError) show active @endif" id="kt_user_view_overview_security" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Change Password</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Aside content-->
                        <div class="card-body p-9 pt-0">
                            <!--begin:::Form-->
                            <form action="{{ route('admin.password.custom.update') }}" class="form mb-3"
                                method="post" id="changePasswordForm">
                                @csrf
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="old_password">Old Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" name="old_password" type="password"
                                        id="old_password" autocomplete="off" placeholder="Old Password" />
                                    <!--end::Input-->
                                    @error('old_password')
                                        <span class="text-danger small">
                                            <strong>{{ $message }}</strong>
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
                                    <input class="form-control form-control-solid" name="new_password" type="password"
                                        id="new_password" autocomplete="off" placeholder="New Password" />
                                    <!--end::Input-->
                                    @error('new_password')
                                        <span class="text-danger small">
                                            <strong>{{ $message }}</strong>
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
                                    <input class="form-control form-control-solid" type="password"
                                        placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
                                    <!--end::Input-->
                                    @error('confirm_password')
                                        <span class="text-danger small">
                                            <strong>{{ $message }}</stro>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Submit-->
                                <button type="submit" onclick="confirmFormSubmit(event, 'changePasswordForm')"
                                    class="btn btn-primary" id="bank_submit_button">
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
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
@endsection

@section('script')

@endsection
