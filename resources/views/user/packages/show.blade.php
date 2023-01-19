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

<style>
    @media(min-width: 991px) {
            .section-half {
            width: 50%;
        }
    }
</style>
    <!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Sidebar-->
    <div class="section-half flex-column flex-lg-row-auto  mb-10" style="margin-right: 10px;">
        <!--begin::Card-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Summary-->
                <!--begin::User Info-->
                <div class="d-flex flex-center flex-column py-5">
                    @if ($package['type'] == 'farm')
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="{{ asset($package->category->image) }}" alt="image" />
                        </div>
                        <!--end::Avatar-->
                    @else
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="{{ asset($package['image']) }}" alt="image" />
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
                        <div class="d-inline">{!! ucwords($package['description']) !!}</div>
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
                <!-- <div class="separator mb-md-10"></div> -->
                <!--end::Summary-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

    <!--begin::Sidebar-->
    <div class="section-half flex-column flex-lg-row-auto  mb-10" style="margin-left: 10px;">
        <!--begin::Card-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Card body-->
            <div class="card-body">

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
                        <div class="text-gray-600">{{ getCurrency() . number_format($package['price'], 2) }} ({{ '₦' . number_format(\App\Http\Controllers\OnlinePaymentController::getAmountInNaira($package['price']), 2) }})</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        @if ($package['type'] == 'farm')
                            <div class="fw-bolder mt-5">Offer End Date</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ $package['start_date']->format('M d, Y \a\t h:i A') }}</a>
                            </div>
                            <div class="fw-bolder mt-5">Total Created Slots</div>
                            <div class="text-gray-600">{{ $package['slots'] }}</div>

                            <div class="fw-bolder mt-5">Total Available Slots</div>
                            <div class="text-gray-600">{{ $package['available_slots'] }}</div>

                            <div class="fw-bolder mt-5">Investment Duration</div>
                            <div class="text-gray-600">{{ $package['duration'] .' '. $package['duration_mode'].($package['duration'] > 1 ? 's' : '') }}</div>
                        @endif

                        @if ($package['type'] != 'farm')
                            <div class="fw-bolder mt-5">Milestones</div>
                            <div class="text-gray-600">{{ $package['milestones'] }}</div>

                            <div class="fw-bolder mt-5">Payout Mode</div>
                            <div class="text-gray-600">{{ $package['payout_mode'] }}</div>

                            <div class="fw-bolder mt-5">Investment Duration</div>
                            <div class="text-gray-600">{{ $package['new_duration'] . ($package['new_duration'] > 1 ? ' months' : ' month') }}</div>
                        @endif
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        @if ($package['status'] == 'open')
                        <!--begin::Submit-->
                        <a data-bs-toggle="modal" onclick="populateInvestModal('{{ $package['type'] }}', '{{ $package['name'] }}')" @if($package['type'] != 'farm') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment" @endif class="btn btn-primary mt-3 w-100">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Invest</span>
                            <!--end::Indicator-->
                        </a>
                        @else
                        <button type="button" disabled class="btn btn-primary w-100 mt-3">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Closed</span>
                                <!--end::Indicator-->
                        </button>
                        @endif
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
            timePicker: true,
            startDate: moment().startOf("hour"),
            locale: {
                format: "YYYY-MM-DD HH:mm:ss"
            }
        }, );
    </script>
@endsection
