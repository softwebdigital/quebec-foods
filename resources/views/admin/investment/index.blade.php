@extends('layouts.admin')

@section('pageTitle','Investments')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="javascript:void()" class="text-muted">{{ ucfirst($type) }} Investments</a></li>
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">{{ ucfirst($filter) }}</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{ ucfirst($filter) }} {{ ucfirst($type) }} Investments</span>
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
                        <th class="text-dark">Package</th>
                        <th class="text-dark">Slots</th>
                        <th class="text-dark" style="white-space: nowrap;">Total Invested</th>
                        <th class="text-dark" style="white-space: nowrap;">Expected Returns</th>
                        <th class="text-dark" style="white-space: nowrap;">Return Date</th>
                        <th class="text-dark">Status</th>
                        <th class="ps-4 text-dark rounded-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
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
                "url": "{{ route('admin.investments.ajax', ['type' => $type, 'filter' => $filter]) }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "sn" },
                { "data": "name" },
                { "data": "package" },
                { "data": "slots" },
                { "data": "total_invested" },
                { "data": "expected_returns" },
                { "data": "return_date" },
                { "data": "status" },
                { "data": "action" }
            ],
            "lengthMenu": [50, 100, 200, 500]
        });
    });
</script>
@endsection
