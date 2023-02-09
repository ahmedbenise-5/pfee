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
                                <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Click to add a user">
                                <!--begin::Group actions-->
                                <a
                                data-bs-toggle="modal" data-bs-target="#delet_all"
                                 class="btn btn-sm btn-light  btn-danger m-3" id="checkerButton"
                                    style="display: none" >Delete Selected </a>

                                {{-- <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_new_target">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->New Member
                                </a> --}}
                                <!--begin::Toolbar-->
												<!--begin::Filter-->

                                                {{-- <div>
                                                    <form method="POST" action="{{route('classe.index')}}">
                                                        @csrf
                                                         <select class="form-select form-select" id="nvd_id" name="nvd_id" onchange="this.form.submit()" >
                                                            <option disabled selected hidden> Filltre</option>
                                                            <option value="1"> tous</option>
                                                            @foreach ($nvs as $nv)
                                                            <option value="{{$nv->id}}">{{$nv->Nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </div> --}}

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <!--begin::Add user-->
												<button type="button" class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    Ajouter classe</button>


                                                    <!-- test -->
                                                    	<!--begin::Wrapper-->
									<div class="me-4">
										<!--begin::Menu-->
										<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Filter</button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_621214a8b8f66">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <form method="get">
                                                @csrf
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Parent:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select select2" name="parent">
                                                                <option selected disabled>Select option:</option>

                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" id="status_check" value="1" name="status" checked="checked">
                                                            <label class="form-check-label">Published</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2">Reset</button>
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
                                            <th class="min-w-150px">Nom Calsse</th>
                                            <th class="min-w-150px">Niveaux d'études</th>
                                            <th class="min-w-150px">date cree </th>
                                            <th class="min-w-140px ">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>


                                            @foreach ($classes as $classe)
                                                <tr>
                                                    <td>
                                                            <div class=" form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" name="deleter[]" id="fakir"
                                                                value="{{ $classe->id }}" />
                                                            </div>
                                                    <td>

                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    {{ $classe->Nom_Classe ? $classe->Nom_Classe : 'aucun Classe ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                            {{ $classe->niveauxdetudes->Nom ? $classe->niveauxdetudes->Nom : ' aucun niveaux de etudes' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                            {{ $classe->created_at->format('d-m-Y') ? $classe->created_at->format('d-m-Y') : 'aucun Date' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content flex-shrink-0">
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#update{{ $classe->id }}" href="#"
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
                                                                data-bs-target="#delete{{ $classe->id }}" href="#"
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



                                                <!-- modal edit -->
                                                <!-- modul edit -->
                                                <div class="modal fade" tabindex="-1" id="update{{ $classe->id }}">
                                                    <div class="modal-dialog mw-650px">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="{{ URL::route('classe.update', 'update') }}"
                                                                    method="POST" id="kt_modal_new_target_form"
                                                                    class="form">
                                                                    @method('patch')
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
                                                                            <span class="required">Target Title</span>
                                                                            <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                                                data-bs-toggle="tooltip"
                                                                                title="Specify a target name for future usage and reference"></i>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                        <input type="text" name='Nom_Classe'
                                                                            value="{{ $classe->Nom_Classe }}"
                                                                            class="form-control form-control-solid"
                                                                            placeholder="Enter Target Title"
                                                                            name="target_title" />
                                                                        <input type="hidden" id="id" name="id"
                                                                            value="{{ $classe->id }}">
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <div class="col-md-12">
                                                                        <label class="form-label">Niveaux de
                                                                            etudes</label>
                                                                        <select class="form-select"
                                                                            name="Niveauxdetudes_id" required
                                                                            data-placeholder="Select an option">
                                                                            @foreach ($nvs as $nv)
                                                                                <option value="{{ $nv->id }}"
                                                                                    {{ $nv->id == old('nv', $classe->Niveauxdetudes_id) ? 'selected' : '' }}>
                                                                                    {{ $nv->Nom }}</option>
                                                                            @endforeach
                                                                        </select>
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
                                                <!-- end modal edit -->
                                                <!-- start modal delete -->
                                                <!-- modul delte -->
                                                <div class="modal fade" tabindex="-1" id="delete{{ $classe->id }}">
                                                    <div class="modal-dialog mw-650px">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="{{ URL::route('classe.destroy', 'delete') }}"
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
                                                                            <code>{{ $classe->Nom_Classe }}</code>
                                                                            <input type="hidden" id="id" name="id"
                                                                                value="{{ $classe->id }}">
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

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="kt_modal_new_target">
        <div class="modal-dialog mw-900px">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Repeater-->
                    <form method="POST" action="{{ URL::route('classe.store') }}" class="repeater">
                        @csrf
                        <!--begin::Form group-->

                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Set First Target</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need
                                more info, please check
                                <a href="#" class="fw-bolder link-primary">Project
                                    Guidelines</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <div class="form-group">
                            <div class="sortable" data-repeater-list="List_classes">
                                <div data-repeater-item>
                                    <div class="form-group row mb-5" data-repeater-item>
                                        <div class="col-md-4">
                                            <label class="form-label">Nom de Classe</label>
                                            <input class="form-control" name="Nom_Classe" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Niveaux de etudes</label>
                                            <select class="form-select" name="Niveauxdetudes_id"
                                                data-placeholder="Select an option">
                                                @foreach ($nvs as $nv)
                                                    <option value="{{ $nv->id }}">{{ $nv->Nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="javascript:;" data-repeater-delete
                                                class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                                                <i class="la la-trash-o fs-3"></i>Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="form-group mb-6">
                            <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                <i class="la la-plus"></i>Add
                            </a>
                        </div>
                        <!--end::Form group-->
                        <!--end::Input group-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                    <!--end::Repeater-->

                </div>
            </div>
        </div>
    </div>
    <!--end::Modal -->

      <!-- delete all -->

      <div class="modal fade" tabindex="-1" id="delet_all">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ URL::route('deleteall')}}"
                        method="POST" id="kt_modal_new_target_form"
                        class="form">
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
                                <input type="hidden" id="delete_all_id" name="delete_all_id"
                                    value="">
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
    <!-- end delete all-->




@endsection

@section('scripts')
    <!--- and --->
    @toastr_js

    @toastr_render

    <script>
        $(document).ready( function () {
            $('#kt_datatable_example_5').DataTable();
        } );
    </script>


   <script>
       $(function(){
           $("#checkerButton").click(function(){
               var selected =new Array();
               $("#kt_datatable_example_5 input[type=checkbox]:checked").each(function(){
                selected.push(this.value);
                // alert(selected);
               });

               if(selected.length > 0){
                 $("input[id='delete_all_id']").val(selected);
               }

           });

       });
   </script>

    <script>
        $(document).ready(function() {
            const form = $(".repeater");
            const sortable = $(".sortable").sortable({
                update: function() {
                    console.log(form.serializeArray());
                }
            });

            $(".repeater").repeater({
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(setIndexes) {
                    sortable.on("sortchange", setIndexes);
                }
            });
        });
    </script>

    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>

    <script>

        $('#select_all').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});

        $(function() {
            $("#kt_datatable_example_5").on("click", function() {
                $("#checkerButton").toggle($(this).find("#fakir:checked").length > 1);
            })
        });
    </script>
@endsection
