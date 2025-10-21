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


@section('h1_val')
    {{ $news_blog?->h1_val }}
@endsection
@section('h2_val')
    {{ $news_blog?->h2_val }}
@endsection

<style>
    /* Premium Modern Before & After Showcase */
    .premium-showcase-wrapper {
        position: relative;
        /* width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px; */
    }

    .showcase-container {
        position: relative;
        /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 25px; */
        padding: 8px;
        /* box-shadow:
            0 25px 50px rgba(102, 126, 234, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2); */
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
    }

    .showcase-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f093fb, #f5576c); */
        background-size: 300% 300%;
        /* border-radius: 25px; */
        opacity: 0;
        animation: premiumGradient 6s ease-in-out infinite;
        z-index: -1;
    }

    .showcase-container:hover {
        transform: translateY(-8px) scale(1.02);
        /* box-shadow:
            0 35px 80px rgba(102, 126, 234, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3); */
    }

    .showcase-container:hover::before {
        opacity: 1;
    }

    .image-frame {
        position: relative;
        height: 500px;
        /* border-radius: 18px; */
        overflow: hidden;
        background: #000;
    }

    .before-image-layer,
    .after-image-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .before-image-layer {
        z-index: 1;
    }

    .after-image-layer {
        z-index: 2;
        clip-path: circle(0% at 50% 50%);
        animation: circularReveal 6s infinite ease-in-out;
    }

    .morphing-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: radial-gradient(circle at center, transparent 30%, rgba(255, 255, 255, 0.1) 70%); */
        z-index: 3;
        opacity: 0;
        animation: morphingPulse 6s infinite ease-in-out;
    }

    .sparkle-effect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 4;
        pointer-events: none;
    }

    .sparkle-effect::before,
    .sparkle-effect::after {
        content: '✨';
        position: absolute;
        color: rgba(255, 255, 255, 0.8);
        font-size: 20px;
        animation: sparkleFloat 4s infinite ease-in-out;
    }

    .sparkle-effect::before {
        top: 20%;
        left: 15%;
        animation-delay: -1s;
    }

    .sparkle-effect::after {
        top: 70%;
        right: 20%;
        animation-delay: -3s;
    }

    .floating-badges {
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        display: flex;
        justify-content: space-between;
        z-index: 5;
    }

    .badge-item {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .badge-text {
        color: #333;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .before-badge {
        background: #ff6b6b;
        color: white;
        animation: floatBadgeBefore 6s infinite ease-in-out;
    }

    .after-badge {
        background: #4ecdc4;
        color: white;
        animation: floatBadgeAfter 6s infinite ease-in-out;
    }

    .before-badge .badge-text {
        color: white;
    }

    .after-badge .badge-text {
        color: white;
    }

    .badge-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .timeline-indicator {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 60px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.1), transparent);
        display: flex;
        align-items: center;
        padding: 0 30px;
        z-index: 5;
    }

    .timeline-track {
        position: relative;
        width: 100%;
        height: 6px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
        overflow: hidden;
    }

    .timeline-progress {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(90deg, #42aeb9, #42aeb9);
        border-radius: 3px;
        width: 0%;
        animation: timelineProgress 6s infinite ease-in-out;
    }

    .timeline-thumb {
        position: absolute;
        top: -6px;
        left: 0;
        width: 18px;
        height: 18px;
        background: linear-gradient(45deg, #42aeb9, #42aeb9);
        border: 3px solid white;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        animation: timelineThumb 6s infinite ease-in-out;
    }

    /* Premium Keyframe Animations */
    @keyframes premiumGradient {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    @keyframes circularReveal {
        0% {
            clip-path: circle(0% at 50% 50%);
        }

        15% {
            clip-path: circle(0% at 50% 50%);
        }

        50% {
            clip-path: circle(70% at 50% 50%);
        }

        85% {
            clip-path: circle(70% at 50% 50%);
        }

        100% {
            clip-path: circle(0% at 50% 50%);
        }
    }

    @keyframes morphingPulse {

        0%,
        100% {
            opacity: 0;
            transform: scale(1);
        }

        25% {
            opacity: 0.3;
            transform: scale(1.05);
        }

        50% {
            opacity: 0.6;
            transform: scale(1.1);
        }

        75% {
            opacity: 0.3;
            transform: scale(1.05);
        }
    }

    @keyframes sparkleFloat {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0;
        }

        25% {
            transform: translateY(-10px) rotate(90deg);
            opacity: 1;
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.8;
        }

        75% {
            transform: translateY(-10px) rotate(270deg);
            opacity: 1;
        }
    }

    @keyframes floatBadgeBefore {
        0% {
            opacity: 1;
            transform: translateY(0px);
        }

        25% {
            opacity: 1;
            transform: translateY(0px);
        }

        50% {
            opacity: 0;
            transform: translateY(-20px);
        }

        75% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0px);
        }
    }

    @keyframes floatBadgeAfter {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        25% {
            opacity: 1;
            transform: translateY(0px);
        }

        50% {
            opacity: 1;
            transform: translateY(0px);
        }

        75% {
            opacity: 1;
            transform: translateY(0px);
        }

        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }

    @keyframes timelineProgress {
        0% {
            width: 0%;
        }

        50% {
            width: 100%;
        }

        100% {
            width: 0%;
        }
    }

    @keyframes timelineThumb {
        0% {
            left: 0%;
            transform: scale(1);
        }

        25% {
            transform: scale(1.2);
        }

        50% {
            left: calc(100% - 18px);
            transform: scale(1);
        }

        75% {
            transform: scale(1.2);
        }

        100% {
            left: 0%;
            transform: scale(1);
        }
    }



    /* Premium Mobile Responsive */
    @media (max-width: 768px) {
        /* .premium-showcase-wrapper {
            padding: 15px;
            max-width: 450px;
        } */

        .showcase-container {
            border-radius: 20px;
            padding: 6px;
        }

        .image-frame {
            height: 320px;
            /* border-radius: 15px; */
        }

        .floating-badges {
            top: 15px;
            left: 15px;
            right: 15px;
        }

        .badge-item {
            padding: 10px 14px;
        }

        .badge-text {
            font-size: 11px;
        }

        .timeline-indicator {
            padding: 0 20px;
            height: 50px;
        }

        .timeline-thumb {
            width: 16px;
            height: 16px;
            top: -5px;
        }
    }

    @media (max-width: 480px) {
        /* .premium-showcase-wrapper {
            padding: 10px;
            max-width: 100%;
        } */

        .showcase-container {
            border-radius: 16px;
            padding: 4px;
        }

        .image-frame {
            height: 280px;
            /* border-radius: 12px; */
        }

        .floating-badges {
            top: 12px;
            left: 12px;
            right: 12px;
        }

        .badge-item {
            padding: 8px 12px;
        }

        .badge-icon {
            width: 14px;
            height: 14px;
        }

        .badge-text {
            font-size: 10px;
        }

        .timeline-indicator {
            padding: 0 15px;
            height: 45px;
        }

        .timeline-thumb {
            width: 14px;
            height: 14px;
            top: -4px;
        }

        .sparkle-effect::before,
        .sparkle-effect::after {
            font-size: 16px;
        }
    }

    /* Pause animations on hover */
    .premium-showcase-wrapper:hover .after-image-layer,
    .premium-showcase-wrapper:hover .morphing-overlay,
    .premium-showcase-wrapper:hover .before-badge,
    .premium-showcase-wrapper:hover .after-badge,
    .premium-showcase-wrapper:hover .timeline-progress,
    .premium-showcase-wrapper:hover .timeline-thumb,
    .premium-showcase-wrapper:hover .sparkle-effect::before,
    .premium-showcase-wrapper:hover .sparkle-effect::after {
        animation-play-state: paused;
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

                    <div class="premium-showcase-wrapper">
                        <div class="showcase-container">
                            <div class="image-frame">
                                @if (isset($news_blog->image_before) &&
                                        isset($news_blog->image_after) &&
                                        file_exists(public_path($news_blog->image_before)) &&
                                        file_exists(public_path($news_blog->image_after)))
                                    <div class="before-image-layer"
                                        style="background-image: url('{{ asset($news_blog->image_before) }}');">
                                    </div>
                                    <div class="after-image-layer"
                                        style="background-image: url('{{ asset($news_blog->image_after) }}');">
                                    </div>
                                @else
                                    <div class="no-image-placeholder">
                                        <p>{{ __('front_end.no_images_available') ?? 'Images not available' }}</p>
                                    </div>
                                @endif
                                <div class="morphing-overlay"></div>
                                <div class="sparkle-effect"></div>
                            </div>
                            <div class="floating-badges">
                                <div class="badge-item before-badge">
                                    <span
                                        class="badge-text">{{ Config::get('app.locale') == 'en' ? 'Before' : 'قبل' }}</span>
                                </div>
                                <div class="badge-item after-badge">
                                    <span
                                        class="badge-text">{{ Config::get('app.locale') == 'en' ? 'After' : 'بعد' }}</span>
                                </div>
                            </div>
                            <div class="timeline-indicator">
                                <div class="timeline-track">
                                    <div class="timeline-progress"></div>
                                    <div class="timeline-thumb"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="gallery-content mt-3">
                        {!! $news_blog->description !!}
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
                                        <img src="{{ asset($photo->image_after) }}" loading="lazy"
                                            alt=" {{ $photo->alt }}">
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
