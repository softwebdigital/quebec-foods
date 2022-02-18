@extends('layouts.user')

@section('pageTitle', 'FAQs')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-dark">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('faq') }}" class="text-dark">FAQs</a></li>
@endsection

@section('content')

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">FAQs</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{ count($faqs) }} Total FAQs</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Accordion-->
    <div class="accordion accordion-icon-toggle" id="kt_accordion_2">
        @foreach ($faqs as $key => $faq )
        <!--begin::Item-->
        <div class="mb-5">
            <!--begin::Header-->
            <div class="accordion-header py-3 d-flex @if($key != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#kt_accordion_2_item_1{{ $faq['id'] }}">
                <span class="accordion-icon">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                    <span class="svg-icon svg-icon-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <h3 class="fs-4 fw-bold mb-0 ms-4">{{ $faq['question'] }}</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div id="kt_accordion_2_item_1{{ $faq['id'] }}" class="fs-6 collapse @if($key == 0) show @endif ps-10" data-bs-parent="#kt_accordion_2">
                {{ $faq['answer'] }}
            </div>
            <!--end::Body-->
        </div>
        <!--end::Item-->
        @endforeach
    </div>
    <!--end::Accordion-->
    </div>
    <!--begin::Body-->
</div>


@endsection

@section('script')

@endsection
