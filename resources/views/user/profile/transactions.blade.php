@extends('layouts.user')

@section('pageTitle', 'User Details')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-muted">Account Overview</a></li>
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Transactions</a></li>
@endsection

@section('content')
    @include('user.profile.partials.navbar', ['user' => $user]);
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Transactions</span>
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
                            <th class="text-dark">Amount</th>
                            <th class="text-dark">Description</th>
                            <th class="text-dark">Date</th>
                            <th class="text-dark">Method</th>
                            <th class="text-dark">Channel</th>
                            <th class="text-dark">Status</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($transactions as $key=>$transaction )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">{{ $transaction['user']['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">₦ {{ number_format($transaction['amount']) }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['description'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6" style="white-space: nowrap;">{{ $transaction['created_at']->format('M d, Y') }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['method'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $transaction['channel'] }}</span></td>
                                <td>
                                    @if($transaction['status'] == 'approved')
                                        <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($transaction['status'] == 'pending')
                                        <span class="badge badge-pill badge-warning">Pending</span>
                                    @elseif($transaction['status'] == 'declined')
                                        <span class="badge badge-pill badge-danger">Declined</span>
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
