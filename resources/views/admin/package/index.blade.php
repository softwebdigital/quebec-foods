@extends('layouts.admin')

@section('pageTitle', ucfirst($type).' Packages')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item text-muted"><a href="javascript:void()" class="text-dark">{{ ucfirst($type) }} Package</a></li>
@endsection

@section('content')
<div class="d-flex justify-content-end align-items-center mt-5 mb-7">
    <div>
        <a href="{{ route('admin.packages', 'plant') }}" class="btn btn-lg btn-light-primary">Processing Plants Packages</a>
    </div>
    <div>
        <a href="{{ route('admin.packages', 'farm') }}" class="btn btn-lg btn-light-primary ms-5">Farm Packages</a>
    </div>
</div>

{{-- <div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{ ucfirst($type) }} Packages</span>
        </h3>

        @can('Create Packages')
            <div class="card-toolbar">
                <a href="{{ route('admin.packages.create', $type) }}" class="btn btn-sm btn-light-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->New {{ ucfirst($type) }} Package</a>
            </div>
        @endcan
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
                        @if ($type == 'plant')
                        <th class="text-dark">Cover</th>
                        @endif
                        <th class="text-dark">Name</th>
                        <th class="text-dark" style="white-space: nowrap;">ROI in %</th>
                        <th class="text-dark" style="white-space: nowrap;">Price per slot</th>
                        <th class="text-dark">Start date</th>
                        <th class="text-dark">Duration</th>
                        @if ($type == 'plant')
                            <th class="text-dark">Milestones</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark" style="white-space: nowrap;">Payout mode</th>
                        @endif
                        @if ($type == 'farm')
                            <th class="text-dark">Slots</th>
                            <th class="text-dark">Rollover</th>
                        @endif
                        <th class="text-dark rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($packages as $key=>$package )
                        <tr>
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                            @if ($type == 'plant')
                            <td>
                                <div class="symbol symbol-45px me-5">
                                    <img src="{{ asset($package['image']) }}" alt="Package Cover" />
                                </div>
                            </td>
                            @endif
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['name'] }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['roi'] }}%</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦ {{ number_format($package['price']) }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">{{ $package['start_date']->format('M d, Y') }}</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">{{ $package['duration'] }} {{ $package['duration_mode'] }}{{ $package['duration'] > 1 ? 's' : '' }}</span></td>
                            @if ($type == 'plant')
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ number_format($package['milestones']) }}</span></td>
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
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ number_format($package['slots']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $package['rollover'] == 1 ? 'Yes' : 'No' }}</span></td>
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
                                    @can('Edit Packages')
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" href="{{ route('admin.packages.edit', [$type, $package['id']]) }}"><span class="">Edit</span></a>
                                        </div>
                                    @endcan
                                    @can('Delete Packages')
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" href="{{ route('admin.packages.destroy', [$type, $package['id']]) }}" onclick="confirmFormSubmit(event, 'deletePackage{{ $package['id'] }}')"><span class="">Delete</span></a>
                                        </div>
                                    @endcan
                                    @can('View Package Investments')
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" href="{{ route('admin.packages.investments', [$type, $package['id']]) }}"><span style="white-space: nowrap;">Investments</span></a>
                                        </div>
                                    @endcan
                                </div>
                                <form action="{{ route('admin.packages.destroy', [$type, $package['id']]) }}" id="deletePackage{{ $package['id'] }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
</div> --}}

<!--begin::Row-->
<div class="row g-6 g-xl-9">
    @foreach ($packages as $package )
        <!--begin::Col-->
        <div class="col-md-6 col-xxl-4">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title fw-bolder text-dark">Package Details</h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.packages.destroy', [$type, $package['id']]) }}" onclick="confirmFormSubmit(event, 'deletePackage{{ $package['id'] }}')" class="menu-link px-3">Delete Package</a>
                                </div>
                                <form action="{{ route('admin.packages.destroy', [$type, $package['id']]) }}" id="deletePackage{{ $package['id'] }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.packages.edit', [$type, $package['id']]) }}" class="menu-link px-3">Edit package</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.packages.investments', [$type, $package['id']]) }}" class="menu-link px-3">Package Investments</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                            <!--end::Menu-->
                        </div>
                    </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center flex-column pt-3 px-9 pb-7">
                    @if ($type == 'plant')
                        <div class="symbol symbol-65px mx-auto">
                            <img src="{{ asset($package['image']) }}" alt="Package Cover" />
                        </div>
                    @endif
                    @if ($type == 'farm')
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <span class="symbol-label fs-2x fw-bold text-primary bg-light-primary">{{ucfirst($package['name'][0])}}</span>
                            <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                        </div>
                    @endif
                    <!--begin::Avatar-->
                    <!--end::Avatar-->
                    <!--begin::Name-->
                    <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{ $package['name'] }}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="fs-8 fw-bold text-gray-400 mb-6">{{ $package['description'] }}</div>
                    <!--end::Position-->
                    <!--begin::Info-->
                    <div class="d-flex flex-center flex-wrap">
                        <!--begin::Stats-->
                        <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                            <div class="fs-6 fw-bolder text-gray-700 text-center">{{ $package['roi'] }}</div>
                            <div class="fw-bold text-gray-400">ROI in %</div>
                        </div>
                        <!--end::Stats-->
                        <!--begin::Stats-->
                        <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                            <div class="fs-6 fw-bolder text-gray-700 text-center">₦{{ number_format($package['price']) }}</div>
                            <div class="fw-bold text-gray-400">Price/slot</div>
                        </div>
                        <!--end::Stats-->
                        <!--begin::Stats-->
                        <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                            <div class="fs-6 fw-bolder text-gray-700">{{ $package['start_date']->format('M d, Y') }}</div>
                            <div class="fw-bold text-gray-400">Start date</div>
                        </div>
                        <!--end::Stats-->
                        @if ($type == 'plant')
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3 text-center">
                                <div class="fs-6 fw-bolder text-gray-700">{{ ucwords($package['status']) }}</div>
                                <div class="fw-bold text-gray-400">Status</div>
                            </div>
                            <!--end::Stats-->
                        @endif
                        @if ($type == 'farm')
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3 text-center">
                                <div class="fs-6 fw-bolder text-gray-700 text-center">{{ number_format($package['slots']) }}</div>
                                <div class="fw-bold text-gray-400">Slots</div>
                            </div>
                            <!--end::Stats-->
                        @endif
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Card body-->
                <div class="px-9 pb-9">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="w-100">
                            <button type="button" class="btn btn-sm btn-light-primary w-100">Invest in Package</button>
                        </div>
                        <div class="ms-2">
                            <button type="button" class="btn btn-sm btn-light-primary"><i class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    @endforeach
</div>
<!--end::Row-->
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
