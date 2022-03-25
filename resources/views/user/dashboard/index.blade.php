@extends('layouts.user')

@section('pageTitle', 'Dashboard')

@section('style')

@endsection

@section('breadCrumbs')
@endsection

@section('content')
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Mixed Widget 14-->
            <div class="card card-xxl-stretch mb-5 mb-xl-8" style="background-color: #F7D9E3">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column mb-7">
                        <!--begin::Title-->
                        <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Summary</a>
                        <!--end::Title-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 me-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z"
                                                    fill="black" />
                                                <path
                                                    d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">₦ {{ $data['wallet']['balance'] }}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Wallet</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 ms-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">₦ {{ $data['investments']['total'] }}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Invested</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <div class="d-flex align-items-center me-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z"
                                                    fill="black" />
                                                <path
                                                    d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">{{ $data['investments']['slots'] }}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Slots</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-6">
                            <div class="d-flex align-items-center ms-2">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">₦ {{ $data['investments']['returns'] }}
                                    </div>
                                    <div class="fs-7 text-gray-600 fw-bold">Returns</div>
                                </div>
                                <!--end::Title-->
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
            </div>
            <!--end::Mixed Widget 14-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Mixed Widget 13-->
            <div class="card card-xl-stretch mb-xl-8" style="background-color: #CBD4F4">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Title-->
                        <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Transactions Stat</a>
                        <!--end::Title-->
                        <!--begin::Chart-->
                        <div id="transaction-stat-weekly" style="height: 100px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Stats-->
                    <div class="pt-5 mt-2">
                        <!--begin::Symbol-->
                        <span class="text-dark fw-bolder fs-2x lh-0">₦</span>
                        <!--end::Symbol-->
                        <!--begin::Number-->
                        <span
                            class="text-dark fw-bolder fs-3x me-2 lh-0">{{ number_format(array_sum($data['chartData']['transactions']['week'])) }}</span>
                        <!--end::Number-->
                        <!--begin::Text-->
                        <span class="text-dark fw-bolder fs-6 lh-0">this week</span>
                        <!--end::Text-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 13-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10 my-5">
        <!--begin::Col-->
        @if ($data['package'])
            <div class="col-xl-4 mb-xl-10">
                <!--begin::Engage widget 3-->
                <div class="card bg-primary h-md-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column pt-13 pb-14">
                        <!--begin::Heading-->
                        <div class="m-0">
                            <!--begin::Title-->
                            <h1 class="fw-bold text-white text-center lh-lg mb-9">New Package
                                <br />
                                <span class="fw-boldest">{{ $data['package']['name'] }}</span>
                            </h1>
                            <!--end::Title-->
                            <!--begin::Illustration-->
                            <div
                                class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center mx-auto text-center card-rounded-bottom h-200px mh-200px my-5 mb-lg-12">
                                <img src="{{ asset($data['package']['image']) }}" alt
                                    style="height: 200px; border-radius: 20px;">
                            </div>
                            <!--end::Illustration-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Links-->
                        <div class="text-center">
                            <!--begin::Link-->
                            <a class="btn btn-sm btn-white btn-color-gray-800 me-2"
                                href="{{ route('packages', 'plant') }}">View Package</a>
                            <!--end::Link-->
                            <!--begin::Link-->
                            <a class="btn btn-sm bg-white btn-color-white bg-opacity-20"
                                href="{{ route('invest', 'plant') }}">Invest</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 3-->
            </div>
        @endif
        <!--end::Col-->
        <!--begin::Col-->
        <div class="@if ($data['package']) col-xl-8 @else col-xl-12 @endif mb-5 mb-xl-10">
            <!--begin::Chart widget 11-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">Transaction Stats</span>
                        <span class="text-gray-400 mt-1 fw-bold fs-6">User's Transaction</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <div id="transaction-stat-monthly" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 11-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        @if (count($data['wallet']['history']) > 0)
            <!--begin::Col-->
            <div class="col-xl-4 mb-xl-10">
                <!--begin::List widget 18-->
                <div class="card card-flush h-xl-100">
                    <!--begin::Header-->
                    <div class="card-header pt-7">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-gray-800">Recent Wallet Transactions</span>
                            <span class="text-gray-400 mt-1 fw-bold fs-6">Wallet History</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane show active">
                                <table class="table">
                                    <tbody>
                                        @foreach ($data['wallet']['history'] as $userWalletHistory)
                                            <!--begin::Item-->
                                            <tr>
                                                <td>
                                                    @if ($userWalletHistory['type'] == 'deposit' || $userWalletHistory['type'] == 'payout')
                                                        <i class="bi bi-arrow-down text-success fs-2x"></i>
                                                    @else
                                                        <i class="bi bi-arrow-up text-danger fs-2x"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-gray-800 fw-bolder m-0 fs-6">
                                                        {{ ucfirst($userWalletHistory['type']) }}</p>
                                                    <!--end::Title-->
                                                    <!--begin::Desc-->
                                                    <span
                                                        class="text-gray-400 fw-bold fs-7">{{ $userWalletHistory['description'] }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-gray-800 fw-bolder fs-4">₦
                                                        {{ $userWalletHistory['amount'] }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Tap pane-->
                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end::List widget 18-->
            </div>
            <!--end::Col-->
        @endif
        <!--begin::Col-->
        <div class="@if (count($data['wallet']['history']) > 0) col-xl-8 @else col-xl-12 @endif mb-5 mb-xxl-10">
            <!--begin::Chart widget 12-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-7 mb-3">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-gray-800">This year transactions</span>
                        <span class="text-gray-400 mt-1 fw-bold fs-6">Transactions History</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <div id="transaction-stat-yearly" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 12-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-lg-10">
        <!--begin::Col-->
        @if (count($data['investments']['plant']) > 0)
            <div class="col-xxl-12 col-md-12 mb-xxl-12">
                <!--begin::Tables Widget 5-->
                <div class="card h-md-100">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Plant Investments</span>
                            <span class="text-muted mt-1 fw-bold fs-7">Latest Investments</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bolder text-muted">
                                        <th class="ps-4 text-dark rounded-start">S/N</th>
                                        <th class="text-dark">Cover</th>
                                        <th class="text-dark">Package</th>
                                        <th class="text-dark">Total Invested</th>
                                        <th class="text-dark">Expected Returns</th>
                                        <th class="text-dark">Return Date</th>
                                        <th class="text-dark">Status</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @if (count($data['investments']['plant']) > 0)
                                        @foreach ($data['investments']['plant'] as $key => $plantInvestment)
                                            <tr>
                                                <td class="ps-4"><span
                                                    class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span>
                                                </td>
                                                <td>
                                                    <div class="symbol symbol-45px me-2">
                                                        <span class="symbol-label">
                                                            <img src="{{ asset($plantInvestment['package']['image']) }}" class="h-50 align-self-center" alt="" />
                                                        </span>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-gray-600 fw-bolder d-block fs-6">{{ $plantInvestment['package']['name'] }}</span>
                                                </td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦
                                                        {{ number_format($plantInvestment['amount']) }}</span></td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦
                                                        {{ number_format($plantInvestment['total_return']) }}</span></td>
                                                <td><span
                                                        class="text-gray-600 fw-bolder d-block fs-6">{{ $plantInvestment['return_date']->format('M d, Y') }}</span>
                                                </td>
                                                <td>
                                                    @if ($plantInvestment['status'] == 'active')
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @elseif($plantInvestment['status'] == 'pending')
                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                    @elseif($plantInvestment['status'] == 'settled')
                                                        <span class="badge badge-pill badge-secondary">Settled</span>
                                                    @elseif($plantInvestment['status'] == 'cancelled')
                                                        <span class="badge badge-pill badge-danger">Declined</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
        @endif
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-lg-10">
        <!--begin::Col-->
        @if (count($data['investments']['farm']) > 0)
            <div class="col-xxl-12 col-md-12 mb-xxl-12">
                <!--begin::Tables Widget 5-->
                <div class="card h-md-100">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Farm Investments</span>
                            <span class="text-muted mt-1 fw-bold fs-7">Latest Investments</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                 <thead>
                                    <tr class="fw-bolder text-muted">
                                        <th class="ps-4 text-dark rounded-start">S/N</th>
                                        <th class="text-dark">Package</th>
                                        <th class="text-dark">Total Invested</th>
                                        <th class="text-dark">Expected Returns</th>
                                        <th class="text-dark">Return Date</th>
                                        <th class="text-dark">Status</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @if (count($data['investments']['farm']) > 0)
                                        @foreach ($data['investments']['farm'] as $key => $farmInvestment)
                                            <tr>
                                                <td class="ps-4"><span
                                                        class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span>
                                                </td>
                                                <td><span
                                                        class="text-gray-600 fw-bolder d-block fs-6">{{ $farmInvestment['package']['name'] }}</span>
                                                </td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦
                                                        {{ number_format($farmInvestment['amount']) }}</span></td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦
                                                        {{ number_format($farmInvestment['total_return']) }}</span></td>
                                                <td><span
                                                        class="text-gray-600 fw-bolder d-block fs-6">{{ $farmInvestment['return_date']->format('M d, Y') }}</span>
                                                </td>
                                                <td>
                                                    @if ($farmInvestment['status'] == 'active')
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @elseif($farmInvestment['status'] == 'pending')
                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                    @elseif($farmInvestment['status'] == 'settled')
                                                        <span class="badge badge-pill badge-secondary">Settled</span>
                                                    @elseif($farmInvestment['status'] == 'cancelled')
                                                        <span class="badge badge-pill badge-danger">Declined</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
        @endif
        <!--end::Col-->

    </div>
    <!--end::Row-->
@endsection

@section('script')
    <script>
        let a = KTUtil.getCssVariableValue("--bs-gray-800"),
            o = KTUtil.getCssVariableValue("--bs-gray-300");
        let weekTransactionEl = document.querySelector("#transaction-stat-weekly");
        var weekTransactionOptions = {
            series: [{
                name: "Transactions",
                data: {!! json_encode($data['chartData']['transactions']['week']) !!}
            }],
            grid: {
                show: !1,
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0,
                },
            },
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: parseInt(KTUtil.css(weekTransactionEl, "height")),
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !0
                },
            },
            plotOptions: {},
            legend: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.4,
                    opacityTo: 0,
                    stops: [20, 120, 120, 120],
                },
            },
            stroke: {
                curve: "smooth",
                show: !0,
                width: 3,
                colors: ["#FFFFFF"],
            },
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    show: !1,
                    style: {
                        colors: a,
                        fontSize: "12px"
                    },
                },
                crosshairs: {
                    show: !1,
                    position: "front",
                    stroke: {
                        color: o,
                        width: 1,
                        dashArray: 3,
                    },
                },
                tooltip: {
                    enabled: !0,
                    formatter: void 0,
                    offsetY: 0,
                    style: {
                        fontSize: "12px"
                    },
                },
            },
            tooltip: {
                style: {
                    fontSize: "12px"
                },
                y: {
                    formatter: function(e) {
                        return "₦" + numberFormat(e);
                    },
                },
            },
        };
        var weekTransactionChart = new ApexCharts(weekTransactionEl, weekTransactionOptions);
        weekTransactionChart.render();


        let monthTransactionEl = document.querySelector("#transaction-stat-monthly");
        var monthTransactionOptions = {
            series: [{
                name: "Transactions",
                data: {!! json_encode($data['chartData']['transactions']['month']['data']) !!}
            }],
            grid: {
                show: !1,
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0,
                },
            },
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: parseInt(KTUtil.css(monthTransactionEl, "height")),
                toolbar: {
                    show: !1
                },
            },
            plotOptions: {},
            legend: {
                show: !1
            },
            dataLabels: {
                enabled: !1
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.7,
                    stops: [0, 90, 100],
                },
            },
            stroke: {
                curve: "smooth",
                show: !0,
                width: 3,
                colors: [KTUtil.getCssVariableValue("--bs-success")],
            },
            xaxis: {
                categories: {!! json_encode($data['chartData']['transactions']['month']['keys']) !!},
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                tickAmount: 5,
                labels: {
                    rotate: 0,
                    rotateAlways: !0,
                    style: {
                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                        fontSize: "13px"
                    },
                },
                crosshairs: {
                    position: "front",
                    stroke: {
                        color: KTUtil.getCssVariableValue("--bs-success"),
                        width: 1,
                        dashArray: 3
                    },
                },
                tooltip: {
                    enabled: !0,
                    formatter: void 0,
                    offsetY: 0,
                    style: {
                        fontSize: "13px"
                    },
                },
            },
            yaxis: {
                tickAmount: 4,
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue("--bs-success"),
                        fontSize: "13px"
                    },
                    formatter: function(e) {
                        return numberFormat(e);
                    },
                },
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: !1,
                    filter: {
                        type: "none",
                        value: 0
                    },
                },
            },
            tooltip: {
                style: {
                    fontSize: "12px"
                },
                y: {
                    formatter: function(e) {
                        return "₦" + numberFormat(e);
                    },
                },
            },
            colors: [KTUtil.getCssVariableValue("--bs-success")],
            grid: {
                borderColor: KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: !0
                    }
                },
            },
            markers: {
                strokeColor: KTUtil.getCssVariableValue("--bs-success"),
                strokeWidth: 3
            },
        };
        var monthTransactionChart = new ApexCharts(monthTransactionEl, monthTransactionOptions);
        monthTransactionChart.render();

        let yearTransactionEl = document.querySelector("#transaction-stat-yearly");
        var yearTransactionOptions = {
            series: [{
                name: "Transactions",
                data: {!! json_encode($data['chartData']['transactions']['year']) !!}
            }],
            chart: {
                fontFamily: "inherit",
                type: "bar",
                height: parseInt(KTUtil.css(yearTransactionEl, "height")),
                toolbar: {
                    show: !1
                },
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: ["22%"],
                    borderRadius: 5,
                    dataLabels: {
                        position: "top"
                    },
                    startingShape: "flat",
                },
            },
            legend: {
                show: !1
            },
            dataLabels: {
                enabled: !0,
                offsetY: -30,
                style: {
                    fontSize: "13px",
                    colors: ["labelColor"]
                },
                formatter: function(e) {
                    return "₦" + numberFormat(e);
                },
            },
            stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            fill: {
                opacity: 1
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue(
                            "--bs-gray-500"
                        ),
                        fontSize: "13px",
                    },
                },
                crosshairs: {
                    fill: {
                        gradient: {
                            opacityFrom: 0,
                            opacityTo: 0
                        },
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue(
                            "--bs-gray-500"
                        ),
                        fontSize: "13px",
                    },
                    formatter: function(e) {
                        return numberFormat(e);
                    },
                },
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: !1,
                    filter: {
                        type: "none",
                        value: 0
                    },
                },
            },
            tooltip: {
                style: {
                    fontSize: "12px"
                },
                y: {
                    formatter: function(e) {
                        return "₦" + numberFormat(e);
                    },
                },
            },
            colors: [
                KTUtil.getCssVariableValue("--bs-primary"),
                KTUtil.getCssVariableValue("--bs-light-primary"),
            ],
            grid: {
                borderColor: (KTUtil.getCssVariableValue("--bs-gray-900"),
                    KTUtil.getCssVariableValue("--bs-border-dashed-color")),
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: !0
                    }
                },
            },
        };
        var yearTransactionChart = new ApexCharts(yearTransactionEl, yearTransactionOptions);
        yearTransactionChart.render();
    </script>
@endsection
