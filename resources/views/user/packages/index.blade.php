@extends('layouts.user')

@section('pageTitle', ucfirst($type).' Packages')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="#" class="text-muted">{{ ucfirst($type) }} Package</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{ ucfirst($type) }} Packages</span>
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
                        <th class="text-dark">ROI in %</th>
                        <th class="text-dark">Price per slot</th>
                        <th class="text-dark">Start date</th>
                        <th class="text-dark">Duration</th>
                        @if ($type == 'plant')
                            <th class="text-dark">Milestones</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Payout mode</th>
                        @endif
                        @if ($type == 'farm')
                            <th class="text-dark">Slots</th>
                            <th class="text-dark">Rollover</th>
                        @endif
                        <th class="text-dark"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($packages as $key=>$package )
                        <tr>
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['name'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['roi'] }}%</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['price'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['start_date'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['duration'] }} {{ $package['duration_mode'] }}{{ $package['duration'] > 1 ? 's' : '' }}</span></td>
                            @if ($type == 'plant')
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['milestones'] }}</span></td>
                            <td>
                                @if ($package['status'] == 'open')
                                    <span class="badge badge-pill badge-success">Open</span>
                                @else
                                    <span class="badge badge-pill badge-danger">Closed</span>
                                @endif
                            </td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['payout_mode'] }}</span></td>
                            @endif

                            @if ($type == 'farm')
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['slots'] }}</span></td>
                                <td>
                                    @if ($package['rollover'] == 1)
                                        <span class="badge badge-pill badge-success">Enabled</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Disabled</span>
                                    @endif
                                </td>
                            @endif
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" href="{{ route('invest', $type) }}"><span class="">Invest</span></a>
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
