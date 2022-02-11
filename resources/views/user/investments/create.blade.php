@extends('layouts.user')

@section('pageTitle', 'New '.ucfirst($type).' Investment')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="#" class="text-muted">{{ ucfirst($type) }}</a></li>
<li class="breadcrumb-item"><a href="" class="text-muted">Invest</a></li>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-lg-row-fluid me-lg-7 me-xl-10">
    <!--begin::Card-->
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-body p-9">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h4 class="mb-5">{{ ucfirst($type) }} Investment</h4>
                    </div>
                    <!--end::Card title-->
                    <!--begin:::Form-->
                    <form class="form mb-3" method="post" action="{{ route('invest.store') }}" id="createInvestForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Input-->
                            <label class="required fs-5 fw-bold mb-2" for="package">Select package</label>
                            <select name="package" aria-label="Select the package" data-placeholder="Select the package" data-control="select2" class="form-select text-dark" id="package">
                                <option value="">Select Package</option>
                                @foreach($packages as $package)
                                    <option @if((old('package') == $package['name']) || (request('package') == $package['name'])) selected @endif value="{{ $package['name'] }}" data-price="{{ $package['price'] }}" data-roi="{{ $package['roi'] }}" data-duration="{{ $package['duration'] }}">{{ $package['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="price">
                            <input type="hidden" id="roi">
                            <input type="hidden" id="duration">
                            @error('package')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="slots">No of Slots</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="No of slots" value="{{ old("slots")}}" class="form-control" name="slots" id="slots">
                            @error('slots')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amount">Amount to Invest</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="₦ 0.00" class="form-control form-control-solid" name="amount" id="amount" disabled>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="returns">Expected Returns</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" value="₦ 0.00" disabled class="form-control form-control-solid" name="returns" id="returns">
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="payment">Pay Via</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="payment" aria-label="Select the paymeny mode" data-placeholder="Select the payment mode" data-control="select2" class="form-select text-dark" id="payment">
                                <option value=""></option>
                                <option value="wallet">Naira Wallet</option>
                                <option value="card">Card</option>
                                <option value="deposit">Deposit / Bank Transfer</option>
                            </select>
                            @error('payment')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <div id="securedByPaystack" style="display: none" class="mx-auto text-center">
                            <img src="{{ asset('assets/photos/paystack.png') }}" class="img-fluid mb-3" alt="Secured-by-paystack">
                        </div>
                        <div id="bankDetails" style="display: none" class="alert alert-fill-light">
                            <table>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ml-3">{{ $setting['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ml-3">{{ $setting['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number:</td>
                                    <td><span class="ml-3">{{ $setting['account_number'] }}</span></td>
                                </tr>
                            </table>
                        </div>
                        @if ($setting['invest'] == 1)
                        <!--begin::Submit-->
                        <button type="button" disabled onclick="confirmFormSubmit(event, 'createInvestForm')" id="submitButton" class="btn btn-primary w-100">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Invest</span>
                            <!--end::Indicator-->
                        </button>
                        <!--end::Submit-->
                        @else
                            <!--begin::Submit-->
                            <button type="button" disabled class="btn btn-primary w-100">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Unavailabe</span>
                                <!--end::Indicator-->
                            </button>
                            <!--end::Submit-->
                        @endif
                    </form>
                    <!--end:::Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
</div>
<!--end::Content-->
@endsection

@section('script')
<script>
</script>
@endsection
