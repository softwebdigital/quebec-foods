@extends('layouts.user')

@section('pageTitle', 'Dashboard')

@section('style')
    <style>
        .carousel.carousel-custom .carousel-indicators {
            align-items: center;
            position: static;
            z-index: auto;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .carousel.carousel-custom .carousel-indicators li {
            transform: none;
            opacity: 1;
        }

        .carousel.carousel-custom .carousel-indicators li.active {
            transform: none;
            opacity: 1;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-dots li {
            border-radius: 0;
            background-color: transparent;
            height: 13px;
            width: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-dots li:after {
            display: inline-block;
            content: " ";
            border-radius: 50%;
            transition: all 0.3s ease;
            background-color: #eff2f5;
            height: 9px;
            width: 9px;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-dots li.active {
            background-color: transparent;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-dots li.active:after {
            transition: all 0.3s ease;
            height: 13px;
            width: 13px;
            background-color: #b5b5c3;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-bullet li {
            transition: all 0.3s ease;
            background-color: transparent;
            border-radius: 6px;
            height: 6px;
            width: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-bullet li:after {
            display: inline-block;
            content: " ";
            transition: all 0.3s ease;
            background-color: #b5b5c3;
            border-radius: 6px;
            height: 6px;
            width: 6px;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-bullet li.active {
            transition: all 0.3s ease;
            background-color: transparent;
            height: 6px;
            width: 16px;
        }

        .carousel.carousel-custom .carousel-indicators.carousel-indicators-bullet li.active:after {
            transition: all 0.3s ease;
            height: 6px;
            width: 16px;
            background-color: #7e8299;
        }

        .carousel.carousel-custom .carousel-indicators-active-white li.active:after {
            background-color: #fff !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-light li.active:after {
            background-color: #f5f8fa !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-primary li.active:after {
            background-color: #00A451 !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-secondary li.active:after {
            background-color: #e4e6ef !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-success li.active:after {
            background-color: #50cd89 !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-info li.active:after {
            background-color: #7239ea !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-warning li.active:after {
            background-color: #ffc700 !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-danger li.active:after {
            background-color: #f1416c !important;
        }

        .carousel.carousel-custom .carousel-indicators-active-dark li.active:after {
            background-color: #181c32 !important;
        }

        .carousel.carousel-custom.carousel-stretch {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .carousel.carousel-custom.carousel-stretch .carousel-inner {
            flex-grow: 1;
        }

        .carousel.carousel-custom.carousel-stretch .carousel-item {
            height: 100%;
        }

        .carousel.carousel-custom.carousel-stretch .carousel-wrapper {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

    </style>
@endsection

@section('breadCrumbs')
@endsection

@section('content')
    <!--begin::Row-->
    <div class="row g-5 g-xl-8">
        <div class="col-xl-4 col-md-4 mb-xxl-10">
            <!--begin::Mixed Widget 1-->
            <div class="card h-md-100">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <!--begin::Header-->
                    <div class="px-9 pt-7 card-rounded h-275px w-100 bg-success">
                        <!--begin::Heading-->
                        <div class="d-flex flex-stack">
                            <h3 class="m-0 text-white fw-bolder fs-3">Summary</h3>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Balance-->
                        <div class="d-flex text-center flex-column text-white pt-8">
                            <span class="fw-bold fs-7">Your Balance</span>
                            <span class="fw-bolder fs-2x pt-1">{{ getCurrency() }}{{ $data['wallet']['balance'] }}</span>
                        </div>
                        <!--end::Balance-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Items-->
                    <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                        style="margin-top: -100px">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-6">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45px w-40px me-5">
                                <span class="symbol-label bg-lighten">
                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z"
                                                fill="black" />
                                            <path
                                                d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Description-->
                            <div class="d-flex align-items-center flex-wrap w-100">
                                <!--begin::Title-->
                                <div class="mb-1 pe-3 flex-grow-1">
                                    <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</span>
                                    <div class="text-gray-400 fw-bold fs-7">Transactions</div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="d-flex align-items-center">
                                    <div class="fw-bolder fs-5 text-gray-800 pe-1">{{ getCurrency() }}{{ $data['transactions'] }}</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-6">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45px w-40px me-5">
                                <span class="symbol-label bg-lighten">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Description-->
                            <div class="d-flex align-items-center flex-wrap w-100">
                                <!--begin::Title-->
                                <div class="mb-1 pe-3 flex-grow-1">
                                    <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Pending</span>
                                    <div class="text-gray-400 fw-bold fs-7">Investments</div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="d-flex align-items-center">
                                    <div class="fw-bolder fs-5 text-gray-800 pe-1">
                                        {{ getCurrency() }}{{ $data['investments']['pendingInvestments'] }}</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-6">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-45px w-40px me-5">
                                <span class="symbol-label bg-lighten">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc005.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M15 19H7C5.9 19 5 18.1 5 17V7C5 5.9 5.9 5 7 5H15C16.1 5 17 5.9 17 7V17C17 18.1 16.1 19 15 19Z"
                                                fill="black" />
                                            <path
                                                d="M8.5 2H13.4C14 2 14.5 2.4 14.6 3L14.9 5H6.89999L7.2 3C7.4 2.4 7.9 2 8.5 2ZM7.3 21C7.4 21.6 7.9 22 8.5 22H13.4C14 22 14.5 21.6 14.6 21L14.9 19H6.89999L7.3 21ZM18.3 10.2C18.5 9.39995 18.5 8.49995 18.3 7.69995C18.2 7.29995 17.8 6.90002 17.3 6.90002H17V10.9H17.3C17.8 11 18.2 10.7 18.3 10.2Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Description-->
                            <div class="d-flex align-items-center flex-wrap w-100">
                                <!--begin::Title-->
                                <div class="mb-1 pe-3 flex-grow-1">
                                    <span class="fs-5 text-gray-800 text-hover-primary fw-bolder">Active</span>
                                    <div class="text-gray-400 fw-bold fs-7">Investments</div>
                                </div>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="d-flex align-items-center">
                                    <div class="fw-bolder fs-5 text-gray-800 pe-1">
                                        {{ getCurrency() }}{{ $data['investments']['activeInvestments'] }}</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-8">
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
                        <div id="transaction-stat-weekly" style="height: 100%"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Stats-->
                    <div class="pt-5 mt-2">
                        <!--begin::Symbol-->
                        <span class="text-dark fw-bolder fs-2x lh-0">{{ getCurrency() }}</span>
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
    <div class="row gy-5 g-xl-10 my-5">
        @php
            $pckgs = \App\Models\Package::latest()->where('status', 'open')->limit(3);
        @endphp
        @if ($pckgs->count() > 0)
        <div class="col-md-6">
            <div id="kt_sliders_widget_1_slider"
                class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel"
                data-bs-interval="5000">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h4 class="card-title d-flex align-items-start flex-column">
                        <span class="card-label fw-bolder text-gray-800">Open Packages</span>
                        <span class="text-gray-400 mt-1 fw-bolder fs-7">{{ $pckgs->count() }} total package(s) open</span>
                    </h4>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Carousel Indicators-->
                        <ol
                            class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
                            @foreach ($pckgs->get() as $key => $pcg)
                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="{{ $key }}" class="ms-1 @if($key == 0) active @endif"
                            @if($key == 0)  aria-current="true" active @endif></li>
                            @endforeach
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <!--begin::Carousel-->
                    <div class="carousel-inner mt-n5">
                        <!--begin::Item-->
                        @foreach ($pckgs->get() as $key => $pcg)
                        <div class="carousel-item @if($key == 0) show active @endif">
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center mb-5">
<<<<<<< HEAD
                                @if ($pcg['type'] != 'farm')
=======
                                @if ($pcg['type'] == 'plant')
>>>>>>> david
                                <img src="{{ asset($pcg['image']) }}" style="width: 80px; border-radius: 5px;" class="me-2">
                                @endif
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-800 mb-3">{{ $pcg['name'] }}</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Items-->
                                    <div class="d-flex d-grid gap-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $pcg['slots'] == '-1' ? 'Unlimted' : $pcg['slots'] }} Slots
                                            </span>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $pcg['roi'] }}% ROI
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ getCurrency() }}{{ number_format($pcg['price']) }} / slot
                                            </span>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $pcg->investments()->count() }} Investors
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Action-->
                            <div class="mb-1">
<<<<<<< HEAD
                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal" onclick="populateInvestModal('{{ $pcg['type'] }}', '{{ $pcg['name'] }}')" @if($pcg['type'] != 'farm') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment" @endif >Invest in package</a>
=======
                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal" @if($pcg['type'] == 'plant') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment" @endif >Invest in package</a>
>>>>>>> david
                            </div>
                            <!--end::Action-->
                        </div>
                        @endforeach
                        <!--end::Item-->
                    </div>
                    <!--end::Carousel-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        @endif
        @php
            $pendingInvestments = \App\Models\Investment::latest()->where('status', 'pending')->where('payment', 'approved')->limit(3);
        @endphp
        @if ($pendingInvestments->count() > 0)
        <div class="col-md-6">
            <div id="kt_sliders_widget_1_slider"
                class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel"
                data-bs-interval="5000">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h4 class="card-title d-flex align-items-start flex-column">
                        <span class="card-label fw-bolder text-gray-800">Pending Investments</span>
                        <span class="text-gray-400 mt-1 fw-bolder fs-7">{{ $pendingInvestments->count() }} total pending(s) Investments</span>
                    </h4>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Carousel Indicators-->
                        <ol
                            class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-primary">
                            @foreach ($pendingInvestments->get() as $key => $pendingInvestment)
                            <li data-bs-target="#kt_sliders_widget_1_slider" data-bs-slide-to="{{ $key }}" class="ms-1 @if($key == 0) active @endif"
                            @if($key == 0)  aria-current="true" active @endif></li>
                            @endforeach
                        </ol>
                        <!--end::Carousel Indicators-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-6">
                    <!--begin::Carousel-->
                    <div class="carousel-inner mt-n5">
                        <!--begin::Item-->
                        @foreach ($pendingInvestments->get() as $key => $pendingInvestment)
                        <div class="carousel-item @if($key == 0) show active @endif">
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Info-->
                                <div class="m-0">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-800 mb-3">{{ $pendingInvestment->currentPackage['name'] }}</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Items-->
                                    <div class="d-flex d-grid gap-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0 me-4">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $pendingInvestment['slots'] }} Slots
                                            </span>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ getCurrency() }}{{ number_format($pendingInvestment['amount']) }} Invested
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-column flex-shrink-0">
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center fs-7 fw-bolder text-gray-400 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ getCurrency() }}{{ number_format($pendingInvestment['total_return']) }} Returns
                                            </span>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <span class="d-flex align-items-center text-gray-400 fw-bolder fs-7">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen057.svg-->
                                                <span class="svg-icon svg-icon-6 svg-icon-gray-600 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                            fill="currentColor"></rect>
                                                        <path
                                                            d="M11.9343 12.5657L9.53696 14.963C9.22669 15.2733 9.18488 15.7619 9.43792 16.1204C9.7616 16.5789 10.4211 16.6334 10.8156 16.2342L14.3054 12.7029C14.6903 12.3134 14.6903 11.6866 14.3054 11.2971L10.8156 7.76582C10.4211 7.3666 9.7616 7.42107 9.43792 7.87962C9.18488 8.23809 9.22669 8.72669 9.53696 9.03696L11.9343 11.4343C12.2467 11.7467 12.2467 12.2533 11.9343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Starts on {{ $pendingInvestment['start_date']->format('M d, Y') }}
                                            </span>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Action-->
                            <div class="mb-1">
                                <a href="{{ route('investments.show', ['investment' => $pendingInvestment['id']]) }}" class="btn btn-sm btn-primary">View Investments</a>
                            </div>
                            <!--end::Action-->
                        </div>
                        @endforeach
                        <!--end::Item-->
                    </div>
                    <!--end::Carousel-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        @endif
    </div>
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10 my-5">
        <!--begin::Col-->
        @if ($data['package'])
            <div class="col-xl-4 mb-xl-10">
                <!--begin::Engage widget 3-->
                <div class="card bg-success h-md-100">
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
                                    style="height: 200px; max-width: 100%; border-radius: 20px;">
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
                            <!-- <a class="btn btn-sm bg-white btn-color-white bg-opacity-20"
                                href="{{ route('invest', 'plant') }}">Invest</a> -->
                            <!--end::Link-->
                            <a class="btn btn-sm bg-white btn-color-white bg-opacity-20" data-bs-toggle="modal" data-bs-target="#createPlantInvestment" >Invest</a>
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
        <div class="@if ($data['package']) col-xl-8 @else col-xl-12 @endif mb-5 mb-10">
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
    <div class="row gy-5 g-xl-10 ">
        @if (count($data['wallet']['history']) > 0)
            <!--begin::Col-->
            <div class="col-xl-4 mb-10">
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
                                                    <span class="text-gray-800 fw-bolder fs-4">{{ getCurrency() }}
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
            <div class="col-xxl-12 col-md-12 my-12">
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
                                                            <img src="{{ asset($plantInvestment['package']['image']) }}"
                                                                class="h-50 align-self-center" alt="" />
                                                        </span>
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="text-gray-600 fw-bolder d-block fs-6">{{ $plantInvestment['package']['name'] }}</span>
                                                </td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
                                                        {{ number_format($plantInvestment['amount']) }}</span></td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
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

