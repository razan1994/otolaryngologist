<!doctype html>
<html lang="en">

    <head>
    <?php
    $lang= app()->getLocale()=="ar"? 'assets_rtl':'assets';
    $val = app()->getLocale()=="ar"? '.rtl':'';
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
    <meta name="author" content="smartzone">


    @yield('canonical')

    
    
    
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/bootstrap{{$val}}.min.css" type="text/css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/animate.min.css" type="text/css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/meanmenu.css" type="text/css">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/boxicons.min.css" type="text/css">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/flaticon.css" type="text/css">
        <!-- Flaticon Two CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/flaticon-two.css" type="text/css">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/magnific-popup.min.css" type="text/css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/nice-select.min.css" type="text/css">
        <!-- Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/owl.carousel.min.css" type="text/css">
        <!-- Carousel Default CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/owl.theme.default.min.css" type="text/css">
        <!-- Popup CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/magnific-popup.min.css" type="text/css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('front_end_style') }}/{{$lang}}/css/magnific-popup.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset ('front_end_style') }}/{{$lang}}/css/rtl.css">
        <link rel="stylesheet" href="{{ asset ('front_end_style') }}/{{$lang}}/css/bootstrap.rtl.min.css">
        <link href="{{ asset('front_end_style/assets/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('front_end_style')}}/{{$lang}}/css/magnific-popup.min.css" rel="stylesheet">
        <!-- Dark CSS -->
        <link href="{{ asset('front_end_style')}}/{{$lang}}/css/dark.css" rel="stylesheet">

        <!-- Responsive CSS -->
        {{-- <link href="{{ asset('front_end_style/assets/css/responsive.css')}}" rel="stylesheet"> --}}
        <link href="{{ asset('front_end_style')}}/{{$lang}}/css/responsive.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('front_end_style/assets/images/favicon.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Chivo+Mono:wght@100;400&display=swap" rel="stylesheet">


