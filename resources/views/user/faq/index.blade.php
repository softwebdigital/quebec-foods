@extends('layouts.user')

@section('pageTitle', 'FAQs')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="@if (request()->routeIs(['faq'])) text-dark @else text-muted @endif">FAQs</a></li>
@endsection

@section('content')
    <!--begin::FAQ card-->
<div class="card">
    <!--begin::Body-->
    <div class="card-body p-10 p-lg-15">
        <!--begin::Classic content-->
        <div class="mb-13">
            <!--begin::Intro-->
            <div>
                <!--begin::Title-->
                <div class="d-block mb-10 d-sm-flex justify-content-between align-items-center">
                    <h4 class="fs-3 text-gray-800 w-bolder m-0">Frequently Asked Questions</h4>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Intro-->
            <!--begin::Row-->
                <div class="row mb-12">
                    @if (App\Models\Faq::count() > 0)
                        @foreach ($faqCategories as $faqCategory)
                            @if ( count($faqCategory->faqs) > 0 )
                            <!--begin::Col-->
                            <div class="col-md-6 pe-md-10 mb-10 mb-md-0">
                                <!--begin::Title-->
                                <h5 class="text-gray-800 fw-bolder mb-4">{{ $faqCategory['name'] }}</h5>
                                <!--end::Title-->
                                <!--begin::Accordion-->
                                <!--begin::Section-->
                                @foreach ($faqCategory->faqs as $key => $faq )
                                    <div class="m-0">
                                        <!--begin::Heading-->
                                        <div class="d-flex align-items-center collapsible py-3 toggle mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#kt_job_4_1{{ $faq['id'] }}" aria-expanded="false">
                                            <!--begin::Icon-->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                                <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                        <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                                <span class="svg-icon toggle-off svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Title-->
                                            <h6 class="text-gray-700 fw-bolder cursor-pointer mb-0">{{ $faq['question'] }}</h6>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div id="kt_job_4_1{{ $faq['id'] }}" class="collapse fs-6 ms-1">
                                            <!--begin::Text-->
                                            <div class="mb-4 text-gray-600 fw-bold fs-6 ps-10">
                                                {{ $faq['answer'] }}
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed"></div>
                                        <!--end::Separator-->
                                    </div>
                                @endforeach
                                <!--end::Section-->
                                <!--end::Accordion-->
                            </div>
                            <!--end::Col-->
                            @endif
                        @endforeach
                    @else
                        <div class="text-center m-0">No data available</div>
                    @endif
                </div>
            <!--end::Row-->
        </div>
        <!--end::Classic content-->
    </div>
    <!--end::Body-->
</div>
<!--end::FAQ card-->


@endsection

@section('script')

@endsection
