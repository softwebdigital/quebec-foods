@extends('layouts.admin')

@section('pageTitle', 'Settings')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Settings</a></li>
@endsection

@section('content')
<!--begin::Inbox App - Messages -->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-lg-7 me-xl-10">
        <!--begin::Card-->
        <div class="card ">
            <div class="card-body p-9">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h4 class="mb-5">Bank Details</h4>
                </div>
                <!--end::Card title-->
               <!--begin:::Form-->
               <form class="form mb-3" method="post" action="{{ route('admin.bank.update') }}" id="update-bank-form">
                @csrf
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="bank_name">Bank Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="bank_name" aria-label="Select a Bank" data-control="select2" class="form-select form-select-solid text-dark" id="bankList">
                            @if(count($banks) > 0)
                                <option value="">Select Bank</option>
                                @foreach($banks as $bank)
                                    <option @if(old("bank_name") == $bank['name'] || $setting['bank_name'] == $bank['name']) selected @endif value="{{ $bank['name'] }}" data-code="{{ $bank['code'] }}">{{ $bank['name'] }}</option>
                                @endforeach
                            @else
                                <option value="">Error Fetching Banks</option>
                            @endif
                        </select>
                        @error('bank_name')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="hidden" id="bankCode" value="@if(count($banks) > 0) @foreach($banks as $bank) @if($setting['bank_name'] == $bank['name']) {{ $bank['code'] }} @endif @endforeach @endif">
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-5 fv-row">
                     <!--end::Label-->
                     <label class="required fs-5 fw-bold mb-2" for="account_number">Account Number</label>
                     <!--end::Label-->
                     <!--end::Input-->
                     <input type="text" value="{{ old("account_number") ?? $setting['account_number'] }}" class="form-control form-control-solid" name="account_number" id="account_number">
                     @error('account_number')
                         <span class="text-danger small" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-5 fv-row">
                    <!--begin::Label-->
                    <label for="account_name" class="fs-5 fw-bold mb-2 d-flex justify-content-between">
                        <span class="d-block">Account Name <span class="text-danger">*</span></span>
                        <span id="verifyingDisplay" class="small d-block"></span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" value="{{ old("account_name") ?? $setting['account_name'] }}" readonly class="form-control form-control-solid bg-secondary" name="account_name" id="account_name">
                    <!--end::Input-->
                    @error('account_name')
                        <span class="text-manger small">
                            <span>Account name not verified</span>
                        </span>
                    @enderror
                </div>
                <!--end::Input group-->
                <!--begin::Submit-->
                <button type="button" onclick="confirmFormSubmit(event, 'update-bank-form')" class="btn btn-primary">
                    <!--begin::Indicator-->
                    <span class="indicator-label">Update Account Details</span>
                    <!--end::Indicator-->
                </button>
                <!--end::Submit-->
            </form>
            <!--end:::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-100 w-lg-500px mb-10 mb-lg-0">
        <!--begin::Sticky aside-->
        <div class="card card-flush mb-0" data-kt-sticky="false" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '0px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <!--begin::Aside content-->
            <div class="card-body p-9">
                <!--begin::Card title-->
                <div class="card-title flex-column">
                    <h4 class="mb-5">Other Settings</h4>
                </div>
                <!--end::Card title-->
                <!--begin:::Form-->
                <form action="{{ route('admin.settings.save') }}" class="form mb-3" method="post" id="otherSettingForm">
                    @csrf
                    {{-- <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="base_currency">Base Currency</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="base_currency" aria-label="Select the Base Currency" data-placeholder="Select the base currency" data-control="select2" class="form-select form-select-solid text-dark" id="currencyList">
                            <option value=""></option>
                            <option @if($setting['base_currency'] == "NGN") selected @endif value="NGN">NGN</option>
                            <option @if($setting['base_currency'] == "USD") selected @endif value="USD">USD</option>
                        </select>
                        @error('base_currency')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <label class="required fs-5 fw-bold mb-2" for="rate_plus">Rate</label>
                    <div class="input-group mb-5">
                        <span class="input-group-text">{{ $setting['usd_to_ngn'] }} ±</span>
                        <input type="number" id="rate_plus" step="any" name="rate_plus" value="{{ old('rate_plus') ?? $setting['rate_plus']}}" class="form-control form-control-solid" placeholder="0.00"/>
                    </div>
                    <!--end::Input group--> --}}

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" name="show_cash" type="checkbox" @if($setting['show_cash'] == 1) checked @endif value="yes" id="showCash"/>
                        <label class="form-check-label" for="showCash">
                            Auto show cash details on dashboard
                        </label>
                    </div>

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" name="invest" @if($setting['invest'] == 1) checked @endif value="yes" type="checkbox" id="makeInvestment"/>
                        <label class="form-check-label" for="makeInvestment">
                            Enable users make investments
                        </label>
                    </div>

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" type="checkbox" name="rollover" @if($setting['rollover'] == 1) checked @endif value="yes" id="makeInvestmentRollover"/>
                        <label class="form-check-label" for="makeInvestmentRollover">
                            Enable investments rollover
                        </label>
                    </div>

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" type="checkbox" @if($setting['withdrawal'] == 1) checked @endif name="withdrawal" value="yes" id="makeWithdrawal"/>
                        <label class="form-check-label" for="makeWithdrawal">
                            Enable users make withdrawals
                        </label>
                    </div>

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" type="checkbox" name="auto_delete_users" value="yes" @if($setting['auto_delete_unverified_users'] == 1) checked @endif id="autoDelete"/>
                        <label class="form-check-label" for="autoDelete">
                            Auto delete unverified users
                        </label>
                    </div>
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row" style="display: none" id="deletionInfo">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="autoDeleteDuration">Delete After</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="delete_duration" aria-label="Delete After" data-control="select2" class="form-select form-select-solid text-dark" id="autoDelete">
                            <option @if($setting['auto_delete_unverified_users_after'] == '3 days') selected @endif value="3 days">3 days</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '1 week') selected @endif value="1 week">1 week</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '2 week') selected @endif value="2 week">2 weeks</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '3 week') selected @endif value="3 week">3 weeks</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '1 month') selected @endif value="1 month">1 month</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '2 months') selected @endif value="2 months">2 months</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '3 months') selected @endif value="3 months">3 months</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '6 months') selected @endif value="6 months">6 months</option>
                            <option @if($setting['auto_delete_unverified_users_after'] == '1 year') selected @endif value="1 year">1 year</option>
                        </select>
                        @error('delete_duration')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" type="checkbox" name="pending_transaction_mail" value="yes" @if($setting['pending_transaction_mail'] == 1) checked @endif id="pendingTransaction"/>
                        <label class="form-check-label" for="pendingTransaction">
                            Send email on pending transactions
                        </label>
                    </div>
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row" style="display: none" id="pendingTransactionDuration">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="pendingTransactionDurationBox">Check for pending transactions every</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="pending_transaction_mail_interval" data-control="select2" class="form-select form-select-solid text-dark" id="pendingTransactionDurationBox">
                            <option @if($setting['pending_transaction_mail_interval'] == '1 minute') selected @endif value="1 minute">1 minute</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '2 minutes') selected @endif value="2 minutes">2 minutes</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '5 minutes') selected @endif value="5 minutes">5 minutes</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '10 minutes') selected @endif value="10 minutes">10 minutes</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '15 minutes') selected @endif value="15 minutes">15 minutes</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '30 minutes') selected @endif value="30 minutes">30 minutes</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '1 hour') selected @endif value="1 hour">1 hour</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '2 hours') selected @endif value="2 hours">2 hours</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '3 hours') selected @endif value="3 hours">3 hours</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '6 hours') selected @endif value="6 hours">6 hours</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '12 hours') selected @endif value="12 hours">12 hours</option>
                                <option @if($setting['pending_transaction_mail_interval'] == '24 hours') selected @endif value="24 hours">24 hours</option>
                        </select>
                        @error('pending_transaction_mail_interval')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->

                    <div class="form-check form-switch form-check-custom form-check-solid my-10">
                        <input class="form-check-input h-20px w-30px" type="checkbox" value="yes" @if($setting['exchange_rate_error_mail'] == 1) checked @endif id="exchangeRateError"/>
                        <label class="form-check-label" for="exchangeateError">
                            Send email on exchange rate update error
                        </label>
                    </div>
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row" style="display: none" id="updateErrorInfo">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="updateErrorInfoDuration">On rate update error, resend email after</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="error_mail_interval" data-control="select2" class="form-select form-select-solid text-dark" id="updateErrorInfoDuration">
                            <option @if($setting['error_mail_interval'] == '30 minutes') selected @endif value="30 minutes">30 minutes</option>
                            <option @if($setting['error_mail_interval'] == '1 hour') selected @endif value="1 hour">1 hour</option>
                            <option @if($setting['error_mail_interval'] == '2 hours') selected @endif value="2 hours">2 hours</option>
                            <option @if($setting['error_mail_interval'] == '3 hours') selected @endif value="3 hours">3 hours</option>
                            <option @if($setting['error_mail_interval'] == '6 hours') selected @endif value="6 hours">6 hours</option>
                            <option @if($setting['error_mail_interval'] == '12 hours') selected @endif value="12 hours">12 hours</option>
                            <option @if($setting['error_mail_interval'] == '24 hours') selected @endif value="24 hours">24 hours</option>
                        </select>
                        @error('error_mail_interval')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Submit-->
                    <button type="submit" onclick="confirmFormSubmit(event, 'otherSettingForm')" class="btn btn-primary" id="bank_submit_button">
                        <!--begin::Indicator-->
                        <span class="indicator-label">Update Settings</span>
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
<!--end::Inbox App - Messages -->
@endsection

