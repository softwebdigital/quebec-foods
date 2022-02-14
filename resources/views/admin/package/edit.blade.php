@extends('layouts.admin')

@section('pageTitle', ucfirst($type).' Packages')

@section('style')

@endsection

@section('breadCrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.packages', $type) }}" class="text-muted">{{ ucfirst($type) }} Package</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.packages.edit', [$type, $package['id']]) }}" class="text-muted">Edit {{ ucfirst($type) }} Package</a></li>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-lg-row-fluid me-lg-7 me-xl-10">
    <!--begin::Card-->
    <div class="row">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-body p-9">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h4 class="mb-5">Edit {{ ucfirst($type) }} Package</h4>
                    </div>
                    <!--end::Card title-->
                    <!--begin:::Form-->
                    <form class="form mb-3" method="post" action="{{ route('admin.packages.update', [$type, $package['id']]) }}" id="editPackageForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ strtolower($type) }}" name="type">
                        @if ($type == 'plant')
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty mb-5" data-kt-image-input="true" style="background: url({{ asset($package['image']) }}) center/cover no-repeat;">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px" style="background: url({{ asset($package['image']) }}) center/cover no-repeat;"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Change image">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="image_remove" id="image_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Cancel image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove"
                            data-bs-toggle="tooltip"
                            data-bs-dismiss="click"
                            title="Remove image">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        @error('image')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                        <!--end::Image input-->
                        @endif
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" placeholder="Package name" value="{{ old("name") ?? $package['name'] }}" class="form-control" name="name" id="name">
                                @error('name')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea placeholder="Description" class="form-control" name="description" style="resize: none" id="description" rows="5">{{ old("description") ?? $package['description'] }}</textarea>
                            @error('description')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="roi">ROI in %</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="number" placeholder="ROI" value="{{ old("roi") ?? $package['roi'] }}" class="form-control" name="roi" id="roi">
                            @error('roi')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="price">Price per Slot</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="number" placeholder="Price per Slot" value="{{ old("price") ?? $package['price'] }}" class="form-control" name="price" id="price">
                            @error('price')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <label class="required fs-5 fw-bold mb-2" for="start_date">Start Date</label>
                            <input class="form-control" placeholder="Start Date" id="kt_daterangepicker_3" value="{{ old('start_date') ?? $package['start_date'] }}" name="start_date" id="startDate" />
                            @error('start_date')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="slot">Total Available Slots</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" placeholder="Total Available Slots" value="{{ old("slots") ?? $package['slots'] }}" class="form-control" name="slots" id="slots">
                            @error('slots')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        @if ($type == 'plant')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="duration">Milestones</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="number" placeholder="No of Milestones" value="{{ old("milestones") ?? $package['milestones'] }}" class="form-control" name="milestones" id="milestones">
                            @error('milestones')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        @endif
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="duration_mode">Duration Mode</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="duration_mode" aria-label="Select the duration mode" data-placeholder="Select the duration mode" data-control="select2" class="form-select text-dark" id="durationMode">
                                <option value=""></option>
                                <option @if(old('duration_mode') == 'day' || $package['duration_mode'] == "day") selected @endif value="day">Days</option>
                                <option @if(old('duration_mode') == 'month' || $package['duration_mode'] == "month") selected @endif value="month">Months</option>
                                <option @if(old('duration_mode') == 'year' || $package['duration_mode'] == "year") selected @endif value="year">Years</option>
                            </select>
                            @error('duration_mode')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="duration">Duration</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" placeholder="Duration" value="{{ old("duration") ?? $package['duration'] }}" class="form-control" name="duration" id="duration">
                            @error('duration')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($type == 'farm')
                        <!--end::Input group-->
                        <div class="form-check form-switch form-check-custom form-check-solid my-7">
                            <input class="form-check-input mb-2 h-20px w-30px" type="checkbox" @if(old('rollover') == 1 || $package['rollover'] == 1) checked @endif name="rollover" value="1" id="makePackageRollover"/>
                            <label class="form-check-label fs-5 fw-bold mb-2" for="makePackageRollover">
                                Enable rollover
                            </label>
                        </div>
                        @endif
                        @if ($type == 'plant')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="payout_mode">Payout Mode</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="payout_mode" aria-label="Select the payout mode" data-placeholder="Select the payout mode" data-control="select2" class="form-select text-dark" id="payoutMode">
                                <option value=""></option>
                                <option @if(old('payout_mode') == 'monthly' || $package['payout_mode'] == "monthly") selected @endif value="monthly">Monthly</option>
                                <option @if(old('payout_mode') == 'quarterly' || $package['payout_mode'] == "quarterly") selected @endif value="quarterly">Quarterly</option>
                                <option @if(old('payout_mode') == 'annually' || $package['payout_mode'] == "annually") selected @endif value="annually">Annually</option>
                                <option @if(old('payout_mode') == 'biannually' || $package['payout_mode'] == "biannually") selected @endif value="biannually">Biannually</option>
                            </select>
                            @error('payout_mode')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row my-10">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Status of package</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <div class="form-check form-check-custom form-check-solid form-check-sm">
                                    <input class="form-check-input" @if($package['status'] == "open") checked @endif type="radio"  name="status" id="open" value="open"  />
                                    <label class="form-check-label" for="open">
                                        Open
                                    </label>
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <div class="form-check form-check-custom form-check-solid form-check-sm">
                                    <input class="form-check-input" @if($package['status'] == "closed") checked @endif type="radio" name="status" id="closed" value="closed"  />
                                    <label class="form-check-label" for="close">
                                        Closed
                                    </label>
                                </div>
                            </div>
                            <!--end::Col-->
                            @error('status')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @endif
                        <!--end::Input group-->
                        <!--begin::Submit-->
                        <button type="button" onclick="confirmFormSubmit(event, 'editPackageForm')" class="btn btn-primary w-100">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Update  Package</span>
                            <!--end::Indicator-->
                        </button>
                        <!--end::Submit-->
                    </form>
                    <!--end:::Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
</div>
<!--end::Content-->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "searching": true,
            "lengthMenu": [[100, 200, 300, 400], [100, 200, 300, 400]]
        });
    });

    $("#kt_daterangepicker_3").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"),10),
        locale: {
            format: "YYYY-MM-DD"
        }
    },
);
</script>
@endsection
