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
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Role-Permission
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Modifier Permission</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px ">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->
                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column ">
                                    <!--begin::Avatar-->

                                    <!--begin::Name-->
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div>
                                        <!--begin::Badge-->
                                        <code  style="font-size: 20px ; background: none !important">Role :</code>
                                        <div class="badge badge-lg badge-light-primary d-inline">{{ $role->name }}</div>
                                        <!--begin::Badge-->
                                    </div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <!--begin::Info heading-->
                                   
                                  
                                </div>
                                <!--end::User Info-->
                                <!--end::Summary-->
                                <!--begin::Details toggle-->

                                <!--end::Details toggle-->
                                <!--begin::Details content-->

                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Connected Accounts-->

                        <!--end::Connected Accounts-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tabs-->

                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="card mb-5 mb-xl-8">


                            <form action="{{ route('roles.update', $role->id) }}" id="kt_contact_form"  method="POST">
                               
                                @csrf
                                @method('PATCH')
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h3 class="fw-bolder m-0">Permission</h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-2">
                                    <!--begin::Notice-->

                                    <!--begin::Items-->
                                    <div class="py-2">
                                        <!--begin::Item-->
                                        @foreach ($permission as $value)
                                            <div class="d-flex flex-stack">
                                                <div class="d-flex">
                                                    <img src="assets/media/svg/brand-logos/google-icon.svg"
                                                        class="w-30px me-6" alt="">
                                                    <div class="d-flex flex-column">
                                                        <a href="#"
                                                            class="fs-5 text-dark text-hover-primary fw-bolder"  >{{ $value->name }}</a>
                                                        <div class="fs-6 fw-bold text-muted">{{ $value->guard_name }}</div>
                                                        <input type="hidden" name="name" value={{$role->name}}>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Switch-->
                                                    <label
                                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input" name="permission[]"
                                                            type="checkbox" value={{ $value->id }}
                                                            {{ in_array($value->id, $rolePermissions) ? 'checked ' : '' }}
                                                            >
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <div class="separator separator-dashed my-5"></div>

                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                    <div class="separator separator-dashed my-5"></div>


                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                        @endforeach

                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer border-0 d-flex justify-content-center pt-0">
                                    <button class="btn btn-sm btn-light-primary">Save Changes</button>
                                </div>
                                <!--end::Card footer-->
                            </form>
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
               
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('scripts')
@endsection
