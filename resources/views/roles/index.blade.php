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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Fakir
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">inass</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!--begin::Row-->
                <!--begin::Card-->
                <div class="card">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                Role Management
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" data-bs-original-title="" title="">
                                <div class="me-4">
                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Filter
                                    </button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_621214a8b8f66" style="">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <form action="http://127.0.0.1:8000/college" method="get">
                                            <input type="hidden" name="_token"
                                                value="GG7lp7m7GP9evLraVsjFj4wL06cJEziSMUyvd1qE">
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold">Parent:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <div>
                                                        <select class="form-select form-select-solid" data-control="select2"
                                                            name="Statut" data-placeholder="Select an option"
                                                            data-allow-clear="true">
                                                            <option disabled="" selected=""> statuts </option>
                                                            <option value="10">tous</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">desactive</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset"
                                                        class="btn btn-sm btn-light btn-active-light-primary me-2">Reset</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Wrapper-->


                                <a href="{{ route('roles.create') }}" class="btn btn-sm btn-light btn-active-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Create New Role
                                </a>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table id="kt_datatable_example_5"
                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="w-25Fpx">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" id="select_all"
                                                        data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                                </div>
                                            </th>
                                            <th class="min-w-150px">Name</th>
                                            <th class="min-w-150px">Date Ajouter</th>
                                            <th class="min-w-140px ">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>


                                        @foreach ($roles as $key => $role)
                                            <tr>

                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">
                                                                {{ $role->name }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">
                                                                {{ date('Y-m-d', strtotime($role->created_at)) }}

                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content flex-shrink-0">
                                                        <a href="{{ route('roles.show',$role->id) }}"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen019.svg-->
                                                            <span class="svg-icon svg-icon-3"> <svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="black" />
                                                                    <path opacity="0.3"
                                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                        fill="black" />
                                                                </svg></span>
                                                            <!--end::Svg Icon-->
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                              
                                                        <a data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $role->id }}" href="#"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                    fill="black" />
                                                                <path opacity="0.5"
                                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                    fill="black" />
                                                                <path opacity="0.5"
                                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>



                                    
                                
                                        <!-- end modal edit -->
                                        <!-- start modal delete -->
                                        <!-- modul delte -->
                                        <div class="modal fade" tabindex="-1" id="delete{{ $role->id }}">
                                            <div class="modal-dialog mw-650px">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <form action="{{ URL::route('roles.destroy', $role->id) }}"
                                                            method="POST" id="kt_modal_new_target_form"
                                                            class="form">
                                                            @method('delete')
                                                            @csrf
                                                            <!--begin::Heading-->
                                                            <div class="mb-13 text-center">
                                                                <!--begin::Title-->
                                                                <h1 class="mb-3">Set First Target</h1>
                                                                <!--end::Title-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fw-bold fs-5">If you need
                                                                    more info, please check
                                                                    <a href="#"
                                                                        class="fw-bolder link-primary">Project
                                                                        Guidelines</a>.
                                                                </div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Heading-->
                                                            <!--begin::Input group-->
                                                            <div class="d-flex flex-column mb-8 fv-row">
                                                                <!--begin::Label-->
                                                                <label
                                                                    class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                    <span class="required">voulez-vous
                                                                        supprimer Classe </span>
                                                                    <code>{{ $role->name }}</code>
                                                                    <input type="hidden" id="id" name="id"
                                                                        value="{{ $role->id }}"
                                                                        >
                                                                </label>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal delete -->
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
                </div>
                <!--end::Card-->
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!-- delete all -->





@endsection

@section('scripts')
@endsection