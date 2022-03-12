@extends('layouts.auth')

@section('pageTitle', 'Two-Factor')

@section('content')
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" method="POST" action="{{ route('verify.store') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-3">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Two-Factor Verification</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">You have received an email which contains two factor login code.
                If you haven't received it, press <a class="link-primary fw-bolder" href="{{ route('verify.resend') }}">here</a>.</div>
            <!--end::Link-->
            @if (session('error'))
                <div class="d-flex align-items-center bg-danger rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-success me-3">
                        <i class="fas fa-exclamation-circle text-light" style="width: 18px"></i>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('error') }}</span>
                    </div>
                </div>
            @elseif(session('success'))
                <div class="d-flex align-items-center bg-success rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-success me-3">
                        <i class="fas fa-check-circle text-light" style="width: 18px"></i>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('success') }}</span>
                    </div>
                </div>
            @elseif(session('info'))
                <div class="d-flex align-items-center bg-warning rounded p-4 mb-7">
                    <span class="svg-icon svg-icon-success me-3">
                        <i class="fas fa-exclamation-triangle text-light" style="width: 18px"></i>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('info') }}</span>
                    </div>
                </div>
            @endif
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">Code</label>
            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="two_factor_code" value="{{ old('two_factor_code') }}" required/>
            @error('two_factor_code')
                <span class="text-danger small">
                    <span>{{ $message }}</span>
                </span>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Verify</span>
            </button>
            <!--end::Submit button-->
        </div>
        <div class="text-center">
            <a class="link-primary fw-bolder" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Use a different account</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endsection
