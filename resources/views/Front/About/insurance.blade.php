@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title')
    {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}
@endsection
@section('meta_title')
    {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}
@endsection
@section('meta_desc')
    {{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}
@endsection
@section('meta_keywords')
    {{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}
@endsection


@section('canonical')
    @php
        $enUrl = 'https://www.otolaryngologist-jo.com/en/Certified-Insurance-Companies';
        $arUrl = 'https://www.otolaryngologist-jo.com/ar/شركات-التأمين-المعتمدة';
        $canonicalUrl = Config::get('app.locale') == 'en' ? $enUrl : $arUrl;
    @endphp

    <link rel="canonical" href="{{ $canonicalUrl }}" />
    <link rel="alternate" href="{{ $enUrl }}" hreflang="en-JO" />
    <link rel="alternate" href="{{ $arUrl }}" hreflang="ar-JO" />
    <link rel="alternate" href="{{ $enUrl }}" hreflang="x-default" />
@endsection


@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection


@section('content')





    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.nav_Certified') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->

    <!-- Start About Us Banner Section -->
    <div class="about-us-banner mt-40  mb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-thumb hover-img mb-60">
                        <img src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}" loading="lazy"
                            alt="الدكتور أنس أبو شملة -  اختصاصي أنف وأذن وحنجرة معتمد في الأردن, استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن
Dr. Anas Abushamleh - Board-Certified ENT Specialist in Jordan, Expert in Treating Ear, Nose, and Throat Diseases, Member of the Jordanian Surgeons Association and the Jordan Medical Association, Best ENT Doctor in Amman, Jordan
">
                    </div>
                </div>
            </div>
        </div>


        <!-- Start About Us Content Section section -->
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="section-title2 style-2">
                        <h3>{{ __('front_end.nav_Certified') }}</h3>
                    </div>
                    <div class="col-lg-10">
                        <div class="about-us-wrapper">
                            <p><strong>{{ __('front_end.Insurance_Certified1') }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

    <!-- Star insurances section -->
    @if (isset($insurances) && $insurances->count() > 0)
        <div class="newest-product-section mt-40  mb-110">
            <div class="container">
                <div class="row">
                    @foreach ($insurances as $insurance)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                            <div class="product-card-group">
                                <div class="product-card hover-btn">
                                    <div class="product-card-img double-img">
                                        <a href="#">
                                            @if (isset($insurance->image) && file_exists($insurance->image))
                                                <img src="{{ asset($insurance->image) }}" alt="{{ $insurance->alt }}" loading="lazy" class="img1">
                                                <img src="{{ asset($insurance->image) }}" alt="{{ $insurance->alt }}" loading="lazy" class="img2">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-card-content">
                                        <h6>
                                            <a href="#" class="read-more">
                                                {!! $insurance->title !!}
                                            </a>
                                        </h6>
                                    </div>
                                    <span class="for-border"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- End insurances section -->

    <!-- Start Instagram section section -->
    <div class="instagram-section mb-110 mt-110">
        <div class="container">
            <div class="section-title style-3">
                <h3>{{ __('front_end.instagramfeeds_title') }}</h3>
                <p>{{ __('front_end.instagramfeeds_SubTitle') }} <a
                        href="https://www.instagram.com/dr.anasabushamleh/">{{ __('front_end.instagramfeeds_Account') }}</a>
                </p>
            </div>
        </div>
        <div class="instagram-wrapper">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper instagram-slider" dir="{{ Config::get('app.locale') == 'ar' ? 'ltr' : 'rtl' }}">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst1.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst3.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst4.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst5.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst6.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst7.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst8.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst9.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst10.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst11.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst12.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst13.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst14.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst15.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst16.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst17.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst18.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst19.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst20.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst21.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst22.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst23.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}" loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram section section -->



@endsection
