@extends('layouts.admin')

@section('pageTitle', 'Pending Verifications')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Pending Verifications</a></li>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Pending Verifications</span>
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
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Date Submitted</th>
                            <th class="text-dark"></th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($data as $key=>$item )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item->user['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item->user['email'] }}</span></td>
                                <td>
                                    @if($item['status'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($item['status'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @elseif($item['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $item->created_at->format('M d, Y') }}</span></td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'approve{{ $item['id'] }}')" href="{{ route('admin.verification.process', ['verification' => $item['id'], 'status' => 'approved']) }}"><span class="">Approve</span></a>
                                            <form id="approve{{ $item['id'] }}" action="{{ route('admin.verification.process', ['verification' => $item['id'], 'status' => 'approved']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'decline{{ $item['id'] }}')" href="{{ route('admin.verification.process', ['verification' => $item['id'], 'status' => 'declined']) }}"><span class="">Decline</span></a>
                                            <form id="decline{{ $item['id'] }}" action="{{ route('admin.verification.process', ['verification' => $item['id'], 'status' => 'declined']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                        </div>
                                    </div>
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

