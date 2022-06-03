@extends('layouts.user')

@section('pageTitle','Investment Details')

@section('style')

@endsection

@section('breadCrumbs')
{{-- <li class="breadcrumb-item"><a href="{{ route('investments', [$type, $filter]) }}" class="@if (request()->routeIs(['investments'])) text-dark @else text-muted @endif">Investments</a></li> --}}
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Details</a></li>
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
                    @if ($investment['package']['cover'])
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="assets/media/avatars/300-6.jpg" alt="image" />
                        </div>
                        <!--end::Avatar-->
                    @endif
                    <!--begin::Name-->
                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $investment['package']['name'] }}</a>
                    <!--end::Name-->
                    <!--begin::Position-->
                    <div class="mb-9">
                        <!--begin::Badge-->
                        @if($investment['status'] == 'active')
                            <span class="badge badge-lg d-inline badge-pill badge-light-success">Active</span>
                        @elseif($investment['status'] == 'pending')
                            <span class="badge badge-lg d-inline badge-pill badge-light-warning">Pending</span>
                        @elseif($investment['status'] == 'settled')
                            <span class="badge badge-lg d-inline badge-pill badge-light-secondary">Settled</span>
                        @elseif($investment['status'] == 'cancelled')
                            <span class="badge badge-lg d-inline badge-pill badge-light-danger">Declined</span>
                        @endif
                        <!--begin::Badge-->
                    </div>
                    <!--end::Position-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap flex-center">
                        <!--begin::Stats-->
                        <!-- <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                            <div class="fs-4 fw-bolder text-gray-700">
                                <span class="w-120px">{{ ucfirst($investment['package']['type']) }}</span>
                            </div>
                            <div class="fw-bold text-muted">Type</div>
                        </div> -->
                        <!--end::Stats-->
                        <!--begin::Stats-->
                        <!-- <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3 ms-5">
                            <div class="fs-4 fw-bolder text-gray-700">
                                <span class="w-100px">{{ $investment['currentPackage']['roi'] }}%</span>
                            </div>
                            <div class="fw-bold text-muted">ROI</div>
                        </div> -->
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <div class="separator mb-md-10"></div>
                <!--end::User Info-->
                <!--end::Summary-->
                <!--begin::Details toggle-->
                <div class="d-flex flex-stack fs-4 py-3">
                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Investments Details
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
                        <div class="text-gray-600">{{ ucfirst($investment['package']['type']) }}</div>
                        <div class="fw-bolder mt-5">ROI</div>
                        <div class="text-gray-600">{{ $investment['currentPackage']['roi'] }}%</div>
                        <div class="fw-bolder mt-5">Slots Purchased</div>
                        <div class="text-gray-600">{{ number_format($investment['slots']) }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Amount Invested</div>
                        <div class="text-gray-600">
                            <a href="#" class="text-gray-600 text-hover-primary">{{ getCurrency() }} {{ number_format($investment['amount']) }}</a>
                        </div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Expected ROI</div>
                        <div class="text-gray-600">{{ getCurrency() }}{{ number_format($investment['total_return'] - $investment['amount']) }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Total Returns</div>
                        <div class="text-gray-600">{{ getCurrency() }} {{ number_format($investment['total_return']) }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Investment Date</div>
                        <div class="text-gray-600">{{ $investment['investment_date']->format('M d, Y \a\t h:i A') }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Start Date</div>
                        <div class="text-gray-600">{{ $investment['start_date']->format('M d, Y \a\t h:i A') }}</div>
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <!--begin::Details item-->
                        <div class="fw-bolder mt-5">Return Date</div>
                        <div class="text-gray-600">{{ $investment['return_date']->format('M d, Y \a\t h:i A') }}</div>
                        <!--begin::Details item-->
                        @if ($investment['package']['type'] == 'farm')
                            <form action="{{ route('investment.update.rollover', ['type' => 'farm', 'investment' => $investment['id']]) }}" method="POST" id="updateRolloverForm">
                                @csrf
                                @method('PUT')
                                <!--begin::Input group-->
                                <div class="d-flex flex-column my-5 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2" for="rollover">Rollover</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                        <input @if ($investment['rollover'] == 1) checked @endif @if ($investment['status'] == 'closed' || $investment['status'] == 'cancelled') disabled @endif required class="form-check-input h-30px w-50px" type="checkbox" value="yes" id="rollover" name="rollover"/>
                                    </div>
                                    @error('rollover')
                                        <span class="text-danger small" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                @if ($investment['status'] == 'settled' || $investment['status'] == 'cancelled')
                                <button type="button" disabled class="btn btn-primary">Update</button>
                                @else
                                <button type="button" onclick="confirmFormSubmit(event, 'updateRolloverForm')" class="btn btn-primary">Update</button>
                                @endif
                                {{-- <div id="rollover" class="form-check form-switch form-check-custom form-check-solid me-10">
                                    <input required class="form-check-input h-30px w-50px" type="checkbox" @if($investment['rollover']) checked @endif value="yes" id="rollover" name="rollover"/>
                                    <label class="form-check-label" for="rollover">
                                        Rollover Investment
                                    </label>
                                </div> --}}
                            </form>
                        @endif
                    </div>
                </div>
                <!--end::Details content-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Sidebar-->
    <!--begin::Content-->
    <div class="flex-lg-row-fluid ms-lg-15">
        <!--begin:::Tab content-->
        <div>
            <!--begin:::Tab pane-->
            <div>
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Investment Details</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <!--begin::Stats-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center my-3 p-6">
                                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Days</span>
                                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                                    <span id="days">00</span></span>
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center my-3 p-6">
                                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Hours</span>
                                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                                    <span id="hours">00</span></span>
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center my-3 p-6">
                                    <span class="fs-4 fw-bold text-dark pb-1 px-2">Minutes</span>
                                    <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                                    <span id="minutes">00</span></span>
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <div class="card card-dashed flex-center my-3 p-6">
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
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                @if ($investment['package']['type'] == 'plant')
                    <!--begin::Card-->
                    <div class="card pt-4">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h2>Payout Information</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
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
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }} {{ number_format($i == $milestones ? $investment['amount'] + $roi  : $roi) }}</span></td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ \Carbon\Carbon::make($investment['start_date'])->addMonths($investment->getPlantDurationIncreaseByMonth($i))->format('M d, Y H:m:s') }}</span></td>
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
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                @endif
            </div>
            <!--end:::Tab pane-->
        </div>
        <!--end:::Tab content-->
    </div>
    <!--end::Content-->
</div>
<!--end::Layout-->
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
