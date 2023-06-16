@extends('layouts.master')
@section('title')
    Home
@endsection


@section('css')
    @toastr_css
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection



@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Afficher les détails du rôle</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                       
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Gestion des utilisateurs</li>
                        <!--end::Item-->
                       
                    
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
               
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10">
                        <!--begin::Card-->
                        <div class="card card-flush">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="mb-0"> {{ $role->name }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Permissions-->
                                <div class="d-flex flex-column text-gray-600">

                                    @if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $v)
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span>{{ $v->name }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer pt-0">
                                <a type="button" class="btn btn-light btn-active-primary"
                                href="{{ route('roles.edit', $role->id) }}">Modifier Role</a>
                            </div>
                            <!--end::Card footer-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Modal-->
                        <!--begin::Modal - Update role-->
                        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-750px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bolder">Update Role</h2>
                                        <!--end::Modal title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-roles-modal-action="close">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                        height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                        fill="black"></rect>
                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                        rx="1" transform="rotate(45 7.41422 6)" fill="black">
                                                    </rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_update_role_form"
                                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_update_role_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                                data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
                                                data-kt-scroll-offset="300px" style="max-height: 64px;">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bolder form-label mb-2">
                                                        <span class="required">Role name</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid"
                                                        placeholder="Enter a role name" name="role_name"
                                                        value="Developer">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Permissions-->
                                                <div class="fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                                    <!--end::Label-->
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                            <!--begin::Table body-->
                                                            <tbody class="text-gray-600 fw-bold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">Administrator Access
                                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            data-bs-original-title="Allows a full access to the system"
                                                                            aria-label="Allows a full access to the system"></i>
                                                                    </td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" value=""
                                                                                id="kt_roles_select_all">
                                                                            <span class="form-check-label"
                                                                                for="kt_roles_select_all">Select all</span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">User Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="user_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Content Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="content_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Financial Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="financial_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Reporting</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="reporting_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Payroll</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="payroll_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Disputes Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="disputes_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">API Controls</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="api_controls_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Database Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="database_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <!--begin::Label-->
                                                                    <td class="text-gray-800">Repository Management</td>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input group-->
                                                                    <td>
                                                                        <!--begin::Wrapper-->
                                                                        <div class="d-flex">
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_read">
                                                                                <span class="form-check-label">Read</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_write">
                                                                                <span class="form-check-label">Write</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                            <!--begin::Checkbox-->
                                                                            <label
                                                                                class="form-check form-check-custom form-check-solid">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    name="repository_management_create">
                                                                                <span
                                                                                    class="form-check-label">Create</span>
                                                                            </label>
                                                                            <!--end::Checkbox-->
                                                                        </div>
                                                                        <!--end::Wrapper-->
                                                                    </td>
                                                                    <!--end::Input group-->
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Permissions-->
                                            </div>
                                            <!--end::Scroll-->
                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-roles-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-roles-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                            <div></div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Update role-->
                        <!--end::Modal-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-10">
                        <div class="card card-flush mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header pt-5">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="d-flex align-items-center">Utilisateurs affectés : 
                                        <span class="text-gray-600 fs-6 ms-1"> {{count($users)}}</span>
                                    </h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">

                                   
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <div class="card-body py-3">
                                    <!--begin::Accordion-->
                                   <!--begin::Table-->
                                   <table id="kt_datatable_example_5"  class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                      <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="w-25px">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            data-kt-check="true"
                                                            data-kt-check-target=".widget-9-check" />
                                                    </div>
                                                </th>
                                                <th class="min-w-150px">Nom </th>
                                                <th class="min-w-150px">Email</th>
                                                <th class="min-w-150px">Role  </th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @if (isset($users))
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>
                                                      
        
                                              
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">
                                                                        {{ $user->name }}
                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
        
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">
                                                                        {{ $user->email }}
        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="d-flex justify-content-start flex-column">
                                                                    <a href="#"
                                                                        class="text-dark fw-bolder text-hover-primary fs-6">
                                                                        {{ $role->name }}        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                     
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <!--end::Table body-->
                                   </table>
                               <!--end::Table-->
        
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@section('scripts')
@endsection
