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
        <a href="{{ route('admin.packages', 'plant') }}" class="btn btn-lg btn-primary">Processing Plants Packages</a>
    </div>
    <div>
        <a href="{{ route('admin.packages', 'farm') }}" class="btn btn-lg btn-primary ms-5">Farm Packages</a>
    </div>
</div>
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
                                <form action="{{ route('admin.packages.destroy', [$package['type'], $package['id']]) }}" id="deletePackage{{ $package['id'] }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.packages.edit', [$package['type'], $package['id']]) }}" class="menu-link px-3">Edit package</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 pb-3">
                                    <a href="{{ route('admin.packages.investments', [$type, $package['id']]) }}" class="menu-link px-3">Package Investments</a>
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
                    @if ($package['image'])
                        <div class="symbol symbol-65px mx-auto">
                            <img src="{{ asset($package['image']) }}" alt="Package Cover" />
                        </div>
                    @endif
                    @if (!$package['image'])
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <span class="symbol-label fs-2x fw-bold text-primary bg-light-primary">{{ucfirst($package['name'][0])}}</span>
                            <div class="bg-success position-absolute border border-4 border-white"></div>
                        </div>
                    @endif
                    <!--begin::Avatar-->
                    <!--end::Avatar-->
                    <!--begin::Name-->
                    <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{ $package['name'] }}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="fs-8 fw-bold text-gray-400 mb-6">{{ ucwords($package['type']) }}</div>
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
                        @if ($package['slots'] != -1)
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
                            <a type="button" href="{{ route('admin.packages.edit', ['type' => $package['type'], 'package' => $package['id']]) }}" class="btn btn-sm btn-primary w-100">Edit Package</a>
                        </div>
                        <div class="ms-2">
                            <a type="button" href="{{ route('admin.packages.show', ['type' => $package['type'], 'package' => $package['id']]) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
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
