@extends('layouts.master')
@section('title')
    Home
@endsection


@section('css')
    @toastr_css
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">List
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Etudaints</small>
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
                    {{-- <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <i class="bi bi-diagram-3 fs-2x"></i>
 <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> --}}

                    <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.3"
                                    d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                    fill="black"></path>
                                <path
                                    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">This is an alert</h4>
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                        <!--begin::Close-->
                        <button type="button"
                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                            data-bs-dismiss="alert">
                            <i class="bi bi-x fs-1 text-primary"></i>
                        </button>
                    </div>
                @endif
                <!--begin::Row-->
                <!--begin::Card-->
                <div class="card">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->

                        <div class="card-header border-0 pt-5">
                            <h6 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1 danger"> Liste de Présence </span>
                            </h6>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Click to add a user">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1 danger">Date d'aujourd'hui : <span
                                            class="text-danger fw-bold fs-6 mt-2">{{ date('Y-m-d') }}</span> </span>
                                </h3>
                            </div>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            @csrf
                            <!--begin::Accordion-->
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
                                        <th class="min-w-150px">Nom </th>
                                        <th class="min-w-150px">Section</th>
                                        <th class="min-w-150px">Classes </th>
                                        <th class="min-w-150px">Niveaux de etudes</th>
                                        <th class="min-w-150px">Date de presences </th>
                                        <th class="min-w-140px ">Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @if (isset($Presence))
                                            @foreach ($Presence as $Presences)


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
                                                                    {{ $Presences->Etudiants->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    {{ $Presences->Sections->nom_section ? $Presences->Sections->nom_section : ' aucun sections  ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    {{ $Presences->Classes->Nom_Classe ? $Presences->Classes->Nom_Classe : ' aucun classes  ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    {{ $Presences->niveauxdetudes->Nom ? $Presences->niveauxdetudes->Nom : ' aucun niveauxdetudes  ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">
                                                                    {{ $Presences->presences_date ? $Presences->presences_date : ' aucun niveauxdetudes  ' }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>



                                                        <div class="d-flex justify-content flex-shrink-0">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    value="present"
                                                                    disabled
                                                                    {{ $Presences->presences_status == 1 ? 'checked' : '' }}
                                                                    >

                                                                <span class="badge badge-light-success p-0">present</span>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                  value="absent"
                                                                    disabled
                                                                    {{ $Presences->presences_status == 0 ? 'checked' : '' }}
                                                                    >
                                                                <span class="badge badge-light-danger p-0">
                                                                    absent</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        {{-- @endforeach --}}
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>



@endsection

@section('scripts')
    @toastr_js
    @toastr_render
@endsection
