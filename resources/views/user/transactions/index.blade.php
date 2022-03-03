@extends('layouts.user')

@section('pageTitle', 'Transactions')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-muted">Transactions</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">{{ ucfirst($type) }}</a></li>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ ucfirst($type) }} Transactions</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4" id="data-table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 text-dark rounded-start">SN</th>
                            <th class="text-dark">Amount</th>
                            <th class="text-dark">Description</th>
                            <th class="text-dark">Date</th>
                            <th class="text-dark text-center">Details</th>
                            <th class="text-dark">Method</th>
                            <th class="text-dark">Channel</th>
                            <th class="text-dark rounded-end">Status</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transactions as $key=>$transaction )
                            <tr>
                                @php
                                    $bank = json_decode($transaction['preferred_bank'], true);
                                    if($transaction['type'] == 'withdrawal' && $bank){
                                        $bank_id = $bank['id'];
                                        $bank_detail = \App\Models\BankAccounts::find($bank_id);
                                        $bank_name = $bank_detail['bank_name'];
                                        $account_name = $bank_detail['account_name'];
                                        $account_number = $bank_detail['account_number'];
                                        $details = '<button data-bs-toggle="modal" onclick="populateTransactionDetails(\''.$account_name.'\', \''.$account_number.'\', \''.$bank_name.'\');" data-bs-target="#transactionDetailModal" class="btn btn-sm btn-primary" type="button">
                                                        View
                                                    </button>';
                                    }else{
                                        $details = '---';
                                    }
                                @endphp
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ {{ number_format($transaction['amount']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['description'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['created_at']->format('M d, Y') }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-center">{!! $details !!}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['method'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['channel'] }}</span></td>
                                <td>
                                    @if($transaction['status'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($transaction['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($transaction['status'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->

        <div class="modal fade" tabindex="-1" id="transactionDetailModal">
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
                        <table class="table table-borderless">
                            <tr>
                                <th class="fw-bolder">Account Name: </th>
                                <td id="accountName"></td>
                            </tr>
                            <tr>
                                <th class="fw-bolder">Account Number: </th>
                                <td id="accountNumber"></td>
                            </tr>
                            <tr>
                                <th class="fw-bolder">Bank Name: </th>
                                <td id="bankName"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function populateTransactionDetails(accountName, accountNumber, bankName) {
        $('#accountName').text(accountName);
        $('#accountNumber').text(accountNumber);
        $('#bankName').text(bankName);
    }
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
@endsection

