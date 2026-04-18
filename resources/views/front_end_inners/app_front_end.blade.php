<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <?php
    $treatments = App\Models\Treatment::latest()->take(5)->get();
    $contacts = App\Models\ContactUs::first();
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E83HWT4Z13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-E83HWT4Z13');
    </script>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('page_title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="@yield('robot')">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('front_end_style/assets/img/favicon.png') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@dranasabushamleh" />
    <meta name="twitter:creator" content="@dranasabushamleh" />
    <meta name="twitter:image" content="{{ asset('front_end_style/assets/img/favicon.png') }}" />
    <meta name="twitter:title" content="@yield('meta_title')">
    <meta name="twitter:description" content="@yield('meta_desc')" />
    <meta name="author" content="dranasabushamleh">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_desc')">
    <meta property="og:keywords" content="@yield('meta_keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('front_end_style/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('front_end_style/assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    <link href="{{ asset('front_end_style/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end_style/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end_style/assets/css/animate.min.css') }}" rel="stylesheet">
    <!--  FancyBox CSS  -->
    <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/jquery.fancybox.min.css') }}">

    <!-- Fontawesome CSS -->
    <link href="{{ asset('front_end_style/assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <!-- box icon css -->
    <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/boxicons.min.css') }}">
    <!-- slider CSS -->
    <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/slick-theme.css') }}">


    <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/slick.css') }}">
    <!--  Style CSS  -->


    <link rel="icon" href="{{ asset('front_end_style/assets/img/favicon.png') }}" type="image/gif">

    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- search console -->
    <meta name="google-site-verification" content="cHvVWecmNPDa8dEPTPTUw-etBdtLKKLj4GYnAX-83Bc" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N5KVRS7');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Include Files -->
    @if (Config::get('app.locale') == 'en')
        @include('front_end_inners.includes.en_include')
        <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/appointment-booking.css') }}">
    @else
        @include('front_end_inners.includes.ar_include')
        <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/style-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/appointment-booking-rtl.css') }}">
    @endif
    <!-- End Include Files -->



</head>

<body class="style-2">

    <!-- h1/h1 hidden Section -->
    <h1 class="hidden-h1">@yield('h1_val')</h1>
    <h2 class="hidden-h2">@yield('h2_val')</h2>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KVRS7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Appointment Section -->
    <div class="consult-section show" id="consultSection">
        <div class="consult-content">
            <p class="consult-text">
                {{ __('front_end.book_text') }}
            </p>
            <a class="appointment-button hover-btn3" href="#" onclick="openBookingPopup(event)">
                {{ __('front_end.book_now') }}
            </a>
        </div>
        <span class="close-button" onclick="closeConsultSection()">×</span>
    </div>

    <!-- Social Icons Section -->
    <div class="icon-bar">
        <a href="#" class="calendar" onclick="openBookingPopup(event)"><i class="fas fa-calendar-alt"></i></a>
        <a href="https://wa.me/962790098884" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://web.facebook.com/ENTDoctorJordan" class="facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/dr.anasabushamleh/" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
        <!-- Calendar Icon for Booking -->
        {{-- <a href="#" class="calendar" title="Book Appointment" onclick="openBookingPopup(event)">
            <i class="fas fa-calendar-alt"></i>
        </a> --}}
    </div>


    <!-- top bar Section -->
    <div class="top-bar2">
        <div class="container-md container-fluid">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-between gap-3">
                    <div class="top-bar-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <g clip-path="url(#clip0_1038_9)">
                                <path
                                    d="M12.6448 9.91122C12.3172 9.57015 11.9221 9.3878 11.5034 9.3878C11.088 9.3878 10.6895 9.56678 10.3485 9.90784L9.28136 10.9716C9.19356 10.9243 9.10576 10.8804 9.02133 10.8365C8.89977 10.7757 8.78495 10.7183 8.68702 10.6575C7.68746 10.0227 6.77907 9.19532 5.90782 8.12484C5.48571 7.59128 5.20205 7.14215 4.99606 6.68627C5.27296 6.433 5.52961 6.1696 5.7795 5.91634C5.87406 5.82178 5.96861 5.72385 6.06316 5.6293C6.77231 4.92015 6.77231 4.00163 6.06316 3.29248L5.14127 2.37058C5.03658 2.2659 4.92852 2.15783 4.82721 2.04977C4.6246 1.84041 4.41185 1.62428 4.19235 1.42167C3.86479 1.09748 3.47307 0.925262 3.06109 0.925262C2.64911 0.925262 2.25063 1.09748 1.91294 1.42167C1.90956 1.42505 1.90956 1.42505 1.90619 1.42842L0.758037 2.5867C0.325793 3.01895 0.0792786 3.54575 0.025248 4.15697C-0.0557978 5.14302 0.234616 6.06154 0.457492 6.66263C1.00455 8.13834 1.82176 9.50599 3.04083 10.9716C4.51991 12.7377 6.29955 14.1324 8.33245 15.115C9.10913 15.4831 10.1458 15.9187 11.3041 15.993C11.375 15.9964 11.4493 15.9998 11.5169 15.9998C12.2969 15.9998 12.9521 15.7195 13.4653 15.1623C13.4687 15.1556 13.4755 15.1522 13.4789 15.1454C13.6545 14.9327 13.8571 14.7402 14.0698 14.5342C14.215 14.3958 14.3636 14.2506 14.5088 14.0986C14.8431 13.7508 15.0187 13.3455 15.0187 12.9302C15.0187 12.5114 14.8397 12.1096 14.4987 11.7719L12.6448 9.91122ZM13.8537 13.4671C13.8503 13.4671 13.8503 13.4705 13.8537 13.4671C13.722 13.6089 13.5869 13.7373 13.4417 13.8791C13.2222 14.0885 12.9993 14.308 12.79 14.5545C12.4489 14.9192 12.047 15.0914 11.5202 15.0914C11.4696 15.0914 11.4156 15.0914 11.3649 15.088C10.362 15.0239 9.42994 14.6321 8.73092 14.2978C6.81959 13.3726 5.14127 12.0589 3.7466 10.3941C2.59508 9.00621 1.82514 7.72298 1.31523 6.3452C1.00117 5.50435 0.88636 4.84923 0.937014 4.23126C0.970783 3.83616 1.12274 3.5086 1.40303 3.22832L2.55455 2.07679C2.72002 1.92145 2.89562 1.83703 3.06784 1.83703C3.28059 1.83703 3.45281 1.96535 3.56087 2.07341C3.56425 2.07679 3.56763 2.08017 3.571 2.08354C3.77699 2.27603 3.97286 2.47526 4.17885 2.68801C4.28353 2.79607 4.39159 2.90413 4.49965 3.01557L5.42155 3.93747C5.7795 4.29542 5.7795 4.62636 5.42155 4.98431C5.32362 5.08224 5.22906 5.18017 5.13113 5.27472C4.84747 5.56514 4.57732 5.83529 4.28353 6.09869C4.27678 6.10544 4.27002 6.10882 4.26665 6.11557C3.97623 6.40599 4.03026 6.68965 4.09105 6.88213C4.09442 6.89226 4.0978 6.90239 4.10118 6.91252C4.34094 7.49335 4.67863 8.04041 5.19192 8.69216L5.1953 8.69553C6.12732 9.84368 7.11 10.7386 8.19399 11.4241C8.33245 11.5119 8.47427 11.5828 8.60935 11.6503C8.73092 11.7111 8.84573 11.7685 8.94367 11.8293C8.95717 11.8361 8.97068 11.8462 8.98419 11.8529C9.099 11.9104 9.20706 11.9374 9.3185 11.9374C9.59879 11.9374 9.77439 11.7618 9.83179 11.7044L10.9867 10.5495C11.1015 10.4346 11.2839 10.2962 11.4966 10.2962C11.706 10.2962 11.8782 10.4279 11.9829 10.5427C11.9863 10.5461 11.9863 10.5461 11.9896 10.5495L13.8503 12.4101C14.1981 12.7546 14.1981 13.1092 13.8537 13.4671Z" />
                                <path
                                    d="M8.64606 3.80613C9.53081 3.95471 10.3345 4.37345 10.9761 5.01506C11.6177 5.65667 12.0331 6.46038 12.1851 7.34513C12.2222 7.568 12.4147 7.72334 12.6342 7.72334C12.6612 7.72334 12.6848 7.71996 12.7119 7.71659C12.9617 7.67606 13.1272 7.43968 13.0867 7.18979C12.9043 6.11931 12.3978 5.14338 11.6245 4.37007C10.8512 3.59676 9.87526 3.09022 8.80478 2.90787C8.55489 2.86734 8.32188 3.03281 8.27798 3.27933C8.23408 3.52584 8.39617 3.7656 8.64606 3.80613Z" />
                                <path
                                    d="M15.9811 7.05794C15.6806 5.29519 14.8499 3.69116 13.5734 2.41469C12.2969 1.13821 10.6929 0.307495 8.93016 0.00695018C8.68364 -0.0369496 8.45063 0.131896 8.40673 0.37841C8.36621 0.628301 8.53168 0.861308 8.78157 0.905208C10.3552 1.17198 11.7904 1.91828 12.9318 3.0563C14.0732 4.19769 14.8161 5.63288 15.0829 7.20652C15.12 7.4294 15.3125 7.58473 15.532 7.58473C15.559 7.58473 15.5827 7.58136 15.6097 7.57798C15.8562 7.54083 16.025 7.30445 15.9811 7.05794Z" />
                            </g>
                        </svg>
                        <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }} | {{ $contacts->phone2 }}</a>
                    </div>
                    <p> {{ __('front_end.top_nav_text') }} </p>
                    <div class="social-area">
                        <ul>
                            @if (Config::get('app.locale') == 'en')
                                <li>
                                    <a style="font-family: 'El Messiri', sans-serif; color:#fff" class="nav-link"
                                        href="{{ '/ar' }}">العربية</a>
                                </li>
                            @else
                                <li>
                                    <a style="font-family: 'Jost', sans-serif; color:#fff" class="nav-link"
                                        href="{{ '/en' }}">English</a>
                                </li>
                            @endif


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start header section -->
    <header class="header-area style-2">
        <div class="container-md position-relative  d-flex flex-nowrap align-items-center justify-content-between">
            <div class="header-logo d-lg-none d-flex">
                @if (Config::get('app.locale') == 'en')
                    <a href="{{ route('welcome') }}">
                        <img alt="الدكتور أنس ابوشملة - DR.Aans Abu-Shamleh"
                            src="{{ asset('front_end_style/assets/img/home1/logo.png') }}" class="img-fluid">
                    </a>
                @else
                    <a href="{{ route('welcome') }}">
                        <img alt="الدكتور أنس ابوشملة - DR.Aans Abu-Shamleh"
                            src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}" class="img-fluid">
                    </a>
                @endif
            </div>
            <div class="company-logo d-lg-flex d-none">
                @if (Config::get('app.locale') == 'en')
                    <a href="{{ route('welcome') }}">
                        <img alt="أفضل دكتور أنف وأذن وحنجرة في الأردن -   Best Ent Doctor in jordan"
                            src="{{ asset('front_end_style/assets/img/home1/logo.png') }}">
                    </a>
                @else
                    <a href="{{ route('welcome') }}">
                        <img alt="أفضل دكتور أنف وأذن وحنجرة في الأردن -   Best Ent Doctor in jordan"
                            src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}">
                    </a>
                @endif
            </div>
            <div class="main-menu">
                <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap">
                        @if (Config::get('app.locale') == 'en')
                            <a href="{{ route('welcome') }}">
                                <img alt=" الدكتور أنس أبوشملة دكتور أنف وأذن وحنجرة عمان الأردن  - Dr.Anas Abu Shamleh, ENT Doctor, Amman, Jordan"
                                    src="{{ asset('front_end_style/assets/img/home1/logo.png') }}">
                            </a>
                        @else
                            <a href="{{ route('welcome') }}">
                                <img alt=" الدكتور أنس أبوشملة دكتور أنف وأذن وحنجرة عمان الأردن  - Dr.Anas Abu Shamleh, ENT Doctor, Amman, Jordan"
                                    src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}">
                            </a>
                        @endif
                    </div>
                </div>
                <ul class="menu-list">
                    <li>
                        <a href="{{ route('welcome') }}" class="drop-down">{{ __('front_end.nav_home') }}</a>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#" class="drop-down"> {{ __('front_end.nav_AboutUs') }}</a><i
                            class="bi bi-plus dropdown-icon"></i>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('dranas') }}">{{ __('front_end.nav_Dr_Anas') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('aboutClinic') }}">{{ __('front_end.nav_Clinic') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('insurance') }}">{{ __('front_end.nav_Certified') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('treatments') }}" class="drop-down">{{ __('front_end.nav_Treatments') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs') }}">{{ __('front_end.nav_Blogs') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}">{{ __('front_end.nav_Gallery') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('ContactUs') }}">{{ __('front_end.nav_ContactUs') }}</a>
                    </li>
                    <li>
                        <a href="#" class="d-block d-md-none" onclick="openBookingPopup(event)">
                            {{ __('front_end.book_your_appointment_now') }}
                        </a>
                    </li>

                </ul>
                <div class="d-lg-none d-block">

                    <form class="mobile-menu-form">
                        <div class="hotline">
                            <div class="hotline-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M14.2333 11.1504C13.8642 10.7667 13.4191 10.5615 12.9473 10.5615C12.4794 10.5615 12.0304 10.7629 11.6462 11.1466L10.4439 12.3433C10.345 12.2901 10.2461 12.2407 10.151 12.1913C10.014 12.1229 9.88467 12.0583 9.77433 11.9899C8.64819 11.2757 7.62476 10.345 6.64319 9.14067C6.16762 8.54043 5.84804 8.03516 5.61596 7.52229C5.92793 7.23736 6.21708 6.94104 6.49861 6.65611C6.60514 6.54974 6.71167 6.43957 6.8182 6.33319C7.61715 5.5354 7.61715 4.50207 6.8182 3.70427L5.77955 2.66714C5.66161 2.54937 5.53987 2.4278 5.42573 2.30623C5.19746 2.07069 4.95777 1.82755 4.71047 1.59961C4.34143 1.2349 3.9001 1.04115 3.43595 1.04115C2.97179 1.04115 2.52286 1.2349 2.1424 1.59961L2.13479 1.60721L0.841243 2.91027C0.35426 3.39655 0.076528 3.9892 0.0156552 4.67682C-0.0756541 5.78614 0.251537 6.81947 0.502638 7.4957C1.11898 9.15587 2.03968 10.6945 3.41312 12.3433C5.07952 14.3301 7.08452 15.8991 9.37486 17.0047C10.2499 17.4187 11.4179 17.9088 12.7229 17.9924C12.8028 17.9962 12.8865 18 12.9626 18C13.8414 18 14.5795 17.6847 15.1578 17.0578C15.1616 17.0502 15.1692 17.0464 15.173 17.0388C15.3708 16.7995 15.5991 16.583 15.8388 16.3512C16.0024 16.1955 16.1698 16.0321 16.3334 15.8611C16.71 15.4698 16.9079 15.014 16.9079 14.5467C16.9079 14.0756 16.7062 13.6235 16.322 13.2436L14.2333 11.1504ZM15.5953 15.1507C15.5915 15.1545 15.5915 15.1507 15.5953 15.1507C15.4469 15.3103 15.2947 15.4547 15.1311 15.6142C14.8838 15.8498 14.6327 16.0967 14.3969 16.374C14.0126 16.7843 13.5599 16.9781 12.9664 16.9781C12.9093 16.9781 12.8484 16.9781 12.7913 16.9743C11.6614 16.9021 10.6113 16.4614 9.82379 16.0853C7.67042 15.0444 5.77955 13.5665 4.20827 11.6936C2.91092 10.1322 2.04348 8.68859 1.46899 7.13859C1.11517 6.19263 0.985816 5.45562 1.04288 4.7604C1.08093 4.31591 1.25214 3.94741 1.56791 3.63209L2.86527 2.33662C3.05169 2.16187 3.24953 2.06689 3.44356 2.06689C3.68324 2.06689 3.87728 2.21125 3.99902 2.33282L4.01044 2.34422C4.24251 2.56076 4.46318 2.78491 4.69526 3.02424C4.8132 3.14581 4.93494 3.26738 5.05669 3.39275L6.09533 4.42988C6.49861 4.83258 6.49861 5.20488 6.09533 5.60758C5.985 5.71775 5.87847 5.82792 5.76814 5.9343C5.44856 6.26101 5.14419 6.56494 4.8132 6.86126C4.80559 6.86886 4.79798 6.87266 4.79417 6.88025C4.46698 7.20697 4.52786 7.52609 4.59634 7.74263L4.60775 7.77682C4.87787 8.43026 5.25833 9.0457 5.83662 9.77891L5.84043 9.78271C6.89048 11.0744 7.99761 12.0811 9.21887 12.8523C9.37486 12.9511 9.53465 13.0309 9.68683 13.1069C9.82379 13.1752 9.95315 13.2398 10.0635 13.3082C10.0787 13.3158 10.0939 13.3272 10.1091 13.3348C10.2385 13.3994 10.3602 13.4298 10.4858 13.4298C10.8016 13.4298 10.9994 13.2322 11.0641 13.1676L12.3652 11.8684C12.4946 11.7392 12.7 11.5834 12.9397 11.5834C13.1756 11.5834 13.3696 11.7316 13.4876 11.8608L13.4952 11.8684L15.5915 13.9616C15.9834 14.3491 15.9834 14.748 15.5953 15.1507ZM9.72868 4.28172C10.7255 4.44888 11.631 4.91996 12.3538 5.64177C13.0767 6.36359 13.5446 7.26775 13.7159 8.2631C13.7577 8.51383 13.9746 8.68859 14.2219 8.68859C14.2523 8.68859 14.2789 8.68479 14.3094 8.68099C14.5909 8.6354 14.7773 8.36947 14.7317 8.08834C14.5262 6.88405 13.9555 5.78614 13.0843 4.91616C12.2131 4.04618 11.1135 3.47633 9.90749 3.27118C9.62596 3.22559 9.36344 3.41175 9.31398 3.68907C9.26452 3.9664 9.44714 4.23613 9.72868 4.28172ZM17.9922 7.94018C17.6536 5.95709 16.7176 4.15255 15.2795 2.71652C13.8414 1.28049 12.0342 0.345932 10.0483 0.00781895C9.77053 -0.0415684 9.50802 0.148383 9.45856 0.425712C9.4129 0.70684 9.59932 0.968972 9.88086 1.01836C11.6538 1.31848 13.2707 2.15807 14.5567 3.43834C15.8426 4.72241 16.6796 6.33699 16.9802 8.10734C17.022 8.35808 17.2389 8.53283 17.4862 8.53283C17.5166 8.53283 17.5432 8.52903 17.5737 8.52523C17.8514 8.48344 18.0416 8.21751 17.9922 7.94018Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="hotline-info">
                                <span>{{ __('front_end.footer_ContactUs') }}</span>
                                <h6><a
                                        href="tel:{{ __('front_end.top_nav_phone') }}">{{ __('front_end.top_nav_phone') }}</a>
                                </h6>
                            </div>
                        </div>

                        <div class="email pt-20 d-flex align-items-center">
                            <div class="email-icon">
                                <!-- Language (Globe) SVG Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-6.468 4.75c.942-.25 2.45-.412 4.158-.46C6.075 3.108 7.04 1.527 8 1.018c.96.51 1.925 2.09 2.31 3.272 1.707.048 3.216.21 4.158.46A7 7 0 0 0 8 1zm0 13c-2.163 0-4.033-.822-5.402-2.137.976-.522 2.628-.884 4.61-1.033.261 1.01.69 2.01 1.272 2.772A6.96 6.96 0 0 1 8 15zm0-13c-.96-.51-1.925-2.09-2.31-3.272-1.707-.048-3.216-.21-4.158-.46A7 7 0 0 0 8 1zM4.68 9.678C4.527 9.097 4.336 8.517 4.11 7.934A28.92 28.92 0 0 0 8 7.932c1.41 0 2.76.04 4.11.002A28.92 28.92 0 0 0 11.89 9.69a28.964 28.964 0 0 0-3.11.024zm-2.304 0c.177-.476.378-.945.601-1.406C2.528 8.917 1.573 8.462 1 8.06a7 7 0 0 0 1.375 3.368zM10.396 9.678c.253-.655.495-1.312.72-1.968A28.92 28.92 0 0 0 8 9.68a28.92 28.92 0 0 0-3.11-.024c.225.656.467 1.313.72 1.968zm3.6-1.406a7 7 0 0 0 1.376-3.368c-.573.402-1.528.857-2.76 1.17.224.46.425.93.601 1.406zM10.585 9.68a28.965 28.965 0 0 1 1.508-3.746c-.637-.137-1.434-.22-2.309-.24.278.638.496 1.3.657 1.978a29.009 29.009 0 0 1 1.51 3.742z" />
                                </svg>
                            </div>
                            <div class="email-info">
                                @if (Config::get('app.locale') == 'en')
                                    <h6>
                                        <a style="font-family: 'El Messiri', sans-serif; color:#125258"
                                            href="{{ '/ar' }}">العربية</a>
                                    </h6>
                                @else
                                    <h6>
                                        <a style="font-family: 'Jost', sans-serif; color:#125258"
                                            href="{{ '/en' }}">English</a>
                                    </h6>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="nav-right position-inherit d-flex jsutify-content-end align-items-center">
                <div class="search-area">
                    <div class="search-btn">
                        <a style="font-family: 'El Messiri', sans-serif; color:#125258" class="nav-link"
                            href="#" onclick="openBookingPopup(event)">
                            {{ __('front_end.book_your_appointment_now') }}
                        </a>
                    </div>

                    <div id="customBookingModal" class="booking-modal-overlay">
                        <div class="booking-modal-card">
                            <button type="button" class="booking-close" id="closeBookingPopup">&times;</button>

                            <div class="booking-header">
                                <h2 class="booking-title">{{ __('front_end.booking_modal_title') }}</h2>
                            </div>

                            <div class="booking-body">
                                <!-- Step 1: Date -->
                                <div id="stepDateTime" class="booking-step">
                                    <h3 class="booking-step-title">{{ __('front_end.booking_select_date_time') }}</h3>

                                    <div class="booking-content-layout" id="bookingContentLayout">
                                        <div class="booking-calendar-side booking-calendar-side-full">
                                            <div class="booking-month-nav">
                                                <button type="button" class="month-arrow month-arrow-left"
                                                    id="calPrevMonth" aria-label="Previous month">
                                                    <span>&#8249;</span>
                                                </button>

                                                <div class="month-label" id="calMonthLabel">March 2026</div>

                                                <button type="button" class="month-arrow month-arrow-right"
                                                    id="calNextMonth" aria-label="Next month">
                                                    <span>&#8250;</span>
                                                </button>
                                            </div>

                                            <div class="booking-calendar" id="calendlyCalendar"></div>

                                            <div class="booking-timezone-title">
                                                {{ __('front_end.booking_time_zone') }}
                                            </div>

                                            <div class="booking-timezone">
                                                <span class="booking-globe">🌐</span>
                                                <span id="calTimeZone">
                                                    {{ __('front_end.booking_jordan_time') }}
                                                    (<span id="jordanTime"></span>)
                                                </span>
                                                <span class="booking-timezone-arrow">▼</span>
                                            </div>
                                        </div>

                                        <!-- Desktop Time Slots -->
                                        <div class="booking-times-side" id="selectedDateWrap">
                                            <div class="selected-date-heading" id="selectedDateTitleDesktop">
                                                {{ __('front_end.booking_select_date') }}
                                            </div>
                                            <div id="timeSlotsContainerDesktop" class="time-slots-list"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2: Time (Mobile only) -->
                                <div id="stepSelectTime" class="booking-step" style="display:none;">
                                    <div class="booking-back-btn" id="backToCalendar">
                                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ __('front_end.booking_back') }}</span>
                                    </div>

                                    <h3 class="booking-step-title">{{ __('front_end.booking_select_date_time') }}</h3>

                                    <div class="selected-date-heading" id="selectedDateTitle">
                                        {{ __('front_end.booking_select_date') }}
                                    </div>

                                    <div id="timeSlotsContainer" class="time-slots-list"></div>
                                </div>

                                <!-- Step 3: Details -->
                                <div id="stepEnterDetails" class="booking-step" style="display:none;">
                                    <div class="booking-back-btn" id="backToDateTime">
                                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ __('front_end.booking_back') }}</span>
                                    </div>

                                    <h3 class="booking-step-title">{{ __('front_end.booking_enter_details') }}</h3>

                                    <div class="booking-summary">
                                        <div class="summary-info">
                                            <div class="summary-datetime" id="summaryDateTime"></div>
                                        </div>
                                    </div>

                                    <form id="bookingDetailsForm" class="booking-details-form">
                                        <div class="form-row-grid">
                                            <div class="form-group">
                                                <input type="text" name="website" value=""
                                                    autocomplete="off" tabindex="-1"
                                                    style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;">
                                            </div>
                                        </div>

                                        <div class="form-row-grid">
                                            <div class="form-group">
                                                <label for="fullName">
                                                    {{ __('front_end.booking_name') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" id="fullName" name="full_name"
                                                    class="form-control"
                                                    placeholder="{{ __('front_end.booking_name_placeholder') }}"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">
                                                    {{ __('front_end.booking_email') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control"
                                                    placeholder="{{ __('front_end.booking_email_placeholder') }}"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-row-grid">
                                            <div class="form-group">
                                                <label for="phone">{{ __('front_end.booking_phone') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="tel" id="phone" name="phone"
                                                    class="form-control"
                                                    placeholder="{{ __('front_end.booking_phone_placeholder') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="appointmentType">
                                                    {{ __('front_end.booking_appointment_type') }}
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="custom-select-wrapper">
                                                    <select id="appointmentType" name="appointment_type_id"
                                                        class="form-control" required>

                                                        @if (isset($appointmentTypes))
                                                            @foreach ($appointmentTypes as $type)
                                                                <option value="{{ $type->id }}">
                                                                    {{ app()->getLocale() == 'ar' ? $type->name_ar : $type->name_en }}
                                                                    @if ($type->duration)
                                                                        ({{ $type->duration }} min)
                                                                    @endif
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>
                                                {{ __('front_end.booking_location') }}
                                                <span class="required">*</span>
                                            </label>

                                            <div class="location-display">
                                                <svg width="20" height="20" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>{{ __('front_end.booking_location_address') }}</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="notes">{{ __('front_end.booking_notes') }}</label>
                                            <textarea id="notes" name="notes" class="form-control" rows="4"
                                                placeholder="{{ __('front_end.booking_notes_placeholder') }}"></textarea>
                                        </div>

                                        <button type="submit" class="btn-schedule-event">
                                            {{ __('front_end.booking_schedule_button') }}
                                        </button>

                                        <div id="formError" class="form-error" style="display:none;"></div>
                                        <div id="formSuccess" class="form-success" style="display:none;"></div>
                                    </form>
                                </div>

                                <!-- Step 4: Success -->
                                <div id="stepSuccess" class="booking-step" style="display:none;">
                                    <div class="success-container">
                                        <div class="success-icon">
                                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                                <circle cx="40" cy="40" r="38" fill="#d4ebec"
                                                    stroke="#125258" stroke-width="2" />
                                                <path d="M25 40L35 50L55 30" stroke="#125258" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>

                                        <h2 class="success-title">{{ __('front_end.booking_confirmed_title') }}</h2>
                                        <p class="success-message">{{ __('front_end.booking_confirmed_message') }}</p>

                                        <div class="success-details">
                                            <div class="success-detail-row">
                                                <span
                                                    class="detail-label">{{ __('front_end.booking_reference') }}</span>
                                                <span class="detail-value" id="successBookingRef">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span
                                                    class="detail-label">{{ __('front_end.booking_date_time') }}</span>
                                                <span class="detail-value" id="successDateTime">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span class="detail-label">{{ __('front_end.booking_name') }}:</span>
                                                <span class="detail-value" id="successName">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span class="detail-label">{{ __('front_end.booking_email') }}:</span>
                                                <span class="detail-value" id="successEmail">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span class="detail-label">{{ __('front_end.booking_phone') }}:</span>
                                                <span class="detail-value" id="successPhone">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span
                                                    class="detail-label">{{ __('front_end.booking_appointment') }}</span>
                                                <span class="detail-value" id="successAppointmentType">-</span>
                                            </div>

                                            <div class="success-detail-row">
                                                <span
                                                    class="detail-label">{{ __('front_end.booking_location') }}:</span>
                                                <span
                                                    class="detail-value">{{ __('front_end.booking_location_address') }}</span>
                                            </div>
                                        </div>

                                        <button type="button" class="btn-close-success" id="closeSuccess">
                                            {{ __('front_end.booking_done_button') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-button mobile-menu-btn">
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!-- End header section -->


    @yield('content')

    <!-- WhatsApp Floating Button -->
    <div class="whatsapp-float" id="whatsappButton" style="display: none; left: 40px; right: auto;">
        <a href="https://wa.me/{{ str_replace([' ', '+', '-', '(', ')'], '', $contacts->phone) }}" target="_blank"
            title="{{ Config::get('app.locale') == 'ar' ? 'تواصل معنا عبر واتساب' : 'Chat with us on WhatsApp' }}">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            {{ Config::get('app.locale') == 'ar' ? 'left: 40px;' : 'right: 40px;' }} background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        .whatsapp-float:hover {
            background-color: #128c7e;
            transform: scale(1.1);
            box-shadow: 2px 2px 8px #666;
        }

        .whatsapp-float a {
            color: #FFF;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .whatsapp-float i {
            font-size: 30px;
            line-height: 60px;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                bottom: 20px;
                {{ Config::get('app.locale') == 'ar' ? 'left: 20px;' : 'right: 20px;' }} font-size: 25px;
            }

            .whatsapp-float i {
                font-size: 25px;
                line-height: 50px;
            }
        }

        /* Hide on very small screens to avoid interference */
        @media (max-width: 480px) {
            .whatsapp-float {
                width: 45px;
                height: 45px;
                bottom: 15px;
                {{ Config::get('app.locale') == 'ar' ? 'left: 15px;' : 'right: 15px;' }}
            }

            .whatsapp-float i {
                font-size: 20px;
                line-height: 45px;
            }
        }
    </style>

    <!-- Start Footer section section -->
    <footer class="footer-section style-2">
        <div class="container">
            <div class="footer-top">
                <div class="row g-lg-4 gy-5 justify-content-center">
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-start justify-content-sm-end">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5 style="color: #fff">{{ __('front_end.footer_title_dr') }}</h5>
                            </div>
                            <ul class="widget-list">
                                <li><a href="#">{{ __('front_end.footer_title_specialty') }}<br>
                                        {{ __('front_end.footer_title_specialty2') }}</a></li>
                                <li><a>
                                        {{ __('front_end.footer_Location') }}{{ __('front_end.footer_Location1') }}
                                        <br>
                                        {{ __('front_end.footer_Location2') }}
                                    </a>
                                </li>
                                <li><a href="tel:{{ $contacts->phone }}">{{ __('front_end.footer_Phone') }}
                                        {{ $contacts->phone }}</a>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-start justify-content-sm-end">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5 style="color: #fff">{{ __('front_end.footer_Aboutus') }}</h5>
                            </div>
                            <ul class="widget-list">
                                <li><a href="{{ route('dranas') }}">{{ __('front_end.footer_DrAnas') }}</a></li>
                                <li><a href="{{ route('aboutClinic') }}">{{ __('front_end.footer_OurClinic') }}</a>
                                </li>
                                <li><a href="{{ route('insurance') }}">{{ __('front_end.footer_OIncurance') }}</a>
                                </li>
                                <li><a
                                        href="{{ route('privacy-policy') }}">{{ __('front_end.footer_PrivacyPolicy') }}</a>
                                </li>
                                <li><a href="{{ route('ContactUs') }}">{{ __('front_end.footer_ContactUs') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-center justify-content-md-end">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5>{{ __('front_end.footer_Treatments') }}</h5>
                            </div>
                            @if (isset($treatments) && $treatments->count() > 0)
                                <ul class="widget-list">
                                    @foreach ($treatments as $treatment)
                                        <li><a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                                {{ Str::limit($treatment->title, 20) }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-sm-6 d-flex justify-content-lg-center justify-content-md-start justify-content-sm-end">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5>{{ __('front_end.footer_UsefulLinks') }}</h5>
                            </div>
                            <ul class="widget-list">
                                <li><a href="{{ route('welcome') }}">{{ __('front_end.footer_HomePage') }}</a></li>
                                <li><a href="{{ route('FAQ') }}">{{ __('front_end.footer_FAQ') }}</a></li>
                                <li><a href="{{ route('blogs') }}">{{ __('front_end.footer_Blogs') }}</a></li>
                                <li><a href="{{ route('gallery') }}">{{ __('front_end.footer_Gallery') }}</a></li>
                                <li><a
                                        href="{{ route('Terms&Conditions') }}">{{ __('front_end.footer_terms') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div
                        class="col-lg-12 d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center flex-wrap gap-3">
                        <div class="footer-left">
                            <p> <a href="https://smartzone-jo.com" target="_blank">
                                    {{ __('front_end.footer_website') }}{{ __('front_end.footer_website1') }}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer section section -->



 <!--  Main jQuery  -->
    <script src="{{ asset('front_end_style/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="{{ asset('front_end_style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front_end_style/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- Fancybox JS -->
    <script src="{{ asset('front_end_style/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front_end_style/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front_end_style/assets/js/slick.js') }}"></script>
    <!-- Swiper slider JS -->
    <script src="{{ asset('front_end_style/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front_end_style/assets/js/waypoints.min.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('front_end_style/assets/js/main.js') }}"></script>

    <!-- Before After plugin -->
    <script src="https://cdn.jsdelivr.net/npm/before-after-js/dist/before-after.min.js"></script>

    <!-- Splide -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>

    <script>
        $(document).ready(function () {
            if (typeof $('.before-after').beforeAfter === 'function') {
                $('.before-after').beforeAfter();
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const splideEl = document.getElementById('splide');

            if (splideEl && typeof Splide !== 'undefined') {
                new Splide('#splide', {
                    type: 'loop',
                    perPage: 2,
                    gap: '10px',
                    pagination: false,
                    autoplay: true,
                    interval: 5000,
                    pauseOnHover: true,
                    breakpoints: {
                        1024: {
                            perPage: 2,
                        },
                        768: {
                            perPage: 1,
                        }
                    }
                }).mount();
            }

            document.querySelectorAll('.wrapper').forEach(wrapper => {
                const slider = wrapper.querySelector('.slider input');
                const img = wrapper.querySelector('.images .img-2');
                const dragLine = wrapper.querySelector('.slider .drag-line');

                if (slider && img && dragLine) {
                    slider.oninput = () => {
                        let sliderVal = slider.value;
                        dragLine.style.left = sliderVal + '%';
                        img.style.width = sliderVal + '%';
                    };
                }
            });

            // Auto open booking popup if needed
            /*
            if (!sessionStorage.getItem('booking_popup_shown')) {
                sessionStorage.setItem('booking_popup_shown', '1');

                setTimeout(function () {
                    openBookingPopup();
                }, 300);
            }
            */
        });
    </script>

    <!-- Home blogs Features -->
    <script>
        function toggleContent(element) {
            var isEnglish = "{{ Config::get('app.locale') == 'en' }}";
            var allMoreContent = document.querySelectorAll('.more-content');
            var allReadMoreLinks = document.querySelectorAll('.read-more');

            allMoreContent.forEach(function (content) {
                if (content !== element.previousElementSibling) {
                    content.style.display = 'none';
                }
            });

            allReadMoreLinks.forEach(function (link) {
                if (link !== element) {
                    link.innerText = isEnglish ? "Read More" : "اقرأ المزيد";
                }
            });

            var content = element.previousElementSibling;
            if (content.style.display === "none") {
                content.style.display = "block";
                element.innerText = isEnglish ? "Read Less" : "اقرأ أقل";
            } else {
                content.style.display = "none";
                element.innerText = isEnglish ? "Read More" : "اقرأ المزيد";
            }
        }
    </script>

    <!-- Home blog -->
    <script>
        function toggleSingleContent(element) {
            var isEnglish = "{{ Config::get('app.locale') == 'en' }}";
            var content = element.previousElementSibling;

            if (content.style.display === "none") {
                content.style.display = "block";
                element.innerText = isEnglish ? "Read Less" : "اقرأ أقل";
            } else {
                content.style.display = "none";
                element.innerText = isEnglish ? "Read More" : "اقرأ المزيد";
            }
        }
    </script>

    <script>
        window.closeConsultSection = function () {
            var section = document.getElementById('consultSection');
            var whatsappBtn = document.getElementById('whatsappButton');

            if (section) {
                section.style.display = 'none';
            }

            if (whatsappBtn) {
                whatsappBtn.style.display = 'flex';
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            var openBookingBtn = document.getElementById('openBookingPopup');
            var consultSection = document.getElementById('consultSection');
            var whatsappBtn = document.getElementById('whatsappButton');

            if (consultSection && consultSection.style.display !== 'none') {
                if (whatsappBtn) whatsappBtn.style.display = 'none';
            }

            if (openBookingBtn) {
                openBookingBtn.addEventListener('click', function () {
                    if (typeof closeConsultSection === 'function') {
                        closeConsultSection();
                    } else {
                        var section = document.getElementById('consultSection');
                        if (section) section.style.display = 'none';
                        if (whatsappBtn) whatsappBtn.style.display = 'flex';
                    }
                });
            }
        });
    </script>


    <script>
    // document.addEventListener('DOMContentLoaded', function() {
    // if (!sessionStorage.getItem('booking_popup_shown')) {
    // sessionStorage.setItem('booking_popup_shown', '1');

    // setTimeout(function() {
    // openBookingPopup();
    // }, 300);
    // }
    // });
    </script>


    <script>
        window.closeConsultSection = function() {
            var section = document.getElementById('consultSection');
            var whatsappBtn = document.getElementById('whatsappButton');
            if (section) {
                section.style.display = 'none';
            }
            if (whatsappBtn) {
                whatsappBtn.style.display = 'flex';
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var openBookingBtn = document.getElementById('openBookingPopup');
            var consultSection = document.getElementById('consultSection');
            var whatsappBtn = document.getElementById('whatsappButton');
            // Hide WhatsApp button initially if consultSection is visible
            if (consultSection && consultSection.style.display !== 'none') {
                if (whatsappBtn) whatsappBtn.style.display = 'none';
            }
            if (openBookingBtn) {
                openBookingBtn.addEventListener('click', function() {
                    if (typeof closeConsultSection === 'function') {
                        closeConsultSection();
                    } else {
                        var section = document.getElementById('consultSection');
                        if (section) section.style.display = 'none';
                        if (whatsappBtn) whatsappBtn.style.display = 'flex';
                    }
                });
            }
        });
    </script>

    <script>
        let bookingModal;
        let bookingModalCard;
        let closeBookingBtn;
        let closeSuccessBtn;

        let stepDateTime;
        let stepSelectTime;
        let stepEnterDetails;
        let stepSuccess;

        let bookingContentLayout;
        let calendarContainer;
        let monthLabel;
        let prevMonthBtn;
        let nextMonthBtn;

        let selectedDateTitle;
        let selectedDateTitleDesktop;
        let timeSlotsContainer;
        let timeSlotsContainerDesktop;
        let bookingDetailsForm;
        let backToDateTimeBtn;
        let backToCalendarBtn;

        let jordanTimeEl;

        let currentDate = new Date();
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

        let selectedDate = null;
        let selectedTime = null;

        let apiData = {
            work_days: [],
            blocked_dates: [],
            time_slots: {}
        };

        const currentLocale = "{{ app()->getLocale() }}" === 'ar' ? 'ar-EG' : 'en-US';
        const atText = "{{ __('front_end.at') }}";

        function isMobileBooking() {
            return window.innerWidth <= 768;
        }

        function openBookingPopup(e) {
            if (e) e.preventDefault();

            var consultSection = document.getElementById('consultSection');
            var whatsappBtn = document.getElementById('whatsappButton');
            if (consultSection) consultSection.style.display = 'none';
            if (whatsappBtn) whatsappBtn.style.display = 'flex';

            if (!bookingModal) return;

            bookingModal.classList.add('active');
            document.body.style.overflow = 'hidden';

            fetchAvailability().then(() => {
                resetBookingModal();
            });
        }

        function closeBookingModal() {
            if (!bookingModal) return;

            bookingModal.classList.remove('active');
            document.body.style.overflow = '';
            resetBookingModal();
        }

        function updateJordanTime() {
            if (!jordanTimeEl) return;

            try {
                const now = new Date();
                const jordanTime = new Intl.DateTimeFormat('en-GB', {
                    timeZone: 'Asia/Amman',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                }).format(now);

                jordanTimeEl.textContent = jordanTime;
            } catch (e) {
                jordanTimeEl.textContent = '--:--';
            }
        }

        function resetStepScroll() {
            const selectedDateWrap = document.getElementById('selectedDateWrap');
            const successDetails = document.querySelector('.success-details');

            if (stepDateTime) stepDateTime.scrollTop = 0;
            if (stepSelectTime) stepSelectTime.scrollTop = 0;
            if (stepEnterDetails) stepEnterDetails.scrollTop = 0;
            if (stepSuccess) stepSuccess.scrollTop = 0;
            if (selectedDateWrap) selectedDateWrap.scrollTop = 0;
            if (successDetails) successDetails.scrollTop = 0;
        }

        function showStep(stepName) {
            if (!stepDateTime || !stepSelectTime || !stepEnterDetails || !stepSuccess) return;

            stepDateTime.style.display = 'none';
            stepSelectTime.style.display = 'none';
            stepEnterDetails.style.display = 'none';
            stepSuccess.style.display = 'none';

            if (stepName === 'date') stepDateTime.style.display = 'flex';
            if (stepName === 'time') stepSelectTime.style.display = 'flex';
            if (stepName === 'details') stepEnterDetails.style.display = 'flex';
            if (stepName === 'success') stepSuccess.style.display = 'flex';

            if (bookingModalCard && isMobileBooking()) {
                if (stepName === 'date') {
                    bookingModalCard.classList.remove('mobile-full-height');
                } else {
                    bookingModalCard.classList.add('mobile-full-height');
                }
            }

            if (bookingModalCard && !isMobileBooking()) {
                bookingModalCard.classList.remove('mobile-full-height');
            }

            resetStepScroll();
        }

        async function fetchAvailability() {
            try {
                const response = await fetch('/api/availability', {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to load availability');
                }

                const result = await response.json();

                let workDays = [];
                if (Array.isArray(result.work_days)) {
                    workDays = result.work_days.map(dayObj => {
                        if (typeof dayObj.day === 'string') {
                            return ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                                    'Saturday'
                                ]
                                .indexOf(dayObj.day);
                        }
                        return dayObj.day;
                    }).filter(day => day !== -1);
                }

                let blockedDates = [];
                if (Array.isArray(result.blocked_dates)) {
                    blockedDates = result.blocked_dates.map(bd =>
                        typeof bd === 'string' ? bd : bd.date
                    );
                }

                apiData = {
                    work_days: workDays,
                    blocked_dates: blockedDates,
                    time_slots: result.time_slots || {}
                };
            } catch (error) {
                console.warn('Availability fallback used:', error);
                apiData = {
                    work_days: [1, 2, 3, 4, 5],
                    blocked_dates: [],
                    time_slots: {}
                };
            }
        }

        function formatDateKey(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return `${y}-${m}-${d}`;
        }

        function isPastDate(date) {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const compareDate = new Date(date);
            compareDate.setHours(0, 0, 0, 0);

            return compareDate < today;
        }

        function isBlockedDate(dateKey) {
            return apiData.blocked_dates.includes(dateKey);
        }

        function isWorkDay(date) {
            const jsDay = date.getDay();
            return apiData.work_days.includes(jsDay);
        }

        function hasTimeSlots(dateKey) {
            return Array.isArray(apiData.time_slots[dateKey]) && apiData.time_slots[dateKey].length > 0;
        }

        function updateSelectedDateTitles(dayDate) {
            const formattedDate = dayDate.toLocaleDateString(currentLocale, {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            if (selectedDateTitle) {
                selectedDateTitle.textContent = formattedDate;
            }

            if (selectedDateTitleDesktop) {
                selectedDateTitleDesktop.textContent = formattedDate;
            }
        }

        function clearDesktopTimesVisibility() {
            if (bookingContentLayout) {
                bookingContentLayout.classList.remove('show-times');
            }
        }

        function showDesktopTimesVisibility() {
            if (bookingContentLayout && !isMobileBooking()) {
                bookingContentLayout.classList.add('show-times');
            }
        }

        function renderCalendar(date) {
            if (!calendarContainer || !monthLabel) return;

            calendarContainer.innerHTML = '';

            const monthNames = currentLocale === 'ar-EG' ? ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو',
                'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر',
                'ديسمبر'
            ] : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ];

            const dayNames = currentLocale === 'ar-EG' ? ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة',
                'السبت'
            ] : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            monthLabel.textContent = `${monthNames[date.getMonth()]} ${date.getFullYear()}`;

            dayNames.forEach(day => {
                const dayEl = document.createElement('div');
                dayEl.className = 'calendar-day-name';
                dayEl.textContent = day;
                calendarContainer.appendChild(dayEl);
            });

            const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

            for (let i = 0; i < firstDay.getDay(); i++) {
                const empty = document.createElement('div');
                empty.className = 'calendar-empty';
                calendarContainer.appendChild(empty);
            }

            for (let day = 1; day <= lastDay.getDate(); day++) {
                const dayDate = new Date(date.getFullYear(), date.getMonth(), day);
                const dateKey = formatDateKey(dayDate);

                const dateEl = document.createElement('div');
                dateEl.className = 'calendar-date';
                dateEl.textContent = day;

                const hasSlots = hasTimeSlots(dateKey);

                const available = !isPastDate(dayDate) &&
                    !isBlockedDate(dateKey) &&
                    isWorkDay(dayDate) &&
                    hasSlots;

                if (available) {
                    dateEl.classList.add('available');

                    if (selectedDate === dateKey) {
                        dateEl.classList.add('selected');
                    }

                    dateEl.addEventListener('click', function() {
                        document.querySelectorAll('.calendar-date.selected').forEach(el => {
                            el.classList.remove('selected');
                        });

                        dateEl.classList.add('selected');
                        selectedDate = dateKey;
                        selectedTime = null;

                        updateSelectedDateTitles(dayDate);
                        renderTimeSlots(dateKey);

                        if (isMobileBooking()) {
                            showStep('time');
                        } else {
                            showDesktopTimesVisibility();
                        }

                        resetStepScroll();
                    });
                } else {
                    dateEl.classList.add('muted');
                }

                calendarContainer.appendChild(dateEl);
            }
        }

        function buildTimeSlotRow(slot, dateKey, isDesktop) {
            const row = document.createElement('div');
            row.className = 'time-slot-row';

            const timeBtn = document.createElement('button');
            timeBtn.type = 'button';
            timeBtn.className = 'time-slot-btn';
            timeBtn.textContent = `${slot.start_time.substring(0, 5)} - ${slot.end_time.substring(0, 5)}`;

            const nextBtn = document.createElement('button');
            nextBtn.type = 'button';
            nextBtn.className = 'time-next-btn';
            nextBtn.textContent = "{{ __('front_end.booking_next') }}";

            function clearSelections() {
                document.querySelectorAll('.time-slot-row').forEach(r => r.classList.remove('active'));
                document.querySelectorAll('.time-slot-btn').forEach(btn => btn.classList.remove('selected'));
            }

            function selectThisTime() {
                clearSelections();
                row.classList.add('active');
                timeBtn.classList.add('selected');

                selectedTime = {
                    date: dateKey,
                    start_time: slot.start_time,
                    end_time: slot.end_time
                };
            }

            function goToDetailsStep() {
                if (!selectedTime) {
                    selectThisTime();
                }

                const [year, month, day] = selectedTime.date.split('-').map(Number);
                const appointmentDate = new Date(year, month - 1, day);

                const dateStr = appointmentDate.toLocaleDateString(currentLocale, {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                const timeStr = `${selectedTime.start_time.substring(0, 5)} - ${selectedTime.end_time.substring(0, 5)}`;
                const summaryDateTime = document.getElementById('summaryDateTime');

                if (summaryDateTime) {
                    summaryDateTime.textContent = `${dateStr} ${atText} ${timeStr}`;
                }

                showStep('details');
            }

            timeBtn.addEventListener('click', function() {
                selectThisTime();
            });

            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                selectThisTime();
                goToDetailsStep();
            });

            row.appendChild(timeBtn);
            row.appendChild(nextBtn);

            return row;
        }

        function renderTimeSlots(dateKey) {
            if (timeSlotsContainer) {
                timeSlotsContainer.innerHTML = '';
            }

            if (timeSlotsContainerDesktop) {
                timeSlotsContainerDesktop.innerHTML = '';
            }

            selectedTime = null;

            const slots = apiData.time_slots[dateKey] || [];

            if (!slots.length) {
                const emptyHtml = `<div class="no-times-msg">No time slots available.</div>`;

                if (timeSlotsContainer) {
                    timeSlotsContainer.innerHTML = emptyHtml;
                }

                if (timeSlotsContainerDesktop) {
                    timeSlotsContainerDesktop.innerHTML = emptyHtml;
                }

                return;
            }

            slots.forEach((slot) => {
                if (timeSlotsContainer) {
                    timeSlotsContainer.appendChild(buildTimeSlotRow(slot, dateKey, false));
                }

                if (timeSlotsContainerDesktop) {
                    timeSlotsContainerDesktop.appendChild(buildTimeSlotRow(slot, dateKey, true));
                }
            });
        }

        function resetBookingModal() {
            selectedDate = null;
            selectedTime = null;

            if (selectedDateTitle) {
                selectedDateTitle.textContent = `{{ __('front_end.booking_select_date') }}`;
            }

            if (selectedDateTitleDesktop) {
                selectedDateTitleDesktop.textContent = `{{ __('front_end.booking_select_date') }}`;
            }

            if (timeSlotsContainer) {
                timeSlotsContainer.innerHTML = '';
            }

            if (timeSlotsContainerDesktop) {
                timeSlotsContainerDesktop.innerHTML = '';
            }

            clearDesktopTimesVisibility();

            if (bookingModalCard) {
                bookingModalCard.classList.remove('mobile-full-height');
            }

            const formError = document.getElementById('formError');
            const formSuccess = document.getElementById('formSuccess');
            const appointmentTypeSelect = document.getElementById('appointmentType');
            const summaryDateTime = document.getElementById('summaryDateTime');

            if (formError) {
                formError.style.display = 'none';
                formError.textContent = '';
            }

            if (formSuccess) {
                formSuccess.style.display = 'none';
                formSuccess.textContent = '';
            }

            if (summaryDateTime) {
                summaryDateTime.textContent = '';
            }

            if (bookingDetailsForm) {
                bookingDetailsForm.reset();
            }

            if (appointmentTypeSelect) {
                appointmentTypeSelect.selectedIndex = 0;
            }

            renderCalendar(currentDate);
            showStep('date');
        }

        document.addEventListener('DOMContentLoaded', function() {
            bookingModal = document.getElementById('customBookingModal');
            bookingModalCard = document.querySelector('.booking-modal-card');
            closeBookingBtn = document.getElementById('closeBookingPopup');
            closeSuccessBtn = document.getElementById('closeSuccess');

            stepDateTime = document.getElementById('stepDateTime');
            stepSelectTime = document.getElementById('stepSelectTime');
            stepEnterDetails = document.getElementById('stepEnterDetails');
            stepSuccess = document.getElementById('stepSuccess');

            bookingContentLayout = document.getElementById('bookingContentLayout');
            calendarContainer = document.getElementById('calendlyCalendar');
            monthLabel = document.getElementById('calMonthLabel');
            prevMonthBtn = document.getElementById('calPrevMonth');
            nextMonthBtn = document.getElementById('calNextMonth');

            selectedDateTitle = document.getElementById('selectedDateTitle');
            selectedDateTitleDesktop = document.getElementById('selectedDateTitleDesktop');
            timeSlotsContainer = document.getElementById('timeSlotsContainer');
            timeSlotsContainerDesktop = document.getElementById('timeSlotsContainerDesktop');
            bookingDetailsForm = document.getElementById('bookingDetailsForm');
            backToDateTimeBtn = document.getElementById('backToDateTime');
            backToCalendarBtn = document.getElementById('backToCalendar');

            jordanTimeEl = document.getElementById('jordanTime');

            updateJordanTime();
            setInterval(updateJordanTime, 30000);

            if (closeBookingBtn) {
                closeBookingBtn.addEventListener('click', closeBookingModal);
            }

            if (closeSuccessBtn) {
                closeSuccessBtn.addEventListener('click', closeBookingModal);
            }

            if (bookingModal) {
                bookingModal.addEventListener('click', function(e) {
                    if (e.target === bookingModal) {
                        closeBookingModal();
                    }
                });
            }

            if (prevMonthBtn) {
                prevMonthBtn.addEventListener('click', function() {
                    currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
                    renderCalendar(currentDate);

                    if (selectedDate && !isMobileBooking()) {
                        showDesktopTimesVisibility();
                    }

                    resetStepScroll();
                });
            }

            if (nextMonthBtn) {
                nextMonthBtn.addEventListener('click', function() {
                    currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
                    renderCalendar(currentDate);

                    if (selectedDate && !isMobileBooking()) {
                        showDesktopTimesVisibility();
                    }

                    resetStepScroll();
                });
            }

            if (backToCalendarBtn) {
                backToCalendarBtn.addEventListener('click', function() {
                    showStep('date');
                });
            }

            if (backToDateTimeBtn) {
                backToDateTimeBtn.addEventListener('click', function() {
                    if (isMobileBooking()) {
                        showStep('time');
                    } else {
                        showStep('date');
                        if (selectedDate) {
                            showDesktopTimesVisibility();
                        }
                    }
                });
            }

            window.addEventListener('resize', function() {
                if (!bookingModal || !bookingModal.classList.contains('active')) return;

                if (isMobileBooking()) {
                    clearDesktopTimesVisibility();
                } else {
                    if (selectedDate) {
                        showDesktopTimesVisibility();
                        renderTimeSlots(selectedDate);
                    }
                    if (bookingModalCard) {
                        bookingModalCard.classList.remove('mobile-full-height');
                    }
                }
            });

            if (bookingDetailsForm) {
                bookingDetailsForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    if (!selectedTime) {
                        alert('Please select a date and time first.');
                        return;
                    }

                    const formError = document.getElementById('formError');
                    const formSuccess = document.getElementById('formSuccess');
                    const submitBtn = bookingDetailsForm.querySelector('button[type="submit"]');

                    if (formError) {
                        formError.style.display = 'none';
                        formError.textContent = '';
                    }

                    if (formSuccess) {
                        formSuccess.style.display = 'none';
                        formSuccess.textContent = '';
                    }

                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Scheduling...';

                    const fullName = document.getElementById('fullName').value.trim();
                    const nameParts = fullName.split(' ');
                    const firstName = nameParts[0] || '';
                    const lastName = nameParts.slice(1).join(' ') || '';

                    const appointmentTypeSelect = document.getElementById('appointmentType');
                    const appointmentTypeId = appointmentTypeSelect ? appointmentTypeSelect.value :
                        null;

                    if (!appointmentTypeId) {
                        if (formError) {
                            formError.textContent = 'Please select an appointment type.';
                            formError.style.display = 'block';
                        }
                        submitBtn.disabled = false;
                        submitBtn.textContent = '{{ __('front_end.booking_schedule_button') }}';
                        return;
                    }

                    const formData = {
                        first_name: firstName,
                        last_name: lastName,
                        email: document.getElementById('email').value,
                        phone: document.getElementById('phone').value,
                        appointment_date: selectedTime.date,
                        start_time: selectedTime.start_time,
                        end_time: selectedTime.end_time,
                        appointment_type_id: appointmentTypeId,
                        notes: document.getElementById('notes').value
                    };

                    try {
                        const response = await fetch('/api/appointments', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')?.getAttribute('content') ||
                                    ''
                            },
                            body: JSON.stringify(formData)
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            let message = 'Something went wrong. Please try again.';

                            if (result.message) {
                                message = result.message;
                            } else if (result.errors) {
                                const firstKey = Object.keys(result.errors)[0];
                                if (firstKey && Array.isArray(result.errors[firstKey])) {
                                    message = result.errors[firstKey][0];
                                }
                            }

                            if (formError) {
                                formError.textContent = message;
                                formError.style.display = 'block';
                            }
                            return;
                        }

                        document.getElementById('successBookingRef').textContent = result
                            .booking_reference || 'N/A';

                        const [year, month, day] = formData.appointment_date.split('-').map(Number);
                        const appointmentDate = new Date(year, month - 1, day);

                        const dateStr = appointmentDate.toLocaleDateString(currentLocale, {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        const timeStr =
                            `${formData.start_time.substring(0, 5)} - ${formData.end_time.substring(0, 5)}`;

                        document.getElementById('successDateTime').textContent =
                            `${dateStr} ${atText} ${timeStr}`;
                        document.getElementById('successName').textContent = fullName;
                        document.getElementById('successEmail').textContent = formData.email;
                        document.getElementById('successPhone').textContent = formData.phone;

                        const appointmentTypeName = appointmentTypeSelect.options[appointmentTypeSelect
                            .selectedIndex].text;
                        document.getElementById('successAppointmentType').textContent =
                            appointmentTypeName;

                        await fetchAvailability();

                        if (apiData.time_slots[selectedTime.date]) {
                            apiData.time_slots[selectedTime.date] = apiData.time_slots[selectedTime
                                .date].filter(slot =>
                                !(slot.start_time === selectedTime.start_time && slot.end_time ===
                                    selectedTime.end_time)
                            );

                            if (apiData.time_slots[selectedTime.date].length === 0) {
                                delete apiData.time_slots[selectedTime.date];
                            }
                        }

                        renderCalendar(currentDate);

                        if (selectedTime?.date && hasTimeSlots(selectedTime.date) && !
                            isMobileBooking()) {
                            selectedDate = selectedTime.date;
                            renderTimeSlots(selectedTime.date);
                            showDesktopTimesVisibility();
                        } else {
                            selectedDate = null;

                            if (selectedDateTitle) {
                                selectedDateTitle.textContent =
                                    `{{ __('front_end.booking_select_date') }}`;
                            }

                            if (selectedDateTitleDesktop) {
                                selectedDateTitleDesktop.textContent =
                                    `{{ __('front_end.booking_select_date') }}`;
                            }

                            if (timeSlotsContainer) {
                                timeSlotsContainer.innerHTML = '';
                            }

                            if (timeSlotsContainerDesktop) {
                                timeSlotsContainerDesktop.innerHTML = '';
                            }

                            clearDesktopTimesVisibility();
                        }

                        bookingDetailsForm.reset();
                        if (appointmentTypeSelect) {
                            appointmentTypeSelect.selectedIndex = 0;
                        }

                        showStep('success');

                    } catch (error) {
                        console.error(error);
                        if (formError) {
                            formError.textContent = 'An unexpected error occurred. Please try again.';
                            formError.style.display = 'block';
                        }
                    } finally {
                        submitBtn.disabled = false;
                        submitBtn.textContent = '{{ __('front_end.booking_schedule_button') }}';
                    }
                });
            }
        });
    </script>



</body>

</html>