<<<<<<< HEAD
        <!--begin::Row-->
        <div class="row g-5 g-lg-10">
            <!--begin::Col-->
            @if (count($data['investments']['tractor']) > 0)
                <div class="col-xxl-12 col-md-12 my-12">
                    <!--begin::Tables Widget 5-->
                    <div class="card h-md-100">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Tractor Investments</span>
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
                                        @if (count($data['investments']['tractor']) > 0)
                                            @foreach ($data['investments']['tractor'] as $key => $plantInvestment)
                                                <tr>
                                                    <td class="ps-4"><span
                                                            class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="symbol symbol-45px me-2">
                                                            <span class="symbol-label">
                                                                <img src="{{ asset($plantInvestment['package']['image']) }}"
                                                                    class="h-50 align-self-center" alt="" />
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            class="text-gray-600 fw-bolder d-block fs-6">{{ $plantInvestment['package']['name'] }}</span>
                                                    </td>
                                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
                                                            {{ number_format($plantInvestment['amount']) }}</span></td>
                                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
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

=======
>>>>>>> david
    <!--begin::Row-->
    <div class="row g-5 g-lg-10">
        <!--begin::Col-->
        @if (count($data['investments']['farm']) > 0)
            <div class="col-xxl-12 col-md-12 my-10">
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
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
                                                        {{ number_format($farmInvestment['amount']) }}</span></td>
                                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ getCurrency() }}
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
                        return '{{ getCurrency() }}' + numberFormat(e);
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
                        return '{{ getCurrency() }}' + numberFormat(e);
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
                    return '{{ getCurrency() }}' + numberFormat(e);
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
                        return '{{ getCurrency() }}' + numberFormat(e);
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
    <script>
        var KTSlidersWidget1 = (function() {
            var e = function(e, a) {
                var t = document.querySelector(e);
                if (t && !t.classList.contains("initialized")) {
                    var l = parseInt(KTUtil.css(t, "height")),
                        o = KTUtil.getCssVariableValue("--bs-primary"),
                        r = KTUtil.getCssVariableValue("--bs-light-primary");
                    new ApexCharts(t, {
                            series: [a],
                            chart: {
                                fontFamily: "inherit",
                                height: l,
                                type: "radialBar",
                                sparkline: {
                                    enabled: !0
                                },
                            },
                            plotOptions: {
                                radialBar: {
                                    hollow: {
                                        margin: 0,
                                        size: "45%"
                                    },
                                    dataLabels: {
                                        showOn: "always",
                                        name: {
                                            show: !1
                                        },
                                        value: {
                                            show: !1
                                        },
                                    },
                                    track: {
                                        background: r,
                                        strokeWidth: "100%"
                                    },
                                },
                            },
                            colors: [o],
                            stroke: {
                                lineCap: "round"
                            },
                            labels: ["Progress"],
                        }).render(),
                        t.classList.add("initialized");
                }
            };
            return {
                init: function() {
                    e("#kt_slider_widget_1_chart_1", 76);
                    var a = document.querySelector("#kt_sliders_widget_1_slider");
                    a &&
                        a.addEventListener("slid.bs.carousel", function(a) {
                            1 === a.to && e("#kt_slider_widget_1_chart_2", 55),
                                2 === a.to && e("#kt_slider_widget_1_chart_3", 25);
                        });
                },
            };
        })();
    </script>
@endsection
