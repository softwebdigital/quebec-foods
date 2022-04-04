@extends('layouts.admin')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}" class="text-muted">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Wallet Details</a></li>
@endsection

@section('content')
    @include('admin.user.partials.navbar', ['user' => $user])

    <!--begin::Referral program-->
<div class="row">
    <div class="col-xxl-4 col-md-4 mb-xxl-10">
        <!--begin::Mixed Widget 1-->
        <div class="card h-md-100">
            <!--begin::Body-->
            <div class="card-body p-0">
                <!--begin::Header-->
                <div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
                    <!--begin::Heading-->
                    <div class="d-flex flex-stack">
                        <h3 class="m-0 text-white fw-bolder fs-3">Summary</h3>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Balance-->
                    <div class="d-flex text-center flex-column text-white pt-8">
                        <span class="fw-bold fs-7">Your Balance</span>
                        <span class="fs-2x fw-bolder">₦
                        <span data-kt-countup="true" data-kt-countup-value="{{ number_format($data['wallet']) }}" class="fw-bolder fs-2x pt-1">{{ number_format($data['wallet']) }}</span>
                    </div>
                    <!--end::Balance-->
                </div>
                <!--end::Header-->
                <!--begin::Items-->
                <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1" style="margin-top: -100px">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px w-40px me-5">
                            <span class="symbol-label bg-lighten">
                                <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="black" />
                                        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center flex-wrap w-100">
                            <!--begin::Title-->
                            <div class="mb-1 pe-3 flex-grow-1">
                                <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</span>
                                <div class="text-gray-400 fw-bold fs-7">Transactions</div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="d-flex align-items-center">
                                <div class="fw-bolder fs-5 text-gray-800 pe-1">₦{{ $data['transactions'] }}</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px w-40px me-5">
                            <span class="symbol-label bg-lighten">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center flex-wrap w-100">
                            <!--begin::Title-->
                            <div class="mb-1 pe-3 flex-grow-1">
                                <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</span>
                                <div class="text-gray-400 fw-bold fs-7">Investments</div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="d-flex align-items-center">
                                <div class="fw-bolder fs-5 text-gray-800 pe-1">₦{{ $data['investments']['pendingInvestments'] }}</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px w-40px me-5">
                            <span class="symbol-label bg-lighten">
                                <!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z" fill="black" />
                                        <path d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Description-->
                        <div class="d-flex align-items-center flex-wrap w-100">
                            <!--begin::Title-->
                            <div class="mb-1 pe-3 flex-grow-1">
                                <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Active</span>
                                <div class="text-gray-400 fw-bold fs-7">Investments</div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="d-flex align-items-center">
                                <div class="fw-bolder fs-5 text-gray-800 pe-1">₦{{ $data['investments']['activeInvestments'] }}</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Items-->
                <div class="d-flex justify-content-around align-items-center my-7">
                    <div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#depositModal" class="btn btn-primary min-w-125px">Top Up</button>
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
            </div>
            <!--end::Body-->

        </div>
        <!--end::Mixed Widget 1-->
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
                            @foreach ($user->bankAccounts()->get() as $bank)
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
                                <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success w-50" data-kt-button="true" for="cardPayment">
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
        let withdrawInput = $('#amountWithdraw');
        let depositInput = $('#amountDeposit');

        bankDetails.hide(500);
        securedLogo.hide(500);
        cardPayment.on('click', function (){
            bankDetails.hide(500);
            securedLogo.show(500);
        });
        depositPayment.on('click', function (){
            bankDetails.show(500);
            securedLogo.hide(500);
        });

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
