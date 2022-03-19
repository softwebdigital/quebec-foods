@extends('layouts.user')

@section('pageTitle', 'Wallet')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Wallet</a></li>
@endsection

@section('content')
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
                                <span data-kt-countup="true" data-kt-countup-value="{{ number_format(auth()->user()->wallet['balance'], 2) }}">{{ number_format(auth()->user()->wallet['balance'], 2) }}</span></span>
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="d-flex justify-content-around align-items-center mt-10">
                            <div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-success min-w-125px">Top Up Wallet</button>
                            </div>
                            @if($setting['withdrawal'] == 1)
                                <div>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#withdrawalModal" class="btn btn-danger min-w-125px">Withdraw</button>
                                </div>
                            @else
                                <div>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#" class="btn btn-danger min-w-125px" disabled>Withdraw</button>
                                </div>
                            @endif
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
    <!--begin::Withdrawal Modal-->
    <div class="modal fade" tabindex="-1" id="withdrawalModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Withdrawal</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form class="form mb-3" action="{{ route('withdraw') }}" method="post" id="withdrawalForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amountWithdraw">Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Amount" value="{{ old("amount") }}" class="form-control form-control-solid" name="amount" id="amountWithdraw">
                            @error('amount')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="account">Select Account</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="account" aria-label="Select account" data-placeholder="Select account" value="{{ old("account") }}" data-control="select" class="form-select form-select-solid text-dark" id="account">
                                @foreach (auth()->user()->bankAccounts()->get() as $bank)
                                    <option value="{{ $bank['id'] }}">{{ $bank['bank_name']. " - ". $bank['account_number'] }}</option>
                                @endforeach
                            </select>
                            @error('account')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    @if ($setting['withdrawal'] == 1)
                        <button type="button" onclick="confirmFormSubmit(event, 'withdrawalForm')" class="btn btn-primary">Process Withdrawal</button>
                    @else
                        <button type="button" disabled class="btn btn-secondary">Unavailable</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::Withdrawal Modal-->

    <!--begin::Deposit Modal-->
    <div class="modal fade" tabindex="-1" id="depositModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deposit</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form class="form mb-3" action="{{ route('deposit') }}" method="post" id="depositForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amountDeposit">Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Amount" value="{{ old("amount") }}" class="form-control form-control-solid" name="amount" id="amountDeposit">
                            @error('amount')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="paymentDeposit">Payment Method</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="payment" aria-label="Payment method" data-placeholder="Select account" value="{{ old("payment") }}" data-control="select2" class="form-select form-select-solid text-dark" id="paymentDeposit">
                                <option value="card">Card</option>
                                <option value="deposit">Bank Transfer / Deposit</option>
                            </select>
                            @error('payment')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group--> --}}
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Payment Method</label>
                        <!--end::Label-->
                        <!--begin::Row-->
                            <div class="fv-row mb-7">
                                <!--begin::Radio group-->
                                <div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                                    <!--begin::Radio-->
                                    <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active w-50" data-kt-button="true" for="cardPayment">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="payment" id="cardPayment" value="card" />
                                    <!--end::Input-->
                                    Card</label>
                                    <!--end::Radio-->
                                    <!--begin::Radio-->
                                    <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success w-50" data-kt-button="true" for="depositPayment">
                                    <!--begin::Input-->
                                    <input class="btn-check" type="radio" name="payment" id="depositPayment" value="deposit" />
                                    <!--end::Input-->
                                    Bank Transfer</label>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Radio group-->
                                @error('payment')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        <!--end::Row-->
                        <div id="securedByPaystackLogo" class="mx-auto text-center">
                            <img src="{{ asset('assets/photos/paystack.png') }}" class="img-fluid mb-3" alt="Secured-by-paystack">
                        </div>
                        <div id="bankDetailsForDepositForm" style="display: none" class="alert mx-3 bg-secondary">
                            <table>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td><span class="ms-2">{{ $setting['bank_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Name:</td>
                                    <td><span class="ms-2">{{ $setting['account_name'] }}</span></td>
                                </tr>
                                <tr>
                                    <td>Account Number: </td>
                                    <td><span class="ms-2">{{ $setting['account_number'] }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="confirmFormSubmit(event, 'depositForm')" class="btn btn-primary">Deposit</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Withdrawal Modal-->
@endsection

@section('script')
<script>
    $(document).ready(function (){
        let cardPayment = $('#cardPayment');
        let depositPayment = $('#depositPayment');
        let bankDetails = $('#bankDetailsForDepositForm');
        let securedLogo = $('#securedByPaystackLogo');
        cardPayment.on('click', function (){
            bankDetails.hide(500);
            securedLogo.show(500);
        });
        depositPayment.on('click', function (){
            bankDetails.show(500);
            securedLogo.hide(500);
        });

        let withdrawInput = $('#amountWithdraw');
        let depositInput = $('#amountDeposit');

        withdrawInput.on('keyup', userInputAction);
        depositInput.on('keyup', userInputAction);

        function userInputAction (event) {
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }

            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }

            var $this = $( this );
            var input = $this.val();

            var input = input.replace(/[\D\s\._\-]+/g, "");

            input = input ? parseInt( input, 10 ) : 0;

            $this.val( function() {
                return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
        }
    });
</script>
@endsection
