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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="black" />
                                                    <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">₦50K</div>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black" />
                                                    <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">₦4,5K</div>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="black" />
                                                    <path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">40</div>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="black" />
                                                    <path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bolder lh-1">₦5.8M</div>
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
                        <div class="mixed-widget-13-chart" style="height: 100px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Stats-->
                    <div class="pt-5">
                        <!--begin::Symbol-->
                        <span class="text-dark fw-bolder fs-2x lh-0">₦</span>
                        <!--end::Symbol-->
                        <!--begin::Number-->
                        <span class="text-dark fw-bolder fs-3x me-2 lh-0">560</span>
                        <!--end::Number-->
                        <!--begin::Text-->
                        <span class="text-dark fw-bolder fs-6 lh-0">+ 28% this week</span>
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
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4 mb-xl-10">
            <!--begin::Engage widget 3-->
            <div class="card bg-primary h-md-100">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column pt-13 pb-14">
                    <!--begin::Heading-->
                    <div class="m-0">
                        <!--begin::Title-->
                        <h1 class="fw-bold text-white text-center lh-lg mb-9">Delivery is easy
                            <br />
                            <span class="fw-boldest">Start Your Delivery</span>
                        </h1>
                        <!--end::Title-->
                        <!--begin::Illustration-->
                        <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 mb-lg-12"
                            style="background-image:url('assets/media/svg/illustrations/easy/5.svg')"></div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Links-->
                    <div class="text-center">
                        <!--begin::Link-->
                        <a class="btn btn-sm btn-white btn-color-gray-800 me-2" data-bs-toggle="tooltip"
                            data-bs-dismiss="click" data-bs-custom-class="tooltip-dark"
                            title="Delivery App is coming soon">New Delivery</a>
                        <!--end::Link-->
                        <!--begin::Link-->
                        <a class="btn btn-sm bg-white btn-color-white bg-opacity-20" data-bs-toggle="tooltip"
                            data-bs-dismiss="click" data-bs-custom-class="tooltip-dark"
                            title="Delivery App is coming soon">Quick Guide</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 3-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8 mb-5 mb-xl-10">
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
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav" id="kt_chart_widget_11_tabs">
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_1"
                                    href="#kt_chart_widget_11_tab_content_1">2020</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_2"
                                    href="#kt_chart_widget_11_tab_content_2">2021</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active"
                                    data-bs-toggle="tab" id="kt_chart_widget_11_tab_3"
                                    href="#kt_chart_widget_11_tab_content_3">Month</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                            <!--begin::Statistics-->
                            <div class="mb-2">
                                <!--begin::Statistics-->
                                <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1">1,349</span>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">Avarage cost per iteraction</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                            <!--begin::Statistics-->
                            <div class="mb-2">
                                <!--begin::Statistics-->
                                <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1">3,492</span>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">Avarage cost per iteraction</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                            <!--begin::Statistics-->
                            <div class="mb-2">
                                <!--begin::Statistics-->
                                <span class="fs-2hx fw-bolder d-block text-gray-800 me-2 mb-2 lh-1">₦ 4,796</span>
                                <!--end::Statistics-->
                                <!--begin::Description-->
                                <span class="fs-6 fw-bold text-gray-400">This month transaction</span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                            <!--begin::Chart-->
                            <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
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
        <!--begin::Col-->
        <div class="col-xl-4 mb-xl-10">
            <!--begin::List widget 18-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-gray-800">Recent Wallet Transactions</span>
                        <span class="text-gray-400 mt-1 fw-bold fs-6">Transaction History</span>
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
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <i class="bi bi-arrow-down text-success fs-2x"></i>
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-5">
                                    <!--begin::Content-->
                                    <div class="me-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Abstergo
                                            Ltd.</a>
                                        <!--end::Title-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Video
                                            Channel</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Number-->
                                    <span class="text-gray-800 fw-bolder fs-4 me-3">1,578</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-4"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <i class="bi bi-arrow-up text-danger fs-2x"></i>
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-5">
                                    <!--begin::Content-->
                                    <div class="me-5">
                                        <!--begin::Title-->
                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Binford
                                            Ltd.</a>
                                        <!--end::Title-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">Social
                                            Media</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Number-->
                                    <span class="text-gray-800 fw-bolder fs-4 me-3">2,588</span>
                                    <!--end::Number-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Item-->
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
        <!--begin::Col-->
        <div class="col-xl-8 mb-5 mb-xl-10">
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
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                        <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                            class="btn btn-sm btn-light d-flex align-items-center px-4">
                            <!--begin::Display range-->
                            <div class="text-gray-600 fw-bolder">Loading date range...</div>
                            <!--end::Display range-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-1 ms-2 me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                        fill="black" />
                                    <path
                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                        fill="black" />
                                    <path
                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Daterangepicker-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body d-flex flex-column justify-content-between pb-5">
                    <!--begin::Tab Content-->
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_charts_widget_10_tab_content_1">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_12_chart_1" class="min-h-auto" style="height: 375px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_2">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_12_chart_2" class="min-h-auto" style="height: 375px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_charts_widget_10_tab_content_3">
                            <!--begin::Chart-->
                            <div id="kt_charts_widget_12_chart_3" class="min-h-auto" style="height: 375px"></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end::Chart widget 12-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-lg-10">
        <!--begin::Col-->
        <div class="col-xxl-4 col-md-4 mb-xxl-10">
            <!--begin::Mixed Widget 17-->
            <div class="card h-md-100">
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Heading-->
                    <div class="d-flex flex-stack">
                        <!--begin::Title-->
                        <h4 class="fw-bolder text-gray-800 m-0">Plant Investments</h4>
                        <!--end::Title-->
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
                        <!--end::Menu-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Chart-->
                    <div class="d-flex flex-center w-100">
                        <div class="mixed-widget-17-chart" data-kt-chart-color="primary" style="height: 300px"></div>
                    </div>
                    <!--end::Chart-->
                    <!--begin::Content-->
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                        <!--begin::Action-->
                        <div class="mb-9 mb-xxl-1">
                            <a href='{{ route('invest', 'plant') }}' class="btn btn-danger fw-bold">Invest</a>
                        </div>
                        <!--ed::Action-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
                <!--ed::Info-->
            </div>
            <!--end::Mixed Widget 17-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xxl-8 col-md-8 mb-xxl-10">
            <!--begin::Tables Widget 9-->
            <div class="card h-md-100">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Recent Plant Investments</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
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
                                    <th class="text-dark">Invested</th>
                                    <th class="text-dark">Returns</th>
                                    <th class="text-dark">Days left</th>
                                    <th class="text-dark">Status</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">1</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">Gold Package</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 10,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 15,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">23 days</span></td>
                                    <td><span class="badge badge-pill badge-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">2</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">Silver Package</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 5,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 7,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">15 days</span></td>
                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 9-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-lg-10">
        <!--begin::Col-->
        <div class="col-xxl-8 col-md-8 mb-xxl-10">
            <!--begin::Tables Widget 9-->
            <div class="card h-md-100">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Recent Farm Investments</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
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
                                    <th class="text-dark">Invested</th>
                                    <th class="text-dark">Returns</th>
                                    <th class="text-dark">Days left</th>
                                    <th class="text-dark">Status</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">1</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">Gold Package</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 10,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 15,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">23 days</span></td>
                                    <td><span class="badge badge-pill badge-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">2</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">Silver Package</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 5,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ 7,000</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">15 days</span></td>
                                    <td><span class="badge badge-pill badge-warning">Pending</span></td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 9-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xxl-4 col-md-4 mb-xxl-10">
            <!--begin::Mixed Widget 17-->
            <div class="card h-md-100">
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Heading-->
                    <div class="d-flex flex-stack">
                        <!--begin::Title-->
                        <h4 class="fw-bolder text-gray-800 m-0">Farm Investment</h4>
                        <!--end::Title-->
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

                        <!--end::Menu-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Chart-->
                    <div class="d-flex flex-center w-100">
                        <div class="mixed-widget-17-chart" data-kt-chart-color="primary" style="height: 300px"></div>
                    </div>
                    <!--end::Chart-->
                    <!--begin::Content-->
                    <div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
                        <!--begin::Action-->
                        <div class="mb-9 mb-xxl-1">
                            <a href='{{ route('invest', 'farm') }}' class="btn btn-danger fw-bold">Invest</a>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 17-->
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->
@endsection

@section('script')

@endsection
