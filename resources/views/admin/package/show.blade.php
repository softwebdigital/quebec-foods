@extends('layouts.admin')

@section('pageTitle', 'Package Details')

@section('script')
@endsection

@section('breadCrumbs')
@endsection

@section('content')
<!--begin::Sidebar-->
<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Summary-->
            <!--begin::User Info-->
            <div class="d-flex flex-center flex-column py-5">
                @if ($package['cover'])
                    <!--begin::Avatar-->
                    <div class="symbol symbol-100px symbol-circle mb-7">
                        <img src="assets/media/avatars/300-6.jpg" alt="image" />
                    </div>
                    <!--end::Avatar-->
                @endif
                <!--begin::Name-->
                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $package['name'] }}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <div class="mb-9">
                    <!--begin::Badge-->
                    <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($package['status']) }}</div>
                    <!--begin::Badge-->
                </div>
                <div class="mb-9">
                    <!--begin::Badge-->
                    <div class="d-inline">{{ ucwords($package['description']) }}</div>
                    <!--begin::Badge-->
                </div>
                <!--end::Position-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap flex-center">
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                        <div class="fs-4 fw-bolder text-gray-700">
                            <span class="w-120px">{{ ucfirst($package['type']) }}</span>
                        </div>
                        <div class="fw-bold text-muted">Type</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 ms-5">
                        <div class="fs-4 fw-bolder text-gray-700">
                            <span class="w-100px">{{ $package['roi'] }}%</span>
                        </div>
                        <div class="fw-bold text-muted">ROI</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <div class="separator mb-md-10"></div>
            <!--end::User Info-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Sidebar-->
@endsection

@section('script')
@endsection