@section('script')
<script>
    $(document).ready(function (){
        let bankList = $('#bankList');
        let bankCode = $('#bankCode');
        let accountNumber = $('#account_number');
        let accountName = $('#account_name');
        let verifyingDisplay = $('#verifyingDisplay');
        let submitButton = $('#submitButton');
        let autoDelete = $('#autoDelete');
        let deletionInfo = $('#deletionInfo');
        let exchangeRateError = $('#exchangeRateError');
        let updateErrorInfo = $('#updateErrorInfo');
        let pendingTransaction = $('#pendingTransaction');
        let pendingTransactionDuration = $('#pendingTransactionDuration');
        if (bankList.val() && accountName.val() && accountNumber.val())
            submitButton.prop('disabled', false);
        checkForAutoDelete();
        checkForErrorInfo();
        checkForPendingTransactionNotification();
        bankList.on('change', function (){
            $("#bankList option").each(function(){
                if($(this).val() === $('#bankList').val()){
                    bankCode.val($(this).attr('data-code'))
                }
            });
            verifyAccountNumber();
        });
        accountNumber.on('input', verifyAccountNumber);
        autoDelete.on('change', checkForAutoDelete);
        exchangeRateError.on('change', checkForErrorInfo);
        pendingTransaction.on('change', checkForPendingTransactionNotification);
        $('.toggleSideBar').each(function (){
            $(this).on('change', function (){
                if ($(this).val() === 'dark'){
                    $('body').addClass('sidebar-dark');
                }else if($(this).val() === 'light'){
                    $('body').removeClass('sidebar-dark');
                }
            });
        });
        function checkForPendingTransactionNotification()
        {
            if (pendingTransaction.prop('checked')){
                // pendingTransactionDuration.show(500);
                pendingTransactionDuration.removeClass('d-none');
            }else{
                // pendingTransactionDuration.hide(500);
                pendingTransactionDuration.addClass('d-none');
            }
        }
        function checkForErrorInfo(){
            if (exchangeRateError.prop('checked')){
                updateErrorInfo.removeClass('d-none');
            }else{
                updateErrorInfo.addClass('d-none');
            }
        }
        function checkForAutoDelete(){
            if (autoDelete.prop('checked')){
                deletionInfo.removeClass('d-none');
            }else{
                deletionInfo.addClass('d-none');
            }
        }
        function verifyAccountNumber(){
            if (bankList.val() && accountNumber.val().length === 10 && bankCode.val()){
                verifyingDisplay.text('Verifying account number...');
                verifyingDisplay.removeClass('d-none');
                verifyingDisplay.removeClass('text-danger');
                verifyingDisplay.removeClass('text-success');
                verifyingDisplay.addClass('text-info');
                $.ajax({
                    url: "https://api.paystack.co/bank/resolve",
                    data: { account_number: accountNumber.val(), bank_code: bankCode.val().trim() },
                    type: "GET",
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('Authorization', 'Bearer {{ env('PAYSTACK_SECRET_KEY') }}');
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.setRequestHeader('Accept', 'application/json');
                    },
                    success: function(res) {
                        verifyingDisplay.removeClass('text-info');
                        verifyingDisplay.addClass('text-success');
                        verifyingDisplay.text('Account details verified');
                        accountName.val(res.data.account_name);
                        submitButton.prop('disabled', false);
                    },
                    error: function (err){
                        let msg = 'Error processing verification';
                        verifyingDisplay.removeClass('text-info');
                        verifyingDisplay.addClass('text-danger');
                        submitButton.prop('disabled', true);
                        if (parseInt(err.status) === 422){
                            msg = 'Account details doesn\'t match any record';
                        }
                        verifyingDisplay.text(msg);
                    }
                });
            }else{
                accountName.val("");
                verifyingDisplay.addClass('d-none');
            }
        }
    });
</script>
@endsection
