@extends('layouts.admin')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="#" class="text-muted">Users</a></li>
    <li class="breadcrumb-item"><a href="#" class="text-dark">Wallet Details</a></li>
@endsection

@section('content')
    @include('admin.user.partials.navbar', ['user' => $user])
    <!--begin::Referral program-->
    <div class="row">
        <div class="col-md-7">
            <div class="card mb-5 mb-xl-10">
                <!--begin::Body-->
                <div class="card-body py-10">
                    <h2 class="mb-9">Wallet Details</h2>
                    <!--begin::Stats-->
                    <div class="">
                        <!--begin::Col-->
                        <div class="">
                            <div class="card card-dashed flex-center my-3 p-6">
                                <span class="fs-4 fw-bold text-success pb-1 px-2">Balance</span>
                                <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">₦
                                <span data-kt-countup="true" data-kt-countup-value="{{ number_format($user->wallet['balance'], 2) }}">{{number_format($user->wallet['balance'], 2) }}</span></span>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="d-flex justify-content-around align-items-center mt-10">
                            <div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-success min-w-125px">Top Up Wallet</button>
                            </div>
                            <div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#withdrawalModal" class="btn btn-danger min-w-125px">Debit Wallet</button>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
    <!--end::Referral program-->
@endsection

@section('script')

@endsection