<meta name="google-site-verification" content="cHvVWecmNPDa8dEPTPTUw-etBdtLKKLj4GYnAX-83Bc" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N5KVRS7');</script>
<!-- End Google Tag Manager -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E83HWT4Z13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-E83HWT4Z13');
</script>


    </head>

    <body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" >

        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KVRS7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

        <h1 class="hidden-h1">@yield("h1_val")</h1>
        <h2 class="hidden-h2">@yield("h2_val")</h2>

        {{-- <!-- Start Preloader Area -->
        <div class="preloader">
            <div class="loader">
                <div class="sbl-half-circle-spin"></div>
            </div>
        </div>
        <!-- End Preloader Area --> --}}

        <!-- Start Header Area -->
        <header class="header-area grin-care-header">

            <!-- Start Top Area -->
            <div class="top-area" >
                <div class="container-fluid" >
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            {{-- <ul class="top-information-wrap">
                                <li>
                                    <i class='bx bxs-phone gradient-text'></i>
                                    <a href="tel:08812365498835">0799559157</a>
                                </li>

                                <li>
                                    <i class='bx bxs-map gradient-text'></i>
                                   <a  href="#">  Amman، Madeena Street </a>
                                </li>

                                <li>
                                    <i class='bx bx-envelope-open gradient-text'></i>
                                    <a   href="mailto:dranasabushamleh82@gmail.com">dranasabushamleh82@gmail.com</a>
                                </li>

                            </ul> --}}
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <ul class="top-optional-wrap2">
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook'></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank"><i class='bx bxl-instagram'></i></a>
                                </li>
                                <li>
                                    <a href="https://goo.gl/maps/tJtH9pUNWnCo5wt9A" target="_blank"><i class='bx bxs-map'></i></a>
                                </li>

                                <li>
                                    <a href="tel:08812365498835" target="_blank"><i class='bx bxs-phone'></i></a>
                                </li>
                                <li>
                                    <a href="https://wa.link/chzxur" target="_blank"><i class='fa fa-whatsapp' aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="mailto:dranasabushamleh82@gmail.com" target="_blank"><i class='bx bxs-envelope'></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Area -->

            <!-- Start Navbar Area -->
            <div class="navbar-area grin-care-navbar" style="" >
                <div class="main-responsive-nav">
                    <div class="container">
                        <div class="main-responsive-menu">
                            <div class="logo">
                                <a href="{{route('welcome')}}">
                                    <img src="{{ asset('front_end_style/assets/images/dranas-logo.png') }}" class="main-logo" alt="logo">
                                    <img src="{{ asset('front_end_style/assets/images/dranas-logo.png') }}" class="white-logo" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-navbar">
                    <div class="container-fluid">
                        <nav class="navbar navbar-expand-md navbar-light">

                             <a href="{{ route('welcome') }}">   <img width="150" height="60" src="{{ asset('front_end_style/assets/images/dranas-logo.png') }}" class="main-logo" alt="logo"> </a>


                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a href="{{ route('welcome') }}" class="nav-link gradient-text">{{__('front_end.nav_home')}}</a>
                                    </li>



                                    <li class="nav-item">
                                        <a href="#" class="nav-link gradient-text">
                                            {{__('front_end.nav_AboutUs')}}
                                            <i class='bx bx-caret-down gradient-text'></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="{{ route('dranas') }}" class="nav-link gradient-text">{{__('front_end.nav_Dr_Anas')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ route('aboutClinic') }}" class="nav-link gradient-text">{{__('front_end.nav_Clinic')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ route('insurance') }}" class="nav-link gradient-text">{{__('front_end.nav_Certified')}}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('treatments') }}" class="nav-link gradient-text">{{__('front_end.nav_Treatments')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('blogs') }}" class="nav-link gradient-text">{{__('front_end.nav_Blogs')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('gallery') }}" class="nav-link gradient-text">{{__('front_end.nav_Gallery')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('ContactUs') }}" class="nav-link gradient-text">{{__('front_end.nav_ContactUs')}}</a>
                                    </li>

                                    {{-- <li class="nav-item">
                                        <a href="#" class="nav-link gradient-text">
                                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                                            <i class='bx bx-caret-down gradient-text'></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li class="nav-item">
                                                <a class="nav-link gradient-text"
                                                rel="alternate"
                                                hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" >
                                                {{ $properties['native'] }}
                                            </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li> --}}

                                   
                                    <li class="nav-item"><a class="nav-link gradient-text" hreflang="ar" href="{{ '/ar' }}">العربية</a></li>
                               


                                </ul>

                                {{-- <div class="others-options d-flex align-items-center">
                                    <div class="option-item">
                                        <div class="search-btn">
                                            <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                                <i class="flaticon-search"></i>
                                            </a>
                                        </div>
                                    </div>



                                </div> --}}
                            </div>
                        </nav>
                    </div>
                </div>

                {{-- <div class="others-option-for-responsive">
                    <div class="container">
                        <div class="dot-menu">
                            <div class="inner">
                                <div class="circle circle-one"></div>
                                <div class="circle circle-two"></div>
                                <div class="circle circle-three"></div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="option-inner">
                                <div class="others-options d-flex align-items-center">
                                    <div class="option-item">
                                        <div class="search-btn">
                                            <a class="#" href="#searchmodal" data-bs-toggle="modal" data-bs-target="#searchmodal">
                                                <i class="flaticon-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- End Navbar Area -->

        </header>
        <!-- Start Header Area -->

        <!-- Search Modal -->
        <div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <i class='bx bx-x'></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="modal-search-form">
                            <input type="search" class="search-field" placeholder="Search...">

                            <button type="submit"><i class='bx bx-search-alt'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Modal -->

        @yield('content')


         <!-- Start Skin Care Footer Area -->
         <div class="skin-care-footer-area pt-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="skin-care-footer-widget">
                            <h2>
                                <img width="150" height="80" src="{{ asset('front_end_style/assets/images/slogan-white.png') }}" class="main-logo" alt="logo">
                            </h2>
                            <ul class="info-list">
                                <li><span class="">{{__('front_end.footer_Location')}}</span>{{__('front_end.footer_Location1')}}</li>
                                <li><span class="">{{__('front_end.footer_Phone')}}</span> <a href="tel:088123654987">0799559157</a></li>
                                <li><span class="">{{__('front_end.footer_Email')}}</span> <a href="mailto:info@grin.com">dranasabushamleh82@gmail.com</a></li>


                            <li>
                            <ul class="top-optional-wrap" >
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook'></i></a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank"><i class='bx bxl-instagram'></i></a>
                                </li>
                                <li>
                                    <a href="https://goo.gl/maps/tJtH9pUNWnCo5wt9A" target="_blank"><i class='bx bxs-map'></i></a>
                                </li>

                                <li>
                                    <a href="tel:08812365498835" target="_blank"><i class='bx bxs-phone'></i></a>
                                </li>
                                <li>
                                    <a href="https://wa.link/chzxur" target="_blank"><i class='fa fa-whatsapp'></i></a>
                                </li>
                                <li>
                                    <a href="mailto:dranasabushamleh82@gmail.com" target="_blank"><i class='bx bxs-envelope'></i></a>
                                </li>
                            </ul>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="skin-care-footer-widget">
                            <h3>{{__('front_end.footer_Aboutus')}}</h3>

                            <ul class="quick-links">
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('dranas') }}">{{__('front_end.footer_DrAnas')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('aboutClinic') }}">{{__('front_end.footer_OurClinic')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('insurance') }}">{{__('front_end.footer_OIncurance')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('privacy-policy') }}">{{__('front_end.footer_PrivacyPolicy')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('ContactUs') }}">{{__('front_end.footer_ContactUs')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="skin-care-footer-widget">
                            <h3>{{__('front_end.footer_Treatments')}}</h3>


                            <ul class="quick-links">
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('treatments') }}">{{__('front_end.footer_Treatments')}}</a></li>
                                @foreach ($services2 as $service)
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('services-details', $service->alias_name) }}">{!! $service->title !!}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="skin-care-footer-widget">
                            <h3>{{__('front_end.footer_UsefulLinks')}}</h3>

                            <ul class="quick-links">
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('welcome') }}">{{__('front_end.footer_HomePage')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('FAQ') }}">{{__('front_end.footer_FAQ')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('blogs') }}">{{__('front_end.footer_Blogs')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('gallery') }}">{{__('front_end.footer_Gallery')}}</a></li>
                                <li><i class='bx bxs-chevrons-right '></i> <a href="{{ route('Terms&Conditions') }}">{{__('front_end.footer_terms')}}</a></li>

                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="skin-care-footer-widget">
                            <h3>Newsletter</h3>

                            <form class="newsletter-form">
                                <p>Sign up for our newsletter and get updated about our latest promotions</p>

                                <div class="form-group">
                                    <input type="email" class="input-newsletter" placeholder="Your email address" name="EMAIL" required autocomplete="off">

                                    <button type="submit"><i class='bx bx-send gradient-text'></i></button>
                                </div>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div> --}}
                </div>

                <div class="skin-care-copyright-area" >
                    <div class="container">
                        <div class="copyright-area-content">
                            <p>
                                {{__('front_end.footer_website')}}
                                <a style="" href="https://smartzone-jo.com/en" target="_blank">
                                    {{__('front_end.footer_website1')}}
                                </a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Skin Care Footer Area -->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
        <!-- End Go Top Area -->


        <!-- Jquery Slim JS -->
        <script src="{{ asset('front_end_style/assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('front_end_style/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('front_end_style/assets/js/jquery.meanmenu.js') }}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{ asset('front_end_style/assets/js/owl.carousel.min.js') }}"></script>
        <!-- Jquery Appear JS -->
        <script src="{{ asset('front_end_style/assets/js/jquery.appear.js') }}"></script>
        <!-- Odometer JS -->
        <script src="{{ asset('front_end_style/assets/js/odometer.min.js') }}"></script>
        <!-- Nice Select JS -->
        <script src="{{ asset('front_end_style/assets/js/nice-select.min.js') }}"></script>
        <!-- Popup JS -->
        <script src="{{ asset('front_end_style/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Ajaxchimp JS -->
		<script src="{{ asset('front_end_style/assets/js/jquery.ajaxchimp.min.js') }}"></script>
		<!-- Form Validator JS -->
		<script src="{{ asset('front_end_style/assets/js/form-validator.min.js') }}"></script>
		<!-- Contact JS -->
        <script src="{{ asset('front_end_style/assets/js/contact-form-script.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('front_end_style/assets/js/wow.min.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('front_end_style/assets/js/main.js') }}"></script>
        <script>
            const imageComparisonSlider = document.querySelector('[data-component="image-comparison-slider"]');



