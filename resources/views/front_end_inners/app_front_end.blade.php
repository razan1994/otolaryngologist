<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <?php
    $lang = app()->getLocale() == 'ar' ? 'assets_rtl' : 'assets';
    $val = app()->getLocale() == 'ar' ? '.rtl' : '';

    $treatments = App\Models\Treatment::latest()->take(5)->get();
    ?>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>@yield('page_title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="@yield('robot')">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_desc')">
    <meta property="title" content="@yield('meta_title')">
    <meta property="description" content="@yield('meta_desc')">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="og:title" content="@yield('meta_title')">
    <meta name="og:description" content="@yield('meta_desc')" />
    <meta property="og:image" content="{{ asset('front_end_style/assets/img/favicon.png') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@dranasabushamleh" />
    <meta name="twitter:creator" content="@dranasabushamleh" />
    <meta name="twitter:image" content="{{ asset('front_end_style/assets/img/favicon.png') }}" />
    <meta name="twitter:title" content="@yield('meta_title')">
    <meta name="twitter:description" content="@yield('meta_desc')" />
    <meta property="keywords" content="@yield('meta_keywords')">
    <meta name="author" content="smartzone">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">

    @yield('canonical')

    @if (Config::get('app.locale') == 'en')
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet">

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
        <link rel="stylesheet" href="{{ asset('front_end_style/assets/css/style.css') }}">

        <link rel="icon" href="{{ asset('front_end_style/assets/img/favicon.png') }}" type="image/gif">

        <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap"
            rel="stylesheet">
    @elseif (Config::get('app.locale') == 'ar')
        <!-- Bootstrap CSS -->
        <link href="{{ asset('front_end_style/assets_rtl/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
        <!-- Bootstrap Icon CSS -->
        <link href="{{ asset('front_end_style/assets_rtl/css/bootstrap-icons.css') }}" rel="stylesheet">
        <!-- Fontawesome all CSS -->
        <link href="{{ asset('front_end_style/assets_rtl/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front_end_style/assets_rtl/css/nice-select.css') }}" rel="stylesheet">
        <link href="{{ asset('front_end_style/assets_rtl/css/animate.min.css') }}" rel="stylesheet">
        <!--  FancyBox CSS  -->
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/jquery.fancybox.min.css') }}">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link href="{{ asset('front_end_style/assets_rtl/css/fontawesome.min.css') }}" rel="stylesheet">
        <!-- box icon css -->
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/boxicons.min.css') }}">
        <!-- slider CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/slick.css') }}">
        <!--  Style CSS  -->
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front_end_style/assets_rtl/css/style-rtl.css') }}">
        <link rel="icon" href="{{ asset('front_end_style/assets/img/favicon.png') }}" type="image/gif">

        <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet">
    @endif

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




</head>

