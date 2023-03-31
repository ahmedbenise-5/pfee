@extends('layouts.master')
@section('title')
    Home
@endsection


@section('css')
    @toastr_css
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--- data table -->
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
                @if (count($errors) > 0)
                <div class = "alert alert-danger">
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
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger w-50 m-2" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <P>{{ $error }}<p>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <!--begin::Header-->

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Members Statistics</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Click to add a user">
                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
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
                                            <th class="w-25px">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                                </div>
                                            </th>
                                            <th class="min-w-150px">Nom</th>
                                            <th class="min-w-150px">Description</th>
                                            <th class="min-w-150px">date cree </th>
                                            <th class="min-w-140px ">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @if (isset($niveauxdetudes))
                                            @foreach ($niveauxdetudes as $niveauxdetude)
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
                                                                    {{  $niveauxdetude->Nom ? $niveauxdetude->Nom : ' aucun Classe ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                            {{  $niveauxdetude->Description ? $niveauxdetude->Description : ' aucun Description ' }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                            {{  $niveauxdetude->created_at->format('d-m-Y')? $niveauxdetude->created_at->format('d-m-Y') : ' aucun Description ' }}

                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content flex-shrink-0">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#update{{$niveauxdetude->id}}"
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
                                                            <a data-bs-toggle="modal" data-bs-target="#delete{{$niveauxdetude->id}}"
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

                                                <!-- modul edit -->
                                                <div class="modal fade" tabindex="-1" id="update{{$niveauxdetude->id}}">
                                                    <div class="modal-dialog mw-650px">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="{{URL::route('niveauxdetudes.update','update')}}" method="POST"
                                                                    id="kt_modal_new_target_form" class="form"
                                                                    >
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
                                                                        <input type="text" name='Nom' value="{{$niveauxdetude->Nom}}"
                                                                            class="form-control form-control-solid"
                                                                            placeholder="Enter Target Title"
                                                                            name="target_title" />
                                                                            <input type="hidden" id="id" name="id" value="{{$niveauxdetude->id}}">
                                                                    </div>
                                                                    <!--end::Input group-->
                                                                    <!--begin::Input group-->
                                                                    <div class="d-flex flex-column mb-8">
                                                                        <label class="fs-6 fw-bold mb-2">Target
                                                                            Details</label>
                                                                        <textarea class="form-control form-control-solid"
                                                                            rows="3" name="Description"
                                                                            placeholder="Type Target Details">{{$niveauxdetude->Description}}</textarea>
                                                                    </div>
                                                                    <!--end::Input group-->


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
                                                <!-- modul delte -->
                                                <div class="modal fade" tabindex="-1" id="delete{{$niveauxdetude->id}}">
                                                    <div class="modal-dialog mw-650px">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="{{URL::route('niveauxdetudes.destroy','delete')}}" method="POST"
                                                                    id="kt_modal_new_target_form" class="form"
                                                                    >
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
                                                                            <span class="required">voulez-vous supprimer</span>
                                                                                <code>{{$niveauxdetude->Nom}}</code>
                                                                                <input type="hidden" id="id" name="id" value="{{$niveauxdetude->id}}">
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
                                            @endforeach
                                        @endif
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
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('niveauxdetudes.store') }}" method="POST" id="kt_modal_new_target_form"
                        class="form" action="#">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Set First Target</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need more info, please check
                                <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Target Title</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" name='Nom' class="form-control form-control-solid"
                                placeholder="Enter Target Title" name="target_title" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-bold mb-2">Target Details</label>
                            <textarea class="form-control form-control-solid" rows="3" name="Description"
                                placeholder="Type Target Details"></textarea>
                        </div>
                        <!--end::Input group-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal -->


<!--- test     <form class="repeater">
                        <div class="sortable" data-repeater-list="group-a">
                          <div class="item" data-repeater-item>
                            <input type="text" name="text-input" value="A"/>
                            <input data-repeater-delete type="button" value="Delete"/>
                          </div>
                          <div class="item" data-repeater-item>
                            <input type="text" name="text-input" value="B"/>
                            <input data-repeater-delete type="button" value="Delete"/>
                          </div>
                        </div>
                        <input data-repeater-create type="button" value="Add"/>
                    </form>

                -->


@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ URL::asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ URL::asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ URL::asset('assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script  src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

   @toastr_js
    @toastr_render

    <script>
            $(document).ready( function () {
            $('#kt_datatable_example_5').DataTable();
        } );
    </script>
    </script>

@endsection
