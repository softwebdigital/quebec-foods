@extends('layouts.user')

@section('pageTitle', 'Referrals')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('transactions') }}" class="text-dark">Referrals</a></li>
@endsection

@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Referrals</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4" id="data-table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 text-dark rounded-start">SN</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Earning</th>
                            <th class="text-dark">Date</th>
                            <th class="text-dark">Status</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($referrals as $key=>$referral )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['referred']['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['referred']['email'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">₦ @if($referral['amount']) {{ number_format($referral['amount']) }} @else ---- @endif</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $referral['created_at']->format('M d, Y') }}</span></td>
                                <td>
                                    @if($referral['paid'] <> 1)
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Paid</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
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