<body class="style-2">


    <!-- Icons Section -->
    <div class="icon-bar">
        <a href="tel:00962799559157" class="phone"><i class="fas fa-phone-alt"></i></a>
        <a href="https://wa.link/chzxur" class="whatsapp"><i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://web.facebook.com/ENTDoctorJordan" class="facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/dr.anasabushamleh/" class="instagram"><i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
    </div>

    <h1 class="hidden-h1">@yield('h1_val')</h1>
    <h2 class="hidden-h2">@yield('h2_val')</h2>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KVRS7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                        <a href="tel:{{ __('front_end.top_nav_phone') }}">{{ __('front_end.top_nav_phone') }}</a>
                    </div>
                    <p> {{ __('front_end.top_nav_text') }} </p>
                    <div class="social-area">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/ENTDoctorJordan">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/dr.anasabushamleh/">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.link/chzxur">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start home2 header section -->
    <header class="header-area style-2">
        <div class="container-md position-relative  d-flex flex-nowrap align-items-center justify-content-between">
            <div class="header-logo d-lg-none d-flex">
                @if (Config::get('app.locale') == 'en')
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('front_end_style/assets/img/home1/logo.png') }}" class="img-fluid">
                    </a>
                @else
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}" class="img-fluid" >
                            </a>
                @endif
            </div>
            <div class="company-logo d-lg-flex d-none">
                @if (Config::get('app.locale') == 'en')
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('front_end_style/assets/img/home1/logo.png') }}">
                    </a>
                @else
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}">
                    </a>
                @endif
            </div>
            <div class="main-menu">
                <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                    <div class="mobile-logo-wrap">
                        @if (Config::get('app.locale') == 'en')
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('front_end_style/assets/img/home1/logo.png') }}">
                        </a>
                    @else
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('front_end_style/assets/img/home1/logo_ar.png') }}">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M19.9018 8.6153C19.5412 5.99522 18.1517 3.62536 16.0393 2.02707C13.9268 0.428777 11.2643 -0.267025 8.63745 0.0927308C6.01063 0.452486 3.63468 1.83833 2.03228 3.94539C0.42988 6.05245 -0.267711 8.70813 0.0929693 11.3282C0.388972 13.4966 1.38745 15.509 2.9363 17.0589C4.48516 18.6088 6.49948 19.6113 8.67243 19.9136C9.11786 19.9713 9.56656 20.0002 10.0157 20C11.8278 20.0033 13.606 19.5101 15.1563 18.5744C15.2358 18.5318 15.3058 18.4735 15.362 18.4031C15.4182 18.3326 15.4595 18.2516 15.4833 18.1648C15.5072 18.078 15.5131 17.9872 15.5007 17.8981C15.4884 17.8089 15.458 17.7232 15.4114 17.6461C15.3648 17.569 15.303 17.5021 15.2298 17.4496C15.1565 17.397 15.0733 17.3599 14.9853 17.3403C14.8972 17.3208 14.806 17.3193 14.7173 17.336C14.6287 17.3527 14.5443 17.3871 14.4694 17.4373C12.7129 18.4904 10.6392 18.8886 8.61629 18.5613C6.59339 18.2339 4.75224 17.2022 3.4197 15.6492C2.08717 14.0962 1.34948 12.1225 1.3376 10.0784C1.32573 8.03438 2.04043 6.05225 3.35483 4.48397C4.66923 2.91568 6.49828 1.86271 8.51723 1.512C10.5362 1.16129 12.6144 1.53554 14.383 2.56829C16.1515 3.60104 17.4959 5.22548 18.1776 7.1532C18.8592 9.08092 18.8338 11.1872 18.1061 13.0981C17.9873 13.4102 17.7626 13.6709 17.4711 13.8349C17.1795 13.999 16.8396 14.056 16.5104 13.996C16.1811 13.9361 15.8833 13.763 15.6687 13.5068C15.454 13.2506 15.3362 12.9275 15.3356 12.5936V5.37867C15.3356 5.2024 15.2654 5.03336 15.1404 4.90872C15.0155 4.78408 14.846 4.71406 14.6693 4.71406C14.4925 4.71406 14.3231 4.78408 14.1981 4.90872C14.0731 5.03336 14.0029 5.2024 14.0029 5.37867V6.52578C13.2819 5.70734 12.3261 5.12961 11.265 4.8708C10.204 4.61198 9.08877 4.68456 8.0704 5.07873C7.05203 5.47289 6.17966 6.16961 5.57134 7.07458C4.96303 7.97954 4.64814 9.04908 4.66929 10.1384C4.69045 11.2278 5.04663 12.2843 5.68962 13.1651C6.33262 14.0459 7.23139 14.7084 8.2643 15.0629C9.2972 15.4175 10.4144 15.4469 11.4646 15.1473C12.5149 14.8477 13.4475 14.2335 14.1362 13.3878C14.3015 13.9385 14.6358 14.4237 15.092 14.775C15.5482 15.1263 16.1033 15.326 16.6793 15.3461C17.2553 15.3662 17.8231 15.2057 18.3028 14.887C18.7825 14.5684 19.15 14.1078 19.3535 13.5699C19.9483 11.99 20.1368 10.2866 19.9018 8.6153ZM10.0051 14.0185C9.21436 14.0185 8.4414 13.7847 7.78396 13.3465C7.12651 12.9083 6.61409 12.2856 6.3115 11.5569C6.00891 10.8283 5.92974 10.0265 6.08399 9.25296C6.23825 8.47943 6.61902 7.7689 7.17813 7.21122C7.73724 6.65354 8.4496 6.27376 9.22511 6.1199C10.0006 5.96603 10.8045 6.045 11.535 6.34681C12.2655 6.64863 12.8899 7.15973 13.3292 7.8155C13.7685 8.47126 14.0029 9.24223 14.0029 10.0309C14.0019 11.0882 13.5803 12.1018 12.8308 12.8494C12.0813 13.597 11.065 14.0175 10.0051 14.0185Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="email-info">
                                <span>{{ __('front_end.footer_Email') }}</span>
                                <h6><a href="mailto:dranasabushamleh@gmail.com">dranasabushamleh@gmail.com</a></h6>
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
                                        <a style="font-family: 'El Messiri', sans-serif; color:#125258" hreflang="ar"
                                            href="{{ '/ar' }}">العربية</a>
                                    </h6>
                                @else
                                    <h6>
                                        <a style="font-family: 'Jost', sans-serif; color:#125258" hreflang="en"
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
                    <div class="search-area">
                        <div class="search-btn">
                            @if (Config::get('app.locale') == 'en')
                                <a style="font-family: 'El Messiri', sans-serif; color:#125258" class="nav-link"
                                    hreflang="ar" href="{{ '/ar' }}">العربية</a>
                            @else
                                <a style="font-family: 'Jost', sans-serif; color:#125258" class="nav-link"
                                    hreflang="en" href="{{ '/en' }}">English</a>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="sidebar-button mobile-menu-btn ">
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!-- End home2 header section -->


    @yield('content')

    @if (Config::get('app.locale') == 'en')
        @include('front_end_inners.includes.en_include')
    @else
        @include('front_end_inners.includes.ar_include')
    @endif

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
                                <li><a href="tel:+9962799559157">{{ __('front_end.footer_Phone') }}
                                        {{ __('front_end.footer_No') }}</a>
                                </li>
                                <li><a href="dranasabushamleh82@gmail.com">{{ __('front_end.footer_Email') }} <br>

                                        dranasabushamleh82@gmail.com</a>
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

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Splide
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


            document.querySelectorAll(".wrapper").forEach(wrapper => {
                const slider = wrapper.querySelector(".slider input");
                const img = wrapper.querySelector(".images .img-2");
                const dragLine = wrapper.querySelector(".slider .drag-line");

                slider.oninput = () => {
                    let sliderVal = slider.value;
                    dragLine.style.left = sliderVal + "%";
                    img.style.width = sliderVal + "%";
                };
            });
        });
    </script>

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/before-after-js/dist/before-after.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.before-after').beforeAfter();
        });
    </script>

    <!-- Home blogs Features -->
    <script>
        function toggleContent(element) {
            var isEnglish = "{{ Config::get('app.locale') == 'en' }}";
            var allMoreContent = document.querySelectorAll('.more-content');
            var allReadMoreLinks = document.querySelectorAll('.read-more');


            allMoreContent.forEach(function(content) {
                if (content !== element.previousElementSibling) {
                    content.style.display = 'none';
                }
            });


            allReadMoreLinks.forEach(function(link) {
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
        function toggleContent(element) {
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


</body>

</html>
