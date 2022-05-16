@extends('layouts.user')

@section('pageTitle', ucfirst($package['type']) . ' Packages')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('packages', $package['type']) }}"
            class="@if (request()->routeIs(['packages'])) text-dark @else text-muted @endif">{{ ucfirst($package['type']) }} Packages</a>
    </li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Details</a>
    </li>
@endsection

@section('content')

    <!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
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
                        @if ($package['status'] == 'open')
                            <span class="badge badge-lg badge-light-primary d-inline">{{ ucwords($package['status']) }}</span>
                        @else
                            <span class="badge badge-lg badge-light-danger d-inline">{{ ucwords($package['status']) }}</span>
                        @endif
                            <!-- <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($package['status']) }}</div> -->
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
                        <!-- <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                            <div class="fs-4 fw-bolder text-gray-700">
                                <span class="w-120px">{{ ucfirst($package['type']) }}</span>
                            </div>
                            <div class="fw-bold text-muted">Type</div>
                        </div> -->
                        <!--end::Stats-->
                        <!--begin::Stats-->
                        <!-- <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 ms-5">
                            <div class="fs-4 fw-bolder text-gray-700">
                                <span class="w-100px">{{ $package['roi'] }}%</span>
                            </div>
                            <div class="fw-bold text-muted">ROI</div>
                        </div> -->
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <div class="separator mb-md-10"></div>
                <!--end::Summary-->
                <!--begin::Details toggle-->
                <div class="d-flex flex-stack fs-4 py-3">
                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Packages Details
                    <span class="ms-2 rotate-180">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span></div>
                </div>
                <!--end::Details toggle-->
                <!--begin::Details content-->
                <div id="kt_user_view_details" class="collapse show">
                    <div class="pb-5 fs-6">
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Type</div>
                        <div class="text-gray-600">{{ ucfirst($package['type']) }}</div>
                        <div class="fw-bolder mt-5">ROI</div>
                        <div class="text-gray-600">{{ $package['roi'] }}%</div>
                        <div class="fw-bolder mt-5">Price per slot</div>
                        <div class="text-gray-600">{{ $package['price'] }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Start Date</div>
                        <div class="text-gray-600">
                            <a href="#" class="text-gray-600 text-hover-primary">{{ $package['start_date']->format('M d, Y \a\t h:i A') }}</a>
                        </div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        @if ($package['type'] == 'farm')
                            <div class="fw-bolder mt-5">Total Available Slots</div>
                            <div class="text-gray-600">{{ $package['slots'] }}</div>

                            <div class="fw-bolder mt-5">Duration Mode</div>
                            <div class="text-gray-600">{{ $package['duration_mode'] }}</div>
                        @endif

                        @if ($package['type'] == 'plant')
                            <div class="fw-bolder mt-5">Milestones</div>
                            <div class="text-gray-600">{{ $package['milestones'] }}</div>

                            <div class="fw-bolder mt-5">Payout Mode</div>
                            <div class="text-gray-600">{{ $package['payout_mode'] }}</div>
                        @endif
                        <!--begin::Details item-->
                        <!--begin::Details item-->

                        <!--begin::Submit-->
                        <a data-bs-toggle="modal" @if($package['type'] == 'plant') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment"@endif class="btn btn-primary mt-3 w-100">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Invest</span>
                            <!--end::Indicator-->
                        </a>
                        <!--end::Submit-->
                    </div>
                </div>
                <!--end::Details content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

    
</div>
<!--end::Layout-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "searching": true,
                "lengthMenu": [
                    [100, 200, 300, 400],
                    [100, 200, 300, 400]
                ]
            });
        });

        $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format("YYYY"), 10),
            locale: {
                format: "YYYY-MM-DD"
            }
        }, );
    </script>
@endsection
