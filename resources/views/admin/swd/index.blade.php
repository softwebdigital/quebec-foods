@extends('layouts.admin')

@section('pageTitle', 'SWD Maintenance')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">SWD Maintenance</a></li>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">SWD Maintenance</span>
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
                            <th class="text-dark">Month</th>
                            <th class="text-dark">Year</th>
                            <th class="text-dark">Active Investments</th>
                            <th class="text-dark">Percentage</th>
                            <th class="text-dark">Amount Due</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($data as $key=>$item )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item['month'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item['year'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }} {{ number_format($item['active_investments']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item['percentage'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }} {{ number_format($item['amount']) }}</span></td>
                                <td>
                                    @if($item['status'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($item['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($item['status'] == 'queued')
                                        <span class="badge badge-pill badge-warning">Queued</span>
                                    @elseif($item['status'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @endif
                                </td>
                                <td>
                                    @can('Pay Maintenance Fee')
                                        <a href="#" class="btn btn-sm btn-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            @if($item['status'] == 'pending')
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'queued{{ $item['id'] }}')" href="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'queued']) }}"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Pay Now</span></a>
                                            </div>
                                            <form id="queued{{ $item['id'] }}" action="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'queued']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                            @endif
                                            @if(auth()->user()['email'] == 'softwebdigital@gmail.com')
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'approve{{ $item['id'] }}')" href="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'approved']) }}"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Approve</span></a>
                                                </div>
                                                <form id="approve{{ $item['id'] }}" action="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'approved']) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <div class="menu-item px-3">
                                                    <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'decline{{ $item['id'] }}')" href="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'declined']) }}"><i data-feather="user-x" class="icon-sm mr-2"></i> <span class="">Decline</span></a>
                                                </div>
                                                <form id="decline{{ $item['id'] }}" action="{{ route('admin.maintenance.change', ['maintenance' => $item['id'], 'state' => 'declined']) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            @endif
                                        </div>
                                    @endcan
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
    </div>

    <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Export Referrals</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div data-bs-dismiss="modal" aria-label="Close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_customers_export_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">Discard</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
@endsection

