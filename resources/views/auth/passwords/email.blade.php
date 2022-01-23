@extends('layouts.auth')

@section('content')
    <!--begin::Wrapper-->
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Forgot Password ?</h1>
                <!--end::Title-->
                <!--begin::Link-->
                <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
                <!--end::Link-->
            </div>
            @if (session('status'))
                <div class="d-flex align-items-center bg-success rounded p-5 mb-7">
                    <span class="svg-icon svg-icon-success me-3">
                        <i class="fas fa-check-circle text-light" style="width: 18px"></i>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-light text-hover-primary fs-6">{{ session('status') }}</span>
                    </div>
                </div>
            @endif
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                @error('email')
                    <span class="text-danger small">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                    <span class="indicator-label">Submit</span>
                </button>
                <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
@endsection
