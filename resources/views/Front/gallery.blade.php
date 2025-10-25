@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title')
    @if ($photos->currentPage() == 1)
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}
    @else
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ __('front_end.page') }} {{ $photos->currentPage() }}
    @endif
@endsection

@section('meta_title')
    @if ($photos->currentPage() == 1)
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}
    @else
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ __('front_end.page') }} {{ $photos->currentPage() }}
    @endif
@endsection

@section('meta_desc')
    @if ($photos->currentPage() == 1)
        {{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}
    @else
        {{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} - {{ __('front_end.page') }} {{ $photos->currentPage() }}
    @endif
@endsection

@section('meta_keywords')
    {{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}
@endsection

@section('canonical')
    @if ($photos->currentPage() == 1)
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="en" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="x-default" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" hreflang="ar" />
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" hreflang="ar" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="en" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="x-default" />
        @endif
    @else
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After?page={{ $photos->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?page={{ $photos->currentPage() }}" hreflang="en" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?page={{ $photos->currentPage() }}" hreflang="x-default" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?page={{ $photos->currentPage() }}" hreflang="ar" />
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?page={{ $photos->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?page={{ $photos->currentPage() }}" hreflang="ar" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?page={{ $photos->currentPage() }}" hreflang="en" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?page={{ $photos->currentPage() }}" hreflang="x-default" />
        @endif
    @endif
@endsection


@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection

<style>
    /* Premium Modern Before & After Showcase */
    .premium-showcase-wrapper {
        position: relative;
        width: 100%;
        max-width: 100%;
        margin: 0 auto 10px;
        padding: 20px;
    }

    .showcase-container {
        position: relative;
        padding: 8px;
        overflow: hidden;
    }

    .showcase-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-size: 300% 300%;
        opacity: 0;
        animation: premiumGradient 6s ease-in-out infinite;
        z-index: -1;
    }

    .showcase-container:hover {
        transform: translateY(-8px) scale(1.02);
    }

    .showcase-container:hover::before {
        opacity: 1;
    }

    .image-frame {
        position: relative;
        height: 400px;
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
        background: rgba(255, 255, 255, 0.8);
        ;
        color: black;
        animation: floatBadgeBefore 6s infinite ease-in-out;
    }

    .after-badge {
        background: rgba(255, 255, 255, 0.8);
        ;
        color: black;
        animation: floatBadgeAfter 6s infinite ease-in-out;
    }

    .before-badge .badge-text {
        color: black;
    }

    .after-badge .badge-text {
        color: black;
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

        40% {
            clip-path: circle(0% at 50% 50%);
        }

        50% {
            clip-path: circle(70% at 50% 50%);
        }

        90% {
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

        40% {
            opacity: 1;
            transform: translateY(0px);
        }

        50% {
            opacity: 0;
            transform: translateY(-20px);
        }

        90% {
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

        40% {
            opacity: 0;
            transform: translateY(-20px);
        }

        50% {
            opacity: 1;
            transform: translateY(0px);
        }

        90% {
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
        .premium-showcase-wrapper {
            padding: 15px;
            max-width: 100%;
            margin-bottom: 20px;
        }

        .showcase-container {
            padding: 6px;
        }

        .image-frame {
            height: 350px;
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
        .premium-showcase-wrapper {
            padding: 10px;
            max-width: 100%;
            margin-bottom: 15px;
        }

        .showcase-container {
            padding: 4px;
        }

        .image-frame {
            height: 300px;
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

    /* Gallery Content Styles */
    .gallery-content {
        text-align: center;
        padding: 15px 10px;
    }

    .gallery-title {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        line-height: 1.4;
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: #fff;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        padding: 10px 20px;
        border-radius: 25px;
        background: linear-gradient(135deg, #42aeb9 0%, #369aa5 100%);
        box-shadow: 0 4px 15px rgba(66, 174, 185, 0.3);
    }

    .gallery-read-more:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(66, 174, 185, 0.4);
        background: linear-gradient(135deg, #369aa5 0%, #2d8a94 100%);
    }

    .gallery-read-more span {
        margin: 0;
        font-weight: 600;
    }

    .gallery-read-more svg {
        width: 20px;
        height: 10px;
        fill: currentColor;
        transition: transform 0.3s ease;
    }

    .gallery-read-more:hover svg {
        transform: translateX(5px);
    }

    .no-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #6c757d;
        text-align: center;
        font-size: 14px;
        font-weight: 500;
        border-radius: 15px;
    }

    .no-image-placeholder p {
        margin: 0;
        padding: 20px;
    }
</style>

@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.BeforeandAfter') }}</li>
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
                        <h3>{{ __('front_end.BeforeandAfter') }}</h3>
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

    <!-- Start Blog Grid Left Sidebar section -->
    <div dir="{{ App::isLocale('ar') ? 'ltr' : 'ltr' }}" class="blog-masonary-section mt-40 mb-110">
        <div class="container-xl container-fluid">
            <div class="blog-masonary mb-80">
                <div class="row justify-content-center g-4 mb-50">
                    @foreach ($photos as $photo)
                        <div class="col-lg-4 col-sm-10">
                            <div class="premium-showcase-wrapper">
                                <div class="showcase-container">
                                    <div class="image-frame">
                                        <div class="before-image-layer"
                                            style="background-image: url('{{ asset($photo->image_before) }}');">
                                        </div>
                                        <div class="after-image-layer"
                                            style="background-image: url('{{ asset($photo->image_after) }}');">
                                        </div>
                                        <div class="morphing-overlay"></div>
                                        <div class="sparkle-effect"></div>
                                    </div>
                                    <div class="floating-badges">
                                        @if (Config::get('app.locale') == 'en')
                                            <div class="badge-item before-badge">
                                                <span class="badge-text">Before</span>
                                            </div>
                                            <div class="badge-item after-badge">
                                                <span class="badge-text">After</span>
                                            </div>
                                        @else
                                            <div class="badge-item after-badge">
                                                <span class="badge-text">بعد</span>
                                            </div>
                                            <div class="badge-item before-badge">
                                                <span class="badge-text">قبل</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="timeline-indicator">
                                        <div class="timeline-track">
                                            <div class="timeline-progress"></div>
                                            <div class="timeline-thumb"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-content mt-3">
                                <h6 dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="gallery-title">
                                    {{ Str::limit($photo->title ?? '', 80) }}
                                </h6>
                                <a href="{{ route('gallery-details', $photo->alias_name ?? '') }}"
                                    dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="gallery-read-more">
                                    <span>{{ __('front_end.btn_ReadMore') }}</span>
                                    <svg width="33" height="13" viewBox="0 0 33 13"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
                                        <path
                                            d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav class="shop-pagination">
                    {{ $photos->links('vendor.pagination.custom') }}
                </nav>
            </div>
        </div>
    </div>
    <!-- End Blog Grid Left Sidebar section -->



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
