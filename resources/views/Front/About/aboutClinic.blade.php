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
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Our-Clinic" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Our-Clinic" hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/عيادتنا" hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/عيادتنا" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/عيادتنا" hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Our-Clinic" hreflang="en-jo" />
    @endif
@endsection



@section('content')

@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection



<!-- Start Breadcrumb Section -->
<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.nav_Clinic') }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb section -->

<!-- Start About Clinic Section -->
<div class="about-us-banner mt-40  mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-us-thumb hover-img mb-60">
                    <img src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}"
                        alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل اختصاصي أنف وأذن وحنجرة في عمان الأردن, جراحة الأنف والجيوب الأنفية في عمان, تقنيات متقدمة في طب الأنف والأذن والحنجرة, أمراض وعلاجات الأنف والأذن والحنجرة, أفضل عيادة أنف وأذن وحنجرة في عمان الأردن, رعاية ENT موثوقة في عمان,Dr. Anas Abu Shamla Clinic, Comprehensive Ear, Nose and Throat Services, Best ENT Specialist in Amman Jordan, Nose and Sinus Surgery in Amman, Advanced Otorhinolaryngology Techniques, Ear, Nose and Throat Diseases and Treatments, Best ENT Clinic in Amman Jordan, Reliable ENT Care in Amman">
                </div>
            </div>
        </div>
    </div>

    <!-- Start About Us Content Section section -->
    <div class="about-us-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-us-wrapper">
                        <div class="section-title2 style-2">
                            <h3>{{ __('front_end.home_AboutClinic') }}</h3>
                        </div>
                        <p>{!! $about->AboutUsClinic !!}</p>
                        <div class="section-title2 style-2">
                            <h3>{{ __('front_end.OurClinic_Ourvision') }}</h3>
                        </div>
                        <p>{!! $about->vision !!}</p>
                        <div class="section-title2 style-2">
                            <h3>{{ __('front_end.OurClinic_OurMission') }}</h3>
                        </div>
                        <p>{!! $about->mission !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us Content section -->
</div>
<!-- End About Clinic Section -->

<!-- Start Instagram section section -->
<div class="instagram-section mb-110">
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
                                        src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                        alt=""></a>
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
