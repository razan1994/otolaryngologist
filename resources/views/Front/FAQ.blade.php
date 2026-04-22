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
        $enUrl = 'https://www.otolaryngologist-jo.com/en/FAQ';
        $arUrl = 'https://www.otolaryngologist-jo.com/ar/الاسئلة-المقترحة';
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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.FAQ_FAQGet') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->


    <!-- Start About Us Banner Section -->
    <div class="about-us-banner mt-40 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-thumb hover-img mb-60">
                        <img alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف في عمان الأردن, توضيحات حول خدماتنا في عيادة الدكتور أنس ابوشملة أسئلة متكررة حول , خدماتنا, توضيحات حول خدماتنا, الأسئلة المتكررةDr. Anas Abu Shamleh Clinic, comprehensive services in ear, nose, and throat, the best consultant for ear, nose, and throat surgery, endoscopic sinus surgery, and rhinoplasty in Amman, Jordan, explanations about our services at Dr. Anas Abu Shamleh Clinic, frequently asked questions about our services, clarifications about our services, frequently asked questions"
                            src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}">

                    </div>
                </div>
            </div>
        </div>


        <!-- Start About Us Content Section section -->
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="section-title2 style-2">
                        <h3>{{ __('front_end.FAQ_FAQGet') }}</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="about-us-wrapper">
                            <p><strong>{{ __('front_end.FAQ_subTitle') }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

    @if (isset($faqs) && $faqs->count() > 0)
        <!-- Start Faq section -->
        <div class="faq-section mt-40 mb-110">
            <div class="container">
                <div class="faq-title">

                    <p>{{ __('front_end.FAQ_FAQGet') }}</p>
                    </h1>
                </div>
                <div class="row g-4 mt-40 mb-110">

                    <div class="col-lg-10">
                        <div class="faq-content">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                {!! $faq->title !!} </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- End Faq section -->
    @endif


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
