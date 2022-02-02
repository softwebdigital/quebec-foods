@extends('layouts.user')

@section('pageTitle', 'Notifications')

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('notifications') }}" class="text-dark">Notifications</a></li>
@endsection

@section('content')
<!--begin::Tables Widget 3-->
<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Notifications</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{ auth()->user()->unreadNotifications()->count() }} new notification(s)</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-3">
                <!--begin::Table head-->
                <thead>
                    <tr>
                        <th class="p-0 w-50px"></th>
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-140px"></th>
                        <th class="p-0 min-w-120px"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @if (count($notifications) > 0 )
                        @foreach ($notifications as $notification )
                        <tr>
                            <td>
                                <div class="symbol symbol-50px me-2">
                                    @if ($notification['read_at'])
                                        <span class="symbol-label bg-light-success">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                            <span class="svg-icon svg-icon-2x svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black" />
                                                    <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    @else
                                        <span class="symbol-label bg-light-warning">
                                            <i class="fa fa-envelope text-warning fa-2x"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('notifications.show', $notification['id']) }}">
                                    <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6 h1">{{ $notification['data']['title'] }}</span>
                                    <span class="text-muted fw-bold d-block fs-7">{!! $notification['data']['description'] !!}</span>
                                </a>
                            </td>
                            <td class="text-end text-dark fw-bolder fs-6 pe-0">
                                <span class="icon"><i data-feather="calendar"></i></span>
                                {{ $notification['created_at']->format('d M, Y') }}
                            </td>
                        </tr>
                        @endforeach
                    @endif

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 3-->
@endsection
