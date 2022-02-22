@extends('layouts.admin')

@section('pageTitle', 'Edit FAQ')

@section('style')

@endsection

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.faq') }}" class="text-muted">FAQ</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.faq.edit') }}" class="text-muted">Edit FAQ</a></li>
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
                        <h4 class="mb-5">Edit a Question</h4>
                    </div>
                    <!--end::Card title-->
                    <!--begin:::Form-->
                    <form class="form mb-3" method="post" action="{{ route('admin.faq.update', $faq["id"]) }}" id="editFaqForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="category">Select Category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="category" aria-label="Select the Faq Category" data-placeholder="Select the Faq Category" data-control="select2" class="form-select form-select-solid text-dark" id="category">
                                <option value="">Select the category</option>
                                @foreach ($faqCategories as $faqCategory )
                                <option @if((old('category') == $faqCategory['name']) || $faqCategory['id'] == $faq['faq_category_id'])) selected @endif value="{{ $faqCategory['name'] }}" >{{ $faqCategory['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="question">Question</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" placeholder="Question" value="{{ old("question") ?? $faq['question'] }}" class="form-control form-control-solid" name="question" id="question">
                            @error('question')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mt-4 mb-5 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2" for="answer">Answer</label>
                            <!--end::Label-->
                            <!--end::Input-->
                            <textarea placeholder="Answer" style="resize: none" class="form-control form-control-solid" name="answer" id="answer" rows="5">{{ old("answer") ?? $faq['answer'] }}</textarea>
                            @error('answer')
                            <span class="text-danger small" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Submit-->
                        <button type="button" onclick="confirmFormSubmit(event, 'editFaqForm')" class="btn btn-primary w-100">
                            <!--begin::Indicator-->
                            <span class="indicator-label">Update</span>
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
