@extends('layouts.master')
@section('title')
    Home
@endsection


@section('css')
    @toastr_css
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        input[type="file"] {
            opacity: 0;
        }

        .ms-4 {
            margin-left: -798px !important;
        }
    </style>
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
            <div id="kt_content_container" class="container-fluid">
                @if (count($errors) > 0)
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

                <form action="{{ route('parentes.store') }}" enctype="multipart/form-data" method="POST"
                    class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                    @csrf
                    <!--begin::Aside column-->

                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_ecommerce_add_product_general">General</a>
                            </li>
                            <!--end:::Tab item-->
                            <!--begin:::Tab item-->

                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>les info </h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <!--end::Description-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">

                                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Nom et Prenom</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control mb-2" name="name"
                                                        value="">
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the product tax class.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>

                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Email</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" class="form-control mb-2" name="Email"
                                                        value="">
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the product tax class.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Password</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="password" name="Password" class="form-control mb-2"
                                                        value="">
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the product VAT about.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Input group-->
                                            <div class="d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Date naissance</label>
                                                    <!--end::Label-->

                                                    <input type="date" name="date_naissance" class="form-control mb-2"
                                                        value="">
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the product tax class.</div>
                                                    <!--end::Description-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label required">Annee Academique</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select" name="anne_acd" data-placeholder="Select an option">
                                                        <option value="1">2023</option>
                                                        <option value="2">2024</option>
                                                        <option value="3">2025</option>
                                                </select>
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Set the product VAT about.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <div class="row g-9 mb-12">
                                                <!--begin::Col-->
                                                <div class="col-md fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Nom Praent</label>
                                                    <select class="form-select" name="nationalite_id"
                                                        data-control="select2" data-placeholder="Select an option">

                                                        @foreach ($list_parentes as $list_parente)
                                                            <option value="{{ $list_parente->id }}">{{ $list_parente->NomPraent }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">nationalité</label>
                                                    <select class="form-select" name="nationalite_id"
                                                        data-control="select2" data-placeholder="Select an option">

                                                        @foreach ($list_nationalities as $list_nationalitie)
                                                            <option value="{{ $list_nationalitie->id }}">{{ $list_nationalitie->Nom }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Religion</label>
                                                    <select class="form-select " name="religion_id"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-hide-search="flase">
                                                        @foreach ($list_religions as $list_religion)
                                                            <option value="{{ $list_religion->id }}">{{ $list_religion->Nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Niveauxdetudes</label>
                                                    <select class="form-select" name="id_niveauxdetudes"
                                                        data-control="select2" data-placeholder="Select an option">

                                                        @foreach ($list_niveauxdetudes as $list_niveauxdetude)
                                                            <option value="{{ $list_niveauxdetude->id }}">{{ $list_niveauxdetude->Nom }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Niveauxdetudes</label>
                                                    <select class="form-select" name="nationalite_id"
                                                        data-control="select2" data-placeholder="Select an option">

                                                        @foreach ($list_niveauxdetudes as $list_niveauxdetude)
                                                           
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col fv-row">
                                                    <label class="required fs-6 fw-bold mb-2">Classe</label>
                                                    <select class="form-select " name="classes_id"
                                                        data-control="select2" data-placeholder="Select an option"
                                                        data-hide-search="flase">
                                                        @foreach ($list_classes as $list_classe)
                                                          
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                                
                                            </div>

                                            <div class="d-flex flex-column mb-8 mt-8 fv-row fv-plugins-icon-container">
                                                <label class="fs-6 fw-bold mb-2 required">Adresse</label>
                                                <textarea class="form-control form-control-solid" rows="4" name="adresse"
                                                    placeholder="Type your ticket description" style="height: 137px;"></textarea>
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Media</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0" name='upld'>
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone dz-clickable" name='upld'
                                                    id="kt_dropzonejs_example_1">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x">
                                                            <input type="file" name="file">
                                                        </i>

                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here
                                                                or click to upload.</h3>
                                                            <span type="file" class="fs-7 fw-bold text-gray-400">Upload
                                                                up to 10 files</span>

                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product media gallery.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card header-->

                                    </div>
                                </div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <input type="reset" id="kt_ecommerce_add_product_cancel" value="Reset"
                                class="btn btn-light me-5">
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Ajouter</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                    <div></div>
                </form>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>



@endsection

@section('scripts')
    @toastr_js
    @toastr_render
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <script>
        $(document).ready(function () {
            $('select[name="id_niveauxdetudes"]').on('change', function () {
                var id_niveauxdetudes = $(this).val();
                // alert(Niveauxdetudes_id);
                if (id_niveauxdetudes) {
                    $.ajax({
                        url: "{{ URL::to('getclasses') }}/" +id_niveauxdetudes,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classes_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classes_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
</script> 

    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
