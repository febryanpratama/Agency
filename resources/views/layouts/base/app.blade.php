<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ $title ?? config('app.name') }}</title>
    @endif
    {{-- <title>Dashboard Analytics - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title> --}}
    <link rel="apple-touch-icon" href="{{ asset('') }}admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}admin/app-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('') }}admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/pages/chat-application.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/app-assets/css/pages/dashboard-analytics.css">

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts._partials.app_header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts._partials.app_sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')

    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    @include('layouts._partials.app_footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
        type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('') }}admin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('') }}admin/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('') }}admin/app-assets/js/scripts/pages/dashboard-analytics.js"
        type="text/javascript"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}admin/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
    
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('') }}admin/app-assets/js/scripts/tables/datatables/datatable-styling.js" type="text/javascript"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('') }}admin/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>

    {{-- Dropify --}}
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    {{-- End Dropify --}}
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();

            @if (session('success'))
            swal("Great !", "{{ session('success') }}", "success");
            @endif ()
            @if (session('error'))
            swal("Oh No !", "{{ session('error') }}", "error");
            @endif ()
        });
    </script>

    @yield('scripts')

</body>
<!-- END: Body-->

</html>