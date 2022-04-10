@extends('layouts.admin')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}" class="text-muted">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Referral</a></li>
@endsection

@section('content')
    @include('admin.user.partials.navbar', ['user' => $user]);

    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Referrals" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="ps-4 text-muted rounded-start text-nowrap">SN</th>
                            <th class="text-muted text-nowrap">Name</th>
                            <th class="text-muted text-nowrap">Email</th>
                            <th class="text-muted text-nowrap">Date</th>
                        </tr>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @if ($user->referrals->count() > 0)
                            @foreach ($user->referrals as $key=>$referral )
                                <tr>
                                    <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['referred']['name'] }}</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['referred']['email'] }}</span></td>
                                    <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['created_at']->format('M d, Y') }}</span></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center text-muted fw-bold">No available data</td>
                            </tr>
                        @endif
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
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
