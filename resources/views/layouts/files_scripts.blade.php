	{{-- <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{URL::asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{URL::asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <!--end::Page Vendors Javgit ascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{URL::asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{URL::asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{URL::asset('assets/js/custom/modals/create-app.js')}}"></script>
    <script src="{{URL::asset('assets/js/custom/modals/upgrade-plan.js')}}"></script> --}}



    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/modals/create-app.js')}}"></script>
    <script src="{{asset('assets/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>

    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui-sortable@1.0.0/jquery-ui.min.js"></script>
    <script  src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!--end::Page Custom Javascript-->

    <script>
        $(document).ready( function () {
            $('#kt_datatable_example_5').DataTable();
        } );
    </script>


    @yield('scripts')
