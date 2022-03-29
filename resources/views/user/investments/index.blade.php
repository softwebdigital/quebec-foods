@extends('layouts.user')

@section('pageTitle', 'Investment')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void();" class="text-muted">{{ ucfirst($type) }} Investments</a></li>
    <li class="breadcrumb-item"><a href="javascript:void();" class="text-dark">{{ ucfirst($filter) }}</a></li>
@endsection

@section('content')
<!--begin::Col-->
<div class="col-xl-12 mb-5 mb-xl-10">
    <!--begin::Table Widget 4-->
    <div class="card card-flush h-xl-100">
        <!--begin::Card header-->
        <div class="card-header py-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">{{ ucfirst($filter) }} {{ ucfirst($type) }} Investments</span>
            </h3>
            <!--end::Title-->
            <div class="justify-content-end">
                <a data-bs-toggle="modal" @if($type == 'plant') data-bs-target="#createPlantInvestment" @else data-bs-target="#createFarmInvestment"@endif  class="btn btn-sm btn-light-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Create New Investment</a>
            </div>
        </div>

        <!--begin::Actions-->
        <div class="card-toolbar">
            <!--begin::Filters-->
            <div class="d-flex justify-content-end me-10">
                <!--begin::Destination-->
                <div class="d-flex align-items-center fw-bolder">
                    <!--begin::Label-->
                    <div class="text-muted fs-7 me-2">Package</div>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
                        <option></option>
                        <option value="Show All" selected="selected">Show All</option>
                        @php
                            $packages = App\Models\Package::all();
                        @endphp
                        @foreach($packages as $package)
                            <option value="{{ $package['name'] }}">{{ $package['name'] }}</option>
                        @endforeach
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Destination-->
                <!--begin::Status-->
                <div class="d-flex align-items-center fw-bolder">
                    <!--begin::Label-->
                    <div class="text-muted fs-7 me-2">Status</div>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
                        <option></option>
                        <option value="Show All" selected="selected">Show All</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Status-->
                <!--begin::Search-->
                <div class="position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Filters-->
        </div>
        <!--end::Actions-->

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-3" id="!kt_table_widget_4_table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 text-dark rounded-start text-nowrap">SN</th>
                            <th class="text-dark">Package</th>
                            <th class="text-dark">Slots</th>
                            <th class="text-dark text-nowrap">Total Invested</th>
                            <th class="text-dark text-nowrap">Expected Returns</th>
                            <th class="text-dark text-nowrap">Return Date</th>
                            @if ($type == 'farm')
                                <th class="text-dark text-nowrap">Rollover</th>
                            @endif
                            <th class="text-dark text-nowrap">Payment</th>
                            <th class="text-dark text-nowrap">Status</th>
                            <th class="text-dark rounded-end"></th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($investments as $key=>$investment )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $investment['package']['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ number_format($investment['slots']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">₦ {{ number_format($investment['amount']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">₦ {{ number_format($investment['total_return']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6 text-nowrap">{{ $investment['return_date']->format('M d, Y') }}</span></td>
                                @if ($type == 'farm')
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $investment['rollover'] == 1 ? 'Yes' : 'No' }}</span></td>
                                @endif
                                <td>
                                    @if($investment['payment'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($investment['payment'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @elseif($investment['payment'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($investment['status'] == 'active')
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @elseif($investment['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($investment['status'] == 'settled')
                                        <span class="badge badge-pill badge-secondary">Settled</span>
                                    @elseif($investment['status'] == 'cancelled')
                                        <span class="badge badge-pill badge-danger">Declined</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('investments.show', ['investment' => $investment['id'], 'type' => $type]) }}" class="btn btn-sm btn-light-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end"><i class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Table Widget 4-->
</div>
<!--end::Col-->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });
</script>
@endsection

