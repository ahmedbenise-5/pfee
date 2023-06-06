<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <!--begin::Head-->
    <!--begin::Fonts-->
    <!--end::Fonts-->
    <title>@yield('title')</title>
    <!--end::Global Stylesheets Bundle-->
    @yield('css')
<!--end::Head-->
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
