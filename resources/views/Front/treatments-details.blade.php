@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title'){{ isset($treats->seo_title) ? $treats->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($treats->seo_title) ? $treats->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($treats->meta_desc) ? $treats->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($treats->keywords) ? $treats->keywords : 'Undefined' }}@endsection
@section('content')
    {{-- SEO SECTION --}}


@section('canonical')
    @php
        $enUrl = 'https://www.otolaryngologist-jo.com/en/our-Treatments/' . $treats->alias_name_en;
        $arUrl = 'https://www.otolaryngologist-jo.com/ar/علاجاتنا/' . $treats->alias_name_ar;
        $canonicalUrl = Config::get('app.locale') == 'en' ? $enUrl : $arUrl;
    @endphp

    <link rel="canonical" href="{{ $canonicalUrl }}" />
    <link rel="alternate" href="{{ $enUrl }}" hreflang="en-JO" />
    <link rel="alternate" href="{{ $arUrl }}" hreflang="ar-JO" />
    <link rel="alternate" href="{{ $enUrl }}" hreflang="x-default" />
@endsection


@section('h1_val')
    {{ $treats?->h1_val }}
@endsection
@section('h2_val')
    {{ $treats?->h2_val }}
@endsection

@section('content')



    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{!! $treats->title !!}</li>
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
                        <img alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل اختصاصي أنف وأذن وحنجرة في عمان الأردن, مقالات طبية حول الأذن والأنف والحنجرة, الإجراءات الطبية في عيادة الدكتور أنس أبوشملة, جراحة الأنف والأذن والحنجرة في , Dr. Anas Abu Shamleh Clinic, comprehensive services in ear, nose, and throat, the best ENT specialist in Amman, Jordan, medical articles about ear, nose, and throat, medical procedures at Dr. Anas Abu Shamleh Clinic, ear, nose, and throat surgery in Amman, the best medical services for treating ear, nose, and throat, specialized treatments for ear, nose, and throat conditions عمان, فضل خدمات طبية لعلاج الأذن والأنف والحنجرة, العلاجات المتخصصة لحالات الأذن والأنف والحنجرة"
                            src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </div>


        <!-- Start About Us Content Section section -->
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="section-title2 style-2">
                        <h3>{!! $treats->title !!}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

    <!-- Start Blog Details section -->
    <div class="blog-details-section mt-40 mb-110">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">

                    <div class="blog-thumb">
                        <img src="{{ asset($treats->image) }}" alt="{!! $treats->Alt !!}" loading="lazy">
                        <a href="#">{!! \Carbon\Carbon::parse($treats->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</a>
                    </div>
                    <div class="blog-content">
                        <p>{!! $treats->description !!}</p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="shop-widget mb-30">
                            <h5 class="shop-widget-title">{{ __('front_end.treatment_Recent_Treatment') }}</h5>
                            @foreach ($recent_treatments as $treatment)
                                <div class="recent-post-widget mb-20">
                                    <div class="recent-post-img">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            <img src="{{ asset($treatment->image) }}" alt="{{ $treatment->Alt }}"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="recent-post-content">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            {{ $treatment->created_at->format('d F, Y') }}
                                        </a>
                                        <h6>
                                            <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                                {{ Config::get('app.locale') == 'en' ? Str::limit($treatment->title_en, 50) : Str::limit($treatment->title_ar, 50) }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Blog Details section -->


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
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst1.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst3.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أخصائي أنف و أذن و حنجرة و جراحة تجميل الأنف - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst4.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst5.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst6.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst7.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst8.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst9.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst10.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst11.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst12.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst13.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst14.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst15.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst16.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst17.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst18.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst19.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst20.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst21.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور تجميل أنف في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst22.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst23.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور أنف وأذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat
Specialist and Rhinoplasty Surgeon
"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            loading="lazy"
                                            alt="الدكتور أنس ابوشملة - أفضل دكتور انف واذن وجنجرة في الأردن - Dr. Anas Abu Shamleh - Ear, Nose, Throat Specialist and Rhinoplasty Surgeon"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            loading="lazy"
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
