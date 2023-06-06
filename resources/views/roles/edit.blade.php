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
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Summary-->
                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->

                                    <!--begin::Name-->
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="mb-9">
                                        <!--begin::Badge-->
                                        <div class="badge badge-lg badge-light-primary d-inline">{{ $role->name }}</div>
                                        <!--begin::Badge-->
                                    </div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <!--begin::Info heading-->
                                    <div class="fw-bolder mb-3">Assigned Tickets
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                            data-bs-trigger="hover" data-bs-html="true"
                                            data-bs-content="Number of support tickets assigned, closed and pending this week."
                                            data-bs-original-title="" title=""></i>
                                    </div>
                                    <!--end::Info heading-->
                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-75px">243</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="black"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-muted">Total</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-50px">56</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(-90 11 18)" fill="black"></rect>
                                                        <path
                                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-muted">Solved</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-50px">188</span>
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6"
                                                            width="13" height="2" rx="1"
                                                            transform="rotate(90 13 6)" fill="black"></rect>
                                                        <path
                                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-muted">Open</div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User Info-->
                                <!--end::Summary-->
                                <!--begin::Details toggle-->

                                <!--end::Details toggle-->
                                <div class="separator"></div>
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
