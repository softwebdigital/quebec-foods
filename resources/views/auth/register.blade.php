@extends('layouts.auth')

@section('content')
<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('register') }}">
        @csrf()
        <!--begin::Heading-->
        <div class="mb-10 text-center">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Create an Account</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"/>
                @error('first_name')
                    <span class="text-danger small">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"/>
                @error('last_name')
                    <span class="text-danger small">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
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
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
                @error('password')
                    <span class="text-danger small">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
        </div>
        <!--end::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Referral Code</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="ref" value="{{ request('ref') }}"/>
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
            </label>
            @error('toc')
                <span class="text-danger small">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg w-100 btn-primary">
                <span class="indicator-label">Create Account</span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
@endsection

@section('script')
    <script>

    </script>
@endsection
