<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ AppSetting('title') }} - Hospital & Clinic Management Laravel System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage your hospital and clinic operations efficiently with Doctorly, a powerful Laravel-based system for healthcare institutions. Streamline patient records, appointments, billing, and more.">
    <meta name="keywords" content="Doctorly, Hospital Management, Clinic Management, Laravel System, Healthcare Software">
    <meta name="author" content="Themesbrand">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/')."/". AppSetting('favicon') }}">
    @include('layouts.head')
</head>

<body data-sidebar="dark" data-topbar="light" data-layout="vertical">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<!-- Begin page -->

<div id="layout-wrapper">
    @include('layouts.top-hor')
    @include('layouts.sidebar')
    
    {{-- @include('layouts.hor-menu') --}}
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <!-- Start content -->
            <div class="container-fluid">
                @yield('content')
            </div> <!-- content -->
        </div>
        @include('layouts.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('layouts.right-sidebar')
<!-- END Right Sidebar -->

@include('layouts.footer-script')
</body>

</html>
