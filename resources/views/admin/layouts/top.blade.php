<!DOCTYPE html>
{{-- <html lang="ar" dir='rtl'> --}}
<html lang="en" dir='ltr'>

<head>
    <meta charset="utf-8" />
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <meta name="description"
        content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
 --}}

        {{-- <meta property="og:image" content="https://br-ws.com/wazefate/public/front_end_style/images/logo.png"/> --}}
        {{-- <meta property="og:title" content="Smartzone"/>
        <meta property="og:type" content="website" />
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="300">
        <meta property="og:image:height" content="300"> --}}
        {{-- <meta property="og:description" content="Your description."/>   --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="@yield('robot')">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_desc')">
    <meta property="title" content="@yield('meta_title')">
    <meta property="description" content="@yield('meta_desc')">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="og:title" content="@yield('meta_title')">
    <meta name="og:description" content="@yield('meta_desc')" />
    {{-- <meta property="og:image" content="{{ asset('images_default/default_parts.png') }}" /> --}}
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@smartzone" />
    <meta name="twitter:creator" content="@smartzone" />
    {{-- <meta name="twitter:image" content="{{ asset('images_default/default_parts.png') }}" /> --}}
    <meta name="twitter:title" content="@yield('meta_title')">
    <meta name="twitter:description" content="@yield('meta_desc')" />
    <meta property="keywords" content="@yield('meta_keywords')">
    <meta name="author" content="SMART_ZONE">

    {{-- <title> Smartzone | Admin Dashboard</title> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.min.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('dashboard_files/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    {{-- Button CSS --}}
    {{-- <link href="{{ asset('resources/dashboard_files/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" /> --}}


    <!-- No Extra plugin used -->
    {{-- <link href="{{ asset('dashboard_files/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('dashboard_files/assets/plugins/daterangepicker/daterangepicker.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('dashboard_files/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" /> --}}



    <!-- SLEEK CSS LTR (EN): -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('dashboard_files/assets/css/sleek.css') }}" />

    <!-- SLEEK CSS RTL (AR) : -->
    {{-- <link id="sleek-css" rel="stylesheet" href="{{ asset('dashboard_files/assets/css/sleek.rtl.css') }}" /> --}}

    {{--  --}}
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">

    <!-- FAVICON -->
    <link href="{{ asset('dashboard_files/assets/img/favicon.png') }}" rel="shortcut icon" />

    {{-- Sweet Alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous"></script>

    {{-- <!-- Sweet Alert 2 -->
    <script src="{{ asset('dashboard_files/assets/js/sweetalert2.all.min.js') }}"></script> --}}

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('dashboard_files/assets/plugins/nprogress/nprogress.js') }}"></script>
    <!-- L.A.L Custom : -->


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">



    @yield('admin_css')

        {{-- ========================================================== --}}
    {{-- =============== Live Select Search Section =============== --}}
    {{-- ========================================================== --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    {{-- ========================================================== --}}
    {{-- =============== Live Select Search Section =============== --}}
    {{-- ========================================================== --}}

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>
    <div id="toaster"></div>
    <div class="wrapper">
        <!-- Github Link -->
        <a href="https://github.com/tafcoder/sleek-dashboard" target="_blank" class="github-link">
            <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
            </svg>
            <i class="mdi mdi-github-circle"></i>
        </a>
