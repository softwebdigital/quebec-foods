@extends('layouts.admin')

@section('pageTitle', 'Referrals')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Referrals</a></li>
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
                <table class="table align-middle table-row-dashed gs-0 gy-4" id="data-table">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted bg-light">
                            <th class="ps-4 text-dark rounded-start">SN</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Referrals</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($users as $key=>$user )
                            <tr>
                                <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">{{ $key + 1 }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $user['name'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $user['email'] }}</span></td>
                                <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ count($user['referrals']) }}</span></td>
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

