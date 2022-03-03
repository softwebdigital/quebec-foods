@extends('layouts.admin')

@section('pageTitle','Transactions')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Transactions</a></li>
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
                        <th class="text-dark">Name</th>
                        <th class="text-dark">Amount</th>
                        <th class="text-dark">Description</th>
                        <th class="text-dark">Date</th>
                        <th class="text-dark">Details</th>
                        <th class="text-dark">Method</th>
                        <th class="text-dark">Channel</th>
                        <th class="text-dark">Status</th>
                        <th class="text-dark rounded-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
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
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ajax":{
                "url": "{{ route('admin.transactions.ajax', $type) }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "sn" },
                { "data": "name" },
                { "data": "amount" },
                { "data": "description" },
                { "data": "date" },
                { "data": "details" },
                { "data": "method" },
                { "data": "channel" },
                { "data": "status" },
                { "data": "action" }
            ],
            "lengthMenu": [50, 100, 200, 500]
        });
    });
</script>
@endsection
