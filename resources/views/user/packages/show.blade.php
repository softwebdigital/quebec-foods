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
    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-lg-7 me-xl-10">
        <!--begin::Card-->
        <div class="row">
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-body p-9">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h4 class="mb-5">Edit {{ ucfirst($package['type']) }} Package</h4>
                        </div>
                        <!--end::Card title-->
                        <!--begin:::Form-->
                        <form class="form mb-3">
                            <input disabled type="hidden" value="{{ strtolower($package['type']) }}" name="type">
                            @if ($package['type'] == 'plant')
                                <!--begin::Image input-->
                                <div class="mb-5">
                                    <img src="{{ asset($package['image']) }}" width="200px" style="border-radius: 10px"
                                        alt>
                                </div>
                            @endif
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2" for="name">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input disabled type="text" placeholder="Package name"
                                    value="{{ old('name') ?? $package['name'] }}" class="form-control form-control-solid"
                                    name="name" id="name">
                                @error('name')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-bold mb-2" for="description">Description</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <textarea placeholder="Description" disabled class="form-control form-control-solid"
                                    name="description" style="resize: none" id="description"
                                    rows="5">{{ old('description') ?? $package['description'] }}</textarea>
                                @error('description')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-bold mb-2" for="roi">ROI in %</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input disabled type="number" placeholder="ROI" value="{{ old('roi') ?? $package['roi'] }}"
                                    class="form-control form-control-solid" name="roi" id="roi">
                                @error('roi')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-bold mb-2" for="price">Price per Slot</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input disabled type="number" placeholder="Price per Slot"
                                    value="{{ old('price') ?? $package['price'] }}"
                                    class="form-control form-control-solid" name="price" id="price">
                                @error('price')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="fs-5 fw-bold mb-2" for="start_date">Start Date</label>
                                <input disabled class="form-control form-control-solid" placeholder="Start Date"
                                    id="kt_daterangepicker_3" value="{{ old('start_date') ?? $package['start_date'] }}"
                                    name="start_date" id="startDate" />
                                @error('start_date')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            @if ($package['type'] == 'farm')
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="slot">Total Available Slots</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input disabled type="text" placeholder="Total Available Slots"
                                        value="{{ old('slots') ?? $package['slots'] }}"
                                        class="form-control form-control-solid" name="slots" id="slots">
                                    @error('slots')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            @endif
                            @if ($package['type'] == 'plant')
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="duration">Milestones</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input disabled type="number" placeholder="No of Milestones"
                                        value="{{ old('milestones') ?? $package['milestones'] }}"
                                        class="form-control form-control-solid" name="milestones" id="milestones">
                                    @error('milestones')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            @endif
                            @if ($package['type'] == 'farm')
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="duration_mode">Duration Mode</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select disabled name="duration_mode" aria-label="Select the duration mode"
                                        data-placeholder="Select the duration mode" data-control="select2"
                                        class="form-select form-select-solid text-dark" id="durationMode">
                                        <option value=""></option>
                                        <option @if (old('duration_mode') == 'day' || $package['duration_mode'] == 'day') selected @endif value="day">Days</option>
                                        <option @if (old('duration_mode') == 'month' || $package['duration_mode'] == 'month') selected @endif value="month">Months
                                        </option>
                                        <option @if (old('duration_mode') == 'year' || $package['duration_mode'] == 'year') selected @endif value="year">Years
                                        </option>
                                    </select>
                                    @error('duration_mode')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="duration">Duration</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input disabled type="text" placeholder="Duration"
                                        value="{{ old('duration') ?? $package['duration'] }}"
                                        class="form-control form-control-solid" name="duration" id="duration">
                                    @error('duration')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                            @if ($package['type'] == 'plant')
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2" for="payout_mode">Payout Mode</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select disabled name="payout_mode" aria-label="Select the payout mode"
                                        data-placeholder="Select the payout mode" data-control="select2"
                                        class="form-select form-select-solid text-dark" id="payoutMode">
                                        <option value=""></option>
                                        <option @if (old('payout_mode') == 'monthly' || $package['payout_mode'] == 'monthly') selected @endif value="monthly">Monthly
                                        </option>
                                        <option @if (old('payout_mode') == 'quarterly' || $package['payout_mode'] == 'quarterly') selected @endif value="quarterly">
                                            Quarterly</option>
                                        <option @if (old('payout_mode') == 'semi-annually' || $package['payout_mode'] == 'semi-annually') ) selected @endif value="semi-annually">
                                            Semi Annually (Half a year)</option>
                                        <option @if (old('payout_mode') == 'annually' || $package['payout_mode'] == 'annually') selected @endif value="annually">Annually
                                        </option>
                                        <option @if (old('payout_mode') == 'biannually' || $package['payout_mode'] == 'biannually') selected @endif value="biannually">
                                            Biannually</option>
                                    </select>
                                    @error('payout_mode')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            @endif
                            <!--end::Input group-->
                            <!--begin::Submit-->
                            <a data-bs-toggle="modal" @if($package['type'] == 'plant') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment"@endif class="btn btn-primary mt-3 w-100">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Invest</span>
                                <!--end::Indicator-->
                            </a>
                            <!--end::Submit-->
                        </form>
                        <!--end:::Form-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
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
