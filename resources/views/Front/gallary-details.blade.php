@extends('front_end_inners.app_front_end')


{{-- SEO SECTION --}}
@section('page_title')
    {{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}
@endsection
@section('meta_title')
    {{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}
@endsection
@section('meta_desc')
    {{ isset($news_blog->meta_desc) ? $news_blog->meta_desc : 'Undefined' }}
@endsection
@section('meta_keywords')
    {{ isset($news_blog->keywords) ? $news_blog->keywords : 'Undefined' }}
@endsection
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After/{{ $news_blog->alias_name_en }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After/{{ $news_blog->alias_name_en }}"
            hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{ $news_blog->alias_name_ar }}"
            hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{ $news_blog->alias_name_ar }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{ $news_blog->alias_name_ar }}"
            hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After/{{ $news_blog->alias_name_en }}"
            hreflang="en-jo" />
    @endif
@endsection


<style>
    .wrapper {
        position: relative;
        height: 500px;
        width: 100%;
        max-width: 750px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrapper .images {
        height: 100%;
        width: 100%;
        display: flex;
    }

    .wrapper .images .img-1,
    .wrapper .images .img-2 {
        height: 100%;
        width: 100%;
        background-size: cover;
    }

    .wrapper .images .img-2 {
        position: absolute;
        width: 50%;
        overflow: hidden;
    }

    .wrapper .slider {
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 10;
    }

    .wrapper .slider input[type="range"] {
        width: 100%;
        outline: none;
        background: none;
        appearance: none;
        position: relative;
        z-index: 5;
    }

    .wrapper .slider input[type="range"]::-webkit-slider-thumb {
        height: 500px;
        width: 3px;
        background: none;
        appearance: none;
        cursor: col-resize;
    }

    .slider .drag-line {
        width: 3px;
        height: 500px;
        position: absolute;
        left: 60%;
        pointer-events: none;
        z-index: 1;
    }

    .slider .drag-line::before,
    .slider .drag-line::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 500px;
        background: #fff;
    }

    .slider .drag-line::before {
        top: 0;
    }

    .slider .drag-line::after {
        bottom: 0;
    }

    .slider .drag-line span {
        height: 42px;
        width: 42px;
        border: 3px solid #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .slider .drag-line span::before,
    .slider .drag-line span::after {
        position: absolute;
        content: "";
        top: 50%;
        border: 10px solid transparent;
        border-bottom-width: 0px;
        border-right-width: 0px;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .slider .drag-line span::before {
        left: 40%;
        border-left-color: #fff;
    }

    .slider .drag-line span::after {
        left: 60%;
        border-top-color: #fff;
    }

    /* Styles for before and after labels */
    .label-before,
    .label-after {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        font-weight: bold;
        color: #000;
        background: #fff;
        padding: 5px;
        border-radius: 3px;
    }

    .label-before {
        left: 10px;
    }

    .label-after {
        right: 10px;
    }

    .blog-masonary-section {
        display: flex;

    }

    /* Mobile Styles */
    @media (max-width: 768px) {
        .wrapper {
            position: relative;
            height: 300px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            background: #443838;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper .images {
            height: 100%;
            width: 100%;
            display: flex;
        }

        .wrapper .images .img-1,
        .wrapper .images .img-2 {
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        .wrapper .images .img-2 {
            position: absolute;
            width: 50%;
            overflow: hidden;
        }

        .wrapper .slider {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }


        .wrapper .slider input[type="range"]::-webkit-slider-thumb {
            height: 300px;
        }

        .slider .drag-line {
            height: 300px;
        }

        .slider .drag-line::before,
        .slider .drag-line::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 500px;
            background: #fff;
        }

        .slider .drag-line::before {
            top: 0;
        }

        .slider .drag-line::after {
            bottom: 0;
        }

        .slider .drag-line span {
            height: 42px;
            width: 42px;
            border: 3px solid #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .slider .drag-line span::before,
        .slider .drag-line span::after {
            position: absolute;
            content: "";
            top: 50%;
            border: 10px solid transparent;
            border-bottom-width: 0px;
            border-right-width: 0px;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .slider .drag-line span::before {
            left: 40%;
            border-left-color: #fff;
        }

        .slider .drag-line span::after {
            left: 60%;
            border-top-color: #fff;
        }

        .label-before,
        .label-after {
            font-size: 12px;
            /* Smaller font size for labels */
            padding: 3px;
            /* Adjust padding for smaller screens */
        }
    }

    /* Extra Small Screens */
    @media (max-width: 480px) {
        .wrapper {
            position: relative;
            height: 200px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper .images {
            height: 100%;
            width: 100%;
            display: flex;
        }

        .wrapper .images .img-1,
        .wrapper .images .img-2 {
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        .wrapper .images .img-2 {
            position: absolute;
            width: 50%;
            overflow: hidden;
        }

        .wrapper .slider {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .wrapper .slider input[type="range"]::-webkit-slider-thumb {
            height: 200px;
        }

        .slider .drag-line {
            height: 200px;
        }

        ..slider .drag-line::before,
        .slider .drag-line::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 500px;
            background: #fff;
        }

        .slider .drag-line::before {
            top: 0;
        }

        .slider .drag-line::after {
            bottom: 0;
        }

        .slider .drag-line span {
            height: 42px;
            width: 42px;
            border: 3px solid #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .slider .drag-line span::before,
        .slider .drag-line span::after {
            position: absolute;
            content: "";
            top: 50%;
            border: 10px solid transparent;
            border-bottom-width: 0px;
            border-right-width: 0px;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .slider .drag-line span::before {
            left: 40%;
            border-left-color: #fff;
        }

        .slider .drag-line span::after {
            left: 60%;
            border-top-color: #fff;
        }

        .label-before,
        .label-after {
            font-size: 10px;
            padding: 2px;
        }
    }
</style>

@section('content')
@section('h1_val')
    {{ $news_blog?->h1_val }}
@endsection
@section('h2_val')
    {{ $news_blog?->h2_val }}
@endsection


<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"> {{ __('front_end.nav_home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $news_blog->title !!}</li>
            </ol>
        </nav>
    </div>
</div>


<!-- Start About Us Banner Section -->
<div class="about-us-banner mt-40  mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-us-thumb hover-img mb-60">
                    <img alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف في عمان الأردن, قبل وبعد عملية تجميل الأنف, نتائج قبل وبعد, صور قبل وبعد العلاج
, نتائج العلاج قبل وبعد, قبل وبعد النتائج الطبيةصور تجميل الأنف قبل وبعد العملية, Dr. Anas Abu Shamleh Clinic, comprehensive services in ear, nose, and throat, the best ENT consultant for endoscopic sinus surgery and rhinoplasty in Amman, Jordan, before and after rhinoplasty, results before and after, before and after treatment photos, treatment results before and after, before and after medical results, rhinoplasty photos before and after the procedure"
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
                    <h3>{{ $news_blog->title }}</h3>
                </div>
                <div class="col-lg-12">
                    <div class="about-us-wrapper">
                        <p><strong>{{ __('front_end.Before&After_subTitle') }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us Content Section section -->
</div>
<!-- End About Us Banner Section -->

<!-- Start Before & After section -->
<div class="blog-details-section mt-40 mb-110">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-8">
                <div class="blog-thumb">
                    <div dir="{{ App::isLocale('ar') ? 'ltr' : 'ltr' }}" style="border: none" class="article-card">
                        <div style="padding: 0px" class="article-card-content style-3">
                            <div class="wrapper">
                                <!-- Labels for before and after -->
                                <div class="label-before">Before</div>
                                <div class="label-after">After</div>

                                <div class="images">
                                    @if (isset($news_blog->image_before) &&
                                            isset($news_blog->image_after) &&
                                            file_exists(public_path($news_blog->image_before)) &&
                                            file_exists(public_path($news_blog->image_after)))
                                        <div class="img-1"
                                            style="background-image: url('{{ asset($news_blog->image_after) }}');" >
                                        </div>
                                        <div class="img-2"
                                            style="background-image: url('{{ asset($news_blog->image_before) }}');">
                                        </div>
                                    @endif
                                </div>
                                <div class="slider">
                                    <div class="drag-line">
                                        <span></span>
                                    </div>
                                    <input type="range" min="0" max="100" value="50">
                                </div>
                            </div>

                            <div dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="blog-content mb-40">
                                <p> {!! $news_blog->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="shop-widget mb-30">
                        <h5 class="shop-widget-title">{{ __('front_end.Recent_Before_&_After') }}</h5>

                        @foreach ($recent_photos as $photo)
                            <div class="recent-post-widget mb-20">
                                <div class="recent-post-img">
                                    <a href="{{ route('gallery-details', $photo->alias_name) }}">
                                        <img src="{{ asset($photo->image_after) }}" loading="lazy" alt=" {{ $photo->alt }}">
                                    </a>
                                </div>
                                <div class="recent-post-content">
                                    <a href="{{ route('gallery-details', $photo->alias_name) }}">
                                        {{ $photo->created_at->format('d F, Y') }}
                                    </a>
                                    <h6>
                                        <a href="{{ route('gallery-details', $photo->alias_name) }}">
                                            {{ $photo->title }}
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
<!-- End Before & After section -->



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
                        <div class="swiper instagram-slider">
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
<script>
    document.querySelectorAll('.wrapper').forEach(wrapper => {
        const range = wrapper.querySelector('input[type="range"]');
        const img2 = wrapper.querySelector('.img-2');
        const dragLine = wrapper.querySelector('.drag-line');

        range.addEventListener('input', () => {
            const value = range.value;
            img2.style.width = `${value}%`;
            dragLine.style.left = `${value}%`;
        });

        const initialValue = range.value;
        img2.style.width = `${initialValue}%`;
        dragLine.style.left = `${initialValue}%`;
    });
</script>
@endsection
