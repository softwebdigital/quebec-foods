@extends('layouts.admin')

@section('pageTitle', 'FAQ Category')

@section('breadCrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.faq') }}" class="@if (request()->routeIs(['admin.faq'])) text-dark @else text-muted @endif">FAQs Management</a></li>
<li class="breadcrumb-item"><a href="javascript:void()" class="text-dark">FAQ Category</a></li>
@endsection

@section('content')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">FAQ Category</span>
        </h3>
        <div class="card-toolbar">
            <button type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModal" class="btn btn-sm btn-light-primary">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->New Category</button>
        </div>
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
                        <th class="text-dark">Category Name</th>
                        <th class="text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($faqCategories as $key => $faqCategory)
                        <tr>
                            <td class="ps-4"><span class="text-dark fw-bolder d-block mb-1 fs-6">1</span></td>
                            <td><span class="text-gray-600 fw-bolder d-block fs-6">{{ $faqCategory['name']}}</span></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light-primary btn-active-primary" data-kt-menu-trigger="click" style="white-space: nowrap" data-kt-menu-placement="bottom-end">Action
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $faqCategory['id'] }}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="menu-link px-3" onclick="confirmFormSubmit(event, 'categoryDelete{{ $faqCategory['id'] }}')" href="{{ route('admin.faq.category.destroy', $faqCategory['id']) }}"><i data-feather="delete" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <form id="categoryDelete{{ $faqCategory['id'] }}" action="{{ route('admin.faq.category.destroy', $faqCategory['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!--begin::Deposit Modal-->
                        <div class="modal fade" tabindex="-1" id="editCategoryModal{{ $faqCategory['id'] }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update</h5>

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <span class="svg-icon svg-icon-2x"></span>
                                        </div>
                                        <!--end::Close-->
                                    </div>

                                    <div class="modal-body">
                                        <form class="form mb-3" action="{{ route('admin.faq.category.update', $faqCategory['id'])}}" method="post" id="editCategoryForm{{ $faqCategory['id'] }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-5 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2" for="categoryName">Category Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" placeholder="Edit Category" value="{{ old("category") ?? $faqCategory['name'] }}" class="form-control form-control-solid" name="category" id="categoryName">
                                                @error('category')
                                                <span class="text-danger small" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="confirmFormSubmit(event, 'editCategoryForm{{ $faqCategory['id'] }}')" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Withdrawal Modal-->
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

  <!--begin::Create Category Modal-->
  <div class="modal fade" tabindex="-1" id="createCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Category</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form class="form mb-3" action="{{ route('admin.faq.category.store') }}" method="post" id="createCategoryForm" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-5 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2" for="categoryName">Category Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" placeholder="Category Name" value="{{ old("category") }}" class="form-control form-control-solid" name="category" id="categoryName">
                        @error('category')
                        <span class="text-danger small" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="confirmFormSubmit(event, 'createCategoryForm')" class="btn btn-primary">Create Category</button>
            </div>
        </div>
    </div>
</div>
<!--end::Withdrawal Modal-->
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
