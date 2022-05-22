@extends('layouts.user')

@section('pageTitle', 'New '.ucfirst($type).' Investment')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="{{ route('packages', $type) }}" class="@if (request()->routeIs(['packages'])) text-dark @else text-muted @endif">{{ ucfirst($type) }} Package</a></li>
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Invest</a></li>
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
                            <select name="package" aria-label="Select the package" data-placeholder="Select the package" data-control="select2" class="form-select form-select-solid text-dark" id="package">
                                <option value="">Select Package</option>
                                @foreach($packages as $package)
                                    <option @if((old('package') == $package['name']) || (request('package') == $package['name'])) selected @endif value="{{ $package['name'] }}" data-rollover="{{ $package['rollover'] }}" data-price="{{ $package['price'] }}" data-roi="{{ $package['roi'] }}" data-duration="{{ $package['duration'] }}" data-duration-mode="{{ $package['duration_mode'] }}">{{ $package['name'] }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" id="price">
                            <input type="hidden" id="roi">
                            <input type="hidden" id="duration">
                            <input type="hidden" id="durationMode">
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
                            <input type="text" placeholder="No of slots" value="{{ old("slots")}}" class="form-control form-control-solid" name="slots" id="slots">
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
                            <input type="text" value="₦ 0.00" class="form-control form-control-solid bg-secondary" name="amount" id="amount" disabled>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="returns">Expected Returns <span @if($type == 'plant') style="display: none" @endif id="returnInfo"></span></label>
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
                            <select name="payment" aria-label="Select payment mode" data-placeholder="Select payment mode" class="form-select form-select-solid text-dark" id="payment">
                                <option value="">Select payment mode </option>
                                <option value="wallet">Wallet</option>
                                <!-- <option value="card">Card</option> -->
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
                        <div id="bankDetails" style="display: none" class="alert bg-secondary">
                            <table>
                                <tr>
                                    <h6>Local Bank Details</h6>
                                </tr>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ms-3">{{ $setting['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ms-3">{{ $setting['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number:</td>
                                    <td><span class="ms-3">{{ $setting['account_number'] }}</span></td>
                                </tr>
                            </table>
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <h6>International Bank Details</h6>
                                </tr>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ms-2">{{ $international['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ms-2">{{ $international['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number: </td>
                                    <td><span class="ms-2">{{ $international['account_number'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Added Information: </td>
                                    <td><span class="ms-2">{{ $international['added_information'] }}</span></td>
                                </tr>
                            </table>
                        </div>
                        @if ($type == 'farm')
                            <div id="rolloverInvestment" class="form-check form-switch form-check-custom form-check-solid me-10">
                                <input required class="form-check-input h-30px w-50px" type="checkbox" value="yes" id="rollover" name="rollover"/>
                                <label class="form-check-label" for="rollover">
                                    Rollover Investment
                                </label>
                            </div>
                        @endif
                        <div class="form-check mt-7 mb-10 form-check-flat form-check-primary">
                            <label class="form-check-label">
                                I hereby agree to the <a href="" target="_blank">terms and conditions</a>
                                <input required type="checkbox" id="agreed" class="form-check-input">
                            </label>
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
        $(document).ready(function (){
            let packageName = $('#package');
            let slots = $('#slots');
            let slotInfo = $('#slotInfo');
            let price = $('#price');
            let roi = $('#roi');
            let duration = $('#duration');
            let durationMode = $('#durationMode');
            let amount = $('#amount');
            let returns = $('#returns');
            let returnInfo = $('#returnInfo');
            let payment = $('#payment');
            let bankDetails = $('#bankDetails');
            let securedByPaystack = $('#securedByPaystack');
            let submitButton = $('#submitButton');
            let agreed = $('#agreed');
            let nairaWalletBalance = parseFloat({{ auth()->user()['wallet']['balance'] }});
            let rolloverInvestment = $('#rolloverInvestment');
            agreed.on('change', checkIfFormCanSubmit);
            payment.on('change', function (){
                if (payment.val() === 'deposit') {
                    bankDetails.show(500);
                    securedByPaystack.hide(500);
                }else if(payment.val() === 'card'){
                    bankDetails.hide(500);
                    securedByPaystack.show(500);
                }else {
                    bankDetails.hide(500);
                    securedByPaystack.hide(500);
                }
                checkIfFormCanSubmit();
            });
            setFieldsForInvestment();
            packageName.on('change', setFieldsForInvestment);
            function setFieldsForInvestment()
            {
                rolloverInvestment.hide();
                $("#package option").each(function(){
                    if($(this).val() === packageName.val()){
                        price.val($(this).attr('data-price'));
                        roi.val($(this).attr('data-roi'));
                        duration.val($(this).attr('data-duration'));
                        durationMode.val($(this).attr('data-duration-mode'));
                        if (packageName.val() && ($(this).attr('data-rollover') == 1)) {
                            rolloverInvestment.show();
                        }
                    }
                });
                computeAmount();
            }
            slots.on('input', computeAmount);
            function computeAmount(){
                if (packageName.val()){
                    returnInfo.html('after <b>'+ duration.val() +' ' + durationMode.val() + '(s)</b>');
                    slotInfo.text('₦ ' + price.val() + '/slot' );
                }else{
                    returnInfo.html('');
                    slotInfo.text('');
                }
                if (packageName.val() && slots.val() && (slots.val() > 0)){
                    amount.val('₦ ' + numberFormat((slots.val() * price.val()).toFixed(2)));
                    returns.val('₦ ' + numberFormat((slots.val() * price.val() * ((parseInt(roi.val()) + 100) / 100)).toFixed(2)));
                }
                checkIfFormCanSubmit();
            }
            function checkIfFormCanSubmit(){
                if (packageName.val() && slots.val() && (slots.val() > 0) && payment.val() && agreed.prop('checked')){
                    if (payment.val() === 'wallet'){
                        if ((slots.val() * price.val()) <= nairaWalletBalance ){
                            submitButton.removeAttr('disabled');
                            slots.css('borderColor', '#10B759');
                        }else{
                            submitButton.prop('disabled', true);
                            slots.css('borderColor', 'red');
                        }
                    }else{
                        submitButton.removeAttr('disabled');
                        slots.css('borderColor', '#10B759');
                    }
                }else{
                    submitButton.prop('disabled', true);
                }
            }
        });
    </script>
@endsection
