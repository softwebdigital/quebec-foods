@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="d-flex align-items-center bg-success rounded p-5 mb-7">
                            <span class="svg-icon svg-icon-success me-3">
                                <i class="fas fa-check-circle text-light" style="width: 18px"></i>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <span class="fw-bolder text-light text-hover-primary fs-6">{{ __('A fresh verification link has been sent to your email address.') }}</span>
                            </div>
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--begin::Wrapper-->
<div class="pt-lg-10 mb-10 text-center">
    <!--begin::Logo-->
    <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Verify Your Email</h1>
    <!--end::Logo-->
    <!--begin::Message-->
    @if (session('resent'))
        <div class="d-flex align-items-center bg-success rounded p-5 mb-7">
            <span class="svg-icon svg-icon-success me-3">
                <i class="fas fa-check-circle text-light" style="width: 18px"></i>
            </span>
            <div class="flex-grow-1 me-2">
                <span class="fw-bolder text-light text-hover-primary fs-6">{{ __('A fresh verification link has been sent to your email address.') }}</span>
            </div>
        </div>
    @endif
    <div class="fs-3 fw-bold text-muted mb-10">We have sent an email to
    <span class="link-primary fw-bolder">{{ auth()->user()->email }}</span>
    <br />pelase follow a link to verify your email.</div>
    <!--end::Message-->
    <!--begin::Action-->
    <div class="text-center mb-10">
        <form class="d-inline" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-lg btn-primary fw-bolder">{{ __('Use a different email address') }}</button>.
        </form>
    </div>
    <!--end::Action-->
    <!--begin::Action-->
    <div class="fs-5">
        <span class="fw-bold text-gray-700">Did’t receive an email?</span>
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Resend') }}</button>.
        </form>
    </div>
    <!--end::Action-->
</div>
<!--end::Wrapper-->
@endsection
