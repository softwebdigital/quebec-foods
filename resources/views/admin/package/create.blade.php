@extends('layouts.admin')

@section('pageTitle', ucfirst($type).' Packages')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.packages', $type) }}" class="@if (request()->routeIs(['admin.packages'])) text-dark @else text-muted @endif">{{ ucfirst($type) }} Package</a></li>
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">Create {{ ucfirst($type) }} Package</a></li>
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
                        <h4 class="mb-5">Create {{ ucfirst($type) }} Package</h4>
                    </div>
                    <!--end::Card title-->
                    <!--begin:::Form-->
                    <form class="form mb-3" method="post" action="{{ route('admin.packages.store') }}" id="createPackageForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ strtolower($type) }}" name="type">
                        @if ($type == 'plant')
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty mb-5" data-kt-image-input="true">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px" style="background: url({{ asset('assets/media/avatars/image_placeholder.png') }}) center/cover no-repeat;"></div>
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
                            <!--end::Image input-->
                            <div>
                                @error('image')
                                <span class="text-danger small d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        @endif
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="name">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Package name" value="{{ old("name")}}" class="form-control form-control-solid" name="name" id="name">
                            @error('name')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mt-4 mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea placeholder="Description" style="resize: none" class="form-control form-control-solid" name="description" id="description" rows="5">{{ old("description") }}</textarea>
                            @error('description')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if ($type == 'farm')
                        <!--end::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="category">Category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="category" aria-label="Select the package category" data-placeholder="Select the package category" data-control="select2" class="form-select form-select-solid text-dark" id="category">
                                <option value=""></option>
                                @foreach (\App\Models\Category::all() as $category)
                                    <option @if(old('category') == $category['id']) selected @endif value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="roi">ROI in %</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="number" placeholder="ROI" value="{{ old("roi") }}" class="form-control form-control-solid" name="roi" id="roi">
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
                            <input type="number" placeholder="Price per Slot" value="{{ old("price") }}" class="form-control form-control-solid" name="price" id="price">
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
                            <input class="form-control form-control-solid" placeholder="Start Date" id="kt_daterangepicker_3" value="{{ old('start_date') }}" name="start_date" id="startDate" />
                            @error('start_date')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        @if ($type == 'farm')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="slot">Total Available Slots</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <input type="text" placeholder="Total Available Slots" value="{{ old("slots") }}" class="form-control form-control-solid" name="slots" id="slots">
                            @error('slots')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        @endif
                        @if ($type == 'plant')
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2" for="duration">Milestones</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type="number" placeholder="No of Milestones" value="{{ old("milestones") }}" class="form-control form-control-solid" name="milestones" id="milestones">
                                @error('milestones')
                                    <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        @endif
                        @if ($type == 'farm')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="duration_mode">Duration Mode</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="duration_mode" aria-label="Select the duration mode" data-placeholder="Select the duration mode" data-control="select2" class="form-select form-select-solid text-dark" id="durationMode">
                                <option value=""></option>
                                <option @if(old('duration_mode') == 'day') selected @endif value="day">Days</option>
                                <option @if(old('duration_mode') == 'month') selected @endif value="month">Months</option>
                                <option @if(old('duration_mode') == 'year') selected @endif value="year">Years</option>
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
                            <input type="text" placeholder="Duration" value="{{ old("duration") }}" class="form-control form-control-solid" name="duration" id="duration">
                            @error('duration')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @endif
                        <!--end::Input group-->
                        @if ($type == 'plant')
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2" for="payout_mode">Payout Mode</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="payout_mode" aria-label="Select the payout mode" data-placeholder="Select the payout mode" data-control="select2" class="form-select form-select-solid text-dark" id="payoutMode">
                                    <option value=""></option>
                                    <option @if(old('payout_mode') == 'monthly') selected @endif value="monthly">Monthly</option>
                                    <option @if(old('payout_mode') == 'quarterly') selected @endif value="quarterly">Quarterly</option>
                                    <option @if(old('payout_mode') == 'semi-annually') selected @endif value="semi-annually">Semi Annually (Half a year)</option>
                                    <option @if(old('payout_mode') == 'annually') selected @endif value="annually">Annually</option>
                                    <option @if(old('payout_mode') == 'biannually') selected @endif value="biannually">Biannually</option>
                                </select>
                                @error('payout_mode')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <div class="my-4">
                                <!--end::Label-->
                                <div class="form-check form-switch form-check-custom form-check-solid my-7">
                                    <input class="form-check-input mb-2 h-20px w-30px" type="checkbox"
                                        @if (old('status') == 'open') checked @endif name="status" value="open"
                                        id="makePackageOpen" />
                                    <label class="form-check-label fs-5 fw-bold mb-2" for="makePackageOpen">
                                        Package Status
                                    </label>
                                </div>
                                @error('status')
                                    <div class="small text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        @if ($type == 'farm')
                            <div class="form-check form-switch form-check-custom form-check-solid my-7">
                                <input class="form-check-input mb-2 h-20px w-30px" type="checkbox" name="rollover" value="1" id="makePackageRollover"/>
                                <label class="form-check-label fs-5 fw-bold mb-2" for="makePackageRollover">
                                        Enable rollover
                                </label>
                            </div>
                            @error('rollover')
                                <div class="small text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif

                        <!--begin::Submit-->
                        @can('Create Packages')
                            <button type="button" onclick="confirmFormSubmit(event, 'createPackageForm')" class="btn btn-primary w-100">
                                <!--begin::Indicator-->
                                <span class="indicator-label">Create Package</span>
                                <!--end::Indicator-->
                            </button>
                        @endcan
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
        timePicker: true,
        startDate: moment().startOf("hour"),
        locale: {
            format: "YYYY-MM-DD HH:mm:ss"
        }
    },
);
</script>
@endsection
