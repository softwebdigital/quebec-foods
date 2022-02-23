@extends('layouts.admin')

@section('pageTitle', Str::ucfirst($type) . ' ' . 'Users')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item text-muted"><a href="javascript:void()" class="text-muted">Users</a></li>
    <li class="breadcrumb-item text-muted"><a href="javscript:void()" class="text-dark">{{ Str::ucfirst($type) }}</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{ Str::ucfirst($type) . ' ' . 'Users' }}</span>
            @switch ($type)
                @case ('verified')
                    <span class="text-muted mt-1 fw-bold fs-7">{{ \App\Models\User::whereNotNull('email_verified_at')->count() }} Total Record(s)</span>
                    @break
                @case ('unverified')
                    <span class="text-muted mt-1 fw-bold fs-7">{{ \App\Models\User::whereNull('email_verified_at')->count() }} Total Record(s)</span>
                    @break
                @default
                    <span class="text-muted mt-1 fw-bold fs-7">{{ \App\Models\User::count() }} Total Record(s)</span>
            @endswitch
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
                        <th class="text-dark">Email</th>
                        <th class="text-dark">Phone</th>
                        <th class="text-dark">Verification</th>
                        <th class="text-dark">Joined</th>
                        <th class="text-dark">Status</th>
                        <th class="text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                </tbody>
                <!--end::Table body-->
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
                    "url": "{{ route('admin.users.ajax', $type ?? 'all') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "sn" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "phone" },
                    { "data": "verification" },
                    { "data": "joined" },
                    { "data": "status" },
                    { "data": "action" }
                ],
                "lengthMenu": [50, 100, 200, 500]
            });
        });
    </script>
@endsection
