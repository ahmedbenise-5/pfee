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
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Recu de echange</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Navbar-->
            
            <!--begin::Form-->
            <form class="form" action="{{route('RecuDeEchange.update','update')}}" method="POST"> 
                @csrf
                @method('PATCH')
                                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card header-->
                        <div class="card-title fs-3 fw-bolder">Recu de echange  un Etudaint :  <code>{{$RecuDeEchange->etudaint->name}}</code></div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3">Montante</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9">
                                <!--begin::Progress-->
                                <div class="d-flex flex-column">
                                    <input type="number" class="form-control form-control-solid" placeholder="" value="{{$RecuDeEchange->Debit}}" name="montante">
                                   <input type="hidden" name="Etudaint_id" value="{{$RecuDeEchange->Etudaint_id}}">
                                   <input type="hidden" name="id" value="{{$RecuDeEchange->id}}">
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        
                       
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-bold mt-2 mb-3">Description</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9">
                                <textarea name="description" class="form-control form-control-solid" rows="5"> {{$RecuDeEchange->description}}   </textarea>
                         </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                      
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6">
                        {{-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> --}}
                        <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </form>
            <!--end:Form-->
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
