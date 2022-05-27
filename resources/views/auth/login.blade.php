@extends('layouts.auth')

@section('pageTitle', 'Login')

@section('content')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" method="POST" action="{{ route('login') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Sign In</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">New Here?
            <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a></div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        @if (session('error'))
            <div class="d-flex align-items-center bg-danger rounded p-5 mb-7">
                <span class="svg-icon svg-icon-danger me-3">
                    <i class="fas fa-check-circle text-light" style="width: 18px"></i>
                </span>
                <div class="flex-grow-1 me-2">
                    <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('error') }}</span>
                </div>
            </div>
         @endif
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
            @error('email')
                <span class="text-danger small">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-danger small">
                            <span>{{ $message }}</span>
                        </span>
                    @enderror
                    <!--end::Input wrapper-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Input group=-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Login</span>
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
@endsection
