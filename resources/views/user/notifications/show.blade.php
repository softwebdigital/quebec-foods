@extends('layouts.user')

@section('pageTitle', 'Notification')

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('notifications') }}" class="@if (request()->routeIs(['notifications'])) text-dark @else text-muted @endif">Notification</a></li>
    <li class="breadcrumb-item"><a href="javasscript:void()" class="text-dark">Details</a></li>
@endsection

@section('content')
<!--begin::Content-->
    <!--begin::Card-->
    <div class="card">
        <div class="card-body">
            <!--begin::Title-->
            <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <!--begin::Heading-->
                    <h2 class="fw-bold me-3 my-1">{{ json_decode($notification->data)->title }}</h2>
                    <!--begin::Heading-->
                </div>
                <div class="d-flex">
                    <span class="fw-bold text-muted text-end me-3">{{ date('M d, Y \a\t h:i A', strtotime($notification->created_at)) }}</span>
                </div>
            </div>
            <!--end::Title-->
            <!--begin::Message accordion-->
            <div data-kt-inbox-message="message_wrapper">
                <!--begin::Message content-->
                <div class="collapse fade show" data-kt-inbox-message="message">
                    <div class="py-5">
                        {!! json_decode($notification->data)->body !!}
                    </div>
                </div>
                <!--end::Message content-->
            </div>
        </div>
    </div>
    <!--end::Card-->
<!--end::Content-->
@endsection
