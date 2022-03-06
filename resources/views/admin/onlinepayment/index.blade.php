@extends('layouts.admin')

@section('pageTitle','Online Payments')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Online Payments</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Online Payments</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gs-0 gy-4" id="data-table">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 text-dark rounded-start">SN</th>
                        <th class="text-dark">Name</th>
                        <th class="text-dark">Amount</th>
                        <th class="text-dark">Reference</th>
                        <th class="text-dark" style="white-space: nowrap;">Payment Type</th>
                        <th class="text-dark text-center">Date</th>
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
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ajax":{
                "url": "{{ route('admin.onlinepayments.ajax') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "sn" },
                { "data": "name", "orderable": false },
                { "data": "amount" },
                { "data": "reference" },
                { "data": "payment type" },
                { "data": "date" },
                { "data": "status" },
                { "data": "action", "orderable": false }
            ],
            "lengthMenu": [50, 100, 200, 500],
            "order": [[ 5, "desc" ]]
        });
    });
</script>
@endsection
