@extends('layouts.admin')

@section('pageTitle','Investment Details')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.investments', [$type, $filter]) }}" class="@if (request()->routeIs(['admin.investments'])) text-dark @else text-muted @endif">Investments</a></li>
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Details</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-10">
    <!--begin::Body-->
    <div class="card-body py-10">
        <h2 class="mb-9">Investment Details</h2>
        <!--begin::Stats-->
        <div class="row">
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Days</span>
                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                    <span id="days">00</span></span>
                </div>
            </div>
            <!--end::Col-->
             <!--begin::Col-->
             <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Hours</span>
                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                    <span id="hours">00</span></span>
                </div>
            </div>
            <!--end::Col-->
             <!--begin::Col-->
             <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Minutes</span>
                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                    <span id="minutes">00</span></span>
                </div>
            </div>
            <!--end::Col-->
             <!--begin::Col-->
             <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Seconds</span>
                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                    <span id="seconds">00</span></span>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Stats-->
        <!--begin::Progress-->
        @php
            $total = Illuminate\Support\Carbon::parse($investment['start_date'])->diffInDays($investment['return_date']);
            $passed = $total - now()->diffInDays($investment['return_date']);
            if ($investment['status'] == 'active') {
                $percentage = round(($passed / $total) * 100);
            } elseif ($investment['status'] == 'settled') {
                $percentage = 100;
            } else {
                $percentage = 0;
            }
        @endphp
        <div class="d-flex align-items-center w-100 flex-column mt-5">
            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                <span class="fw-bold fs-6 @if ($investment['status'] == 'active')
                    text-dark
                @elseif ($investment['status'] == 'pending')
                    badge badge-warning
                @elseif ($investment['status'] == 'cancelled')
                    badge badge-danger
                @else
                    text-dark
                @endif
            ">Investment @if ($investment['status'] == 'active')
                    Completion
                @else
                    {{ ucwords($investment['status']) }}
                @endif</span>
                <span class="fw-bolder fs-6">{{$percentage}}%</span>
            </div>
            <div class="h-30px mx-3 w-100 bg-light mb-3" style="border-radius: 30px;">
                <div class="bg-success h-30px" role="progressbar" style="border-radius: 30px; width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <!--end::Progress-->
        <div class="row my-5">
            <div class="col-12">
                <h5 class="mb-4">Package Information</h5>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Name</label>
                <input class="form-control form-control-solid" value="{{ $investment['package']['name'] }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Type</label>
                <input class="form-control form-control-solid" value="{{ ucfirst($investment['package']['type']) }}" disabled/>
            </div>
            @if ($investment->package['type'] == 'farm')
            <div class="col-md-6 mb-4">
                <label class="form-label">Duration</label>
                <input class="form-control form-control-solid" value="{{ $investment['package']['duration'] }} {{ $investment['package']['duration_mode'].($investment['package']['duration'] > 1 ? 's' : '') }}" disabled/>
            </div>
            @endif
            <div class="@if ($investment->package['type'] == 'farm') col-md-6 @else col-md-12 @endif mb-4">
                <label class="form-label">ROI</label>
                <input class="form-control form-control-solid" value="{{ $investment['currentPackage']['roi'] }}%" disabled/>
            </div>
            <div class="col-12 mt-5">
                <h5 class="mb-4">Investment Information</h5>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Amount Invested</label>
                <input class="form-control form-control-solid" value="{{ '₦ '. number_format($investment['amount']) }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Slots Purchased</label>
                <input class="form-control form-control-solid" value="{{ number_format($investment['slots']) }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Expected ROI</label>
                <input class="form-control form-control-solid" value="{{ '₦ '. number_format($investment['total_return'] - $investment['amount']) }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Total Returns</label>
                <input class="form-control form-control-solid" value="{{ '₦ '. number_format($investment['total_return']) }}" disabled/>
            </div>
            <div class="col-md-12 mb-4">
                <label class="form-label">Investment Date</label>
                <input class="form-control form-control-solid" value="{{ $investment['investment_date']->format('M d, Y \a\t h:i A') }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Start Date</label>
                <input class="form-control form-control-solid" value="{{ $investment['start_date']->format('M d, Y \a\t h:i A') }}" disabled/>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Return Date</label>
                <input class="form-control form-control-solid" value="{{ $investment['return_date']->format('M d, Y \a\t h:i A') }}" disabled/>
            </div>
            @if ($investment['package']['type'] == 'farm')
                <div class="col-md-12 mb-4">
                    <label class="form-label">Rollover</label>
                    <input class="form-control form-control-solid" value="{{ $investment['rollover'] ? "Yes" : "No" }}" disabled/>
                </div>
            @endif

            @if ($investment['package']['type'] == 'plant')
            <div class="col-12 mt-5">
                <h5 class="mb-4">Payout Information</h5>
            </div>
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 text-dark rounded-start">Milestone</th>
                            <th class="text-dark">Amount Due</th>
                            <th class="text-dark">Due Date</th>
                            <th class="text-dark rounded-end">Status</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    @php
                        $milestones = $investment->current_package['milestones'];
                        $roi = $investment['amount'] * ($investment->package['roi'] / 100);
                        $paid = $investment->transactions()->where('type', 'payout')->count();
                    @endphp
                    <!--begin::Table body-->
                    <tbody>
                        @for ($i = 1; $i <= $milestones; $i++)
                            <tr>
                                <!--begin::Invoice=-->
                                <td class="ps-4"><span class="text-gray-600 fw-bolder d-block fs-6"></span>Milestone {{ $i }}</td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ {{ number_format($i == $milestones ? $investment['amount'] + $roi  : $roi) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ \Carbon\Carbon::make($investment['start_date'])->addMonths($investment->getPlantDurationIncreaseByMonth($i)) }}</span></td>
                                <td>
                                    @if ($paid >= $i)
                                        <span class="badge badge-success">Paid</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
            @endif
        </div>
    </div>
    <!--end::Body-->
</div>
@endsection

@section('script')
<script>
    @if($investment['status'] == 'active' && $percentage < 100)
    let countDownDate = new Date("{{ $investment['return_date']->format('F d, Y H:i:s') }}").getTime();
    let x = setInterval(function() {
        let now = new Date().getTime();
        let distance = countDownDate - now;
        document.getElementById("days").textContent = formatText(Math.floor(distance / (1000 * 60 * 60 * 24)).toString());
        document.getElementById("hours").textContent = formatText(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString());
        document.getElementById("minutes").textContent = formatText(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString());
        document.getElementById("seconds").textContent = formatText(Math.floor((distance % (1000 * 60)) / 1000).toString());
        if (distance < 0) {
            clearInterval(x);
        }
    }, 1000);
    function formatText(text){
        if (text.length === 1){
            return "0" + text;
        }
        return text;
    }
    @endif
</script>
@endsection
