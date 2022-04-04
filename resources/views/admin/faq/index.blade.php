@extends('layouts.admin')

@section('pageTitle', 'FAQs')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">FAQs Management</a></li>
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
                    @can('Create FAQs')
                        <div class="card-toolbar">
                            <a href="{{ route('admin.faq.create') }}" class="btn btn-sm btn-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->New Question</a>
                        </div>                        
                    @endcan
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
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    @can('Edit FAQs')
                                                        <a href="{{ route('admin.faq.edit', [$faq['id']]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    @endcan
                                                    @can('Delete FAQs')
                                                        <a href="{{ route('admin.faq.destroy', [$faq['id']]) }}" onclick="confirmFormSubmit(event, 'deleteFaq{{ $faq['id'] }}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    @endcan
                                                    <form action="{{ route('admin.faq.destroy', [$faq['id']]) }}" method="POST" id="deleteFaq{{ $faq['id'] }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>


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