function setSliderstate(e, element) {
  const sliderRange = element.querySelector('[data-image-comparison-range]');

  if (e.type === 'input') {
    sliderRange.classList.add('image-comparison__range--active');
    return;
  }

  sliderRange.classList.remove('image-comparison__range--active');
  element.removeEventListener('mousemove', moveSliderThumb);
}

function moveSliderThumb(e) {
  const sliderRange = document.querySelector('[data-image-comparison-range]');
  const thumb = document.querySelector('[data-image-comparison-thumb]');
  let position = e.layerY - 20;

  if (e.layerY <= sliderRange.offsetTop) {
    position = -20;
  }

  if (e.layerY >= sliderRange.offsetHeight) {
    position = sliderRange.offsetHeight - 20;
  }

  thumb.style.top = `${position}px`;
}

function moveSliderRange(e, element) {
  const value = e.target.value;
  const slider = element.querySelector('[data-image-comparison-slider]');
  const imageWrapperOverlay = element.querySelector('[data-image-comparison-overlay]');

  slider.style.left = `${value}%`;
  imageWrapperOverlay.style.width = `${value}%`;

  element.addEventListener('mousemove', moveSliderThumb);
  setSliderstate(e, element);
}

function init(element) {
  const sliderRange = element.querySelector('[data-image-comparison-range]');

  if ('ontouchstart' in window === false) {
    sliderRange.addEventListener('mouseup', e => setSliderstate(e, element));
    sliderRange.addEventListener('mousedown', moveSliderThumb);
  }

  sliderRange.addEventListener('input', e => moveSliderRange(e, element));
  sliderRange.addEventListener('change', e => moveSliderRange(e, element));
}

init(imageComparisonSlider);
        </script>

        @if(Config::get('app.locale') == 'en')
        @include('front_end_inners.includes.en_include')
    @else
        @include('front_end_inners.includes.ar_include')
    @endif



    </body>
</html>
