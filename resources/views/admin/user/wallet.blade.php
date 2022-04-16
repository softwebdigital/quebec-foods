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
                    <form class="form mb-3" action="{{ route('admin.withdraw') }}" method="post" id="adminwithdrawalForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amountWithdraw">Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Amount" value="{{ old("amount") }}" class="form-control form-control-solid" name="amount" id="amountWithdraw">
                            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                            @error('amount')
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
                    @can('Withdraw For Users')
                        <button type="button" onclick="confirmFormSubmit(event, 'adminwithdrawalForm')" class="btn btn-primary">Process Withdrawal</button>
                    @endcan
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
                    <form class="form mb-3" action="{{ route('admin.deposit') }}" method="post" id="admindepositForm" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="amountDeposit">Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Amount" value="{{ old("amount") }}" class="form-control form-control-solid" name="amount" id="amountDeposit">
                            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                            @error('amount')
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
                    @can('Deposit For Users')
                        <button type="button" onclick="confirmFormSubmit(event, 'admindepositForm')" class="btn btn-primary">Deposit</button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <!--end::Withdrawal Modal-->
@endsection

@section('script')

<script>
    $(document).ready(function () {
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
    })
</script>

@endsection
