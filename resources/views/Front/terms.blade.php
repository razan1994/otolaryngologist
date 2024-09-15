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
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Terms-and-Conditions" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Terms-and-Conditions" hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الشروط-و-الاحكام" hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/الشروط-و-الاحكام" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الشروط-و-الاحكام" hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Terms-and-Conditions" hreflang="en-jo" />
    @endif
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
                    <li class="breadcrumb-item active" aria-current="page">{!! $term_and_conditions->TermAndConditionTitle !!}</li>
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
                            <img alt="الدكتور أنس أبو شملة -  اختصاصي أنف وأذن وحنجرة معتمد في الأردن, استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن, أفضل جراح أنف وأذن وحنجرة في الأردن
Dr. Anas Abu Shamleh - A certified Ear, Nose, and Throat (ENT) specialist in Jordan, consultant for endoscopic surgeries of the nose, ears, and throat, as well as rhinoplasty. He is an expert in treating ear, nose, and throat diseases, a member of the Jordanian Surgeons Association and the Jordan Medical Association. He is considered one of the best ENT doctors in Amman, Jordan, and a leading ENT surgeon in Jordan" src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}" >

                        </div>
                    </div>
                </div>
            </div>


            <!-- Start About Us Content Section section -->
            <div class="about-us-content">
                <div class="container">
                    <div class="row">
                        <div class="section-title2 style-2">
                            <h3>{!! $term_and_conditions->TermAndConditionTitle !!}</h3>
                        </div>
                        <div class="col-lg-12">
                            <div class="about-us-wrapper">
                                <p><strong>{{ __('front_end.terms_subTitle') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End About Us Content Section section -->
        </div>
        <!-- End About Us Banner Section -->



    <!-- Start About Us Banner Section -->
    <div class="about-us-banner mt-40 mb-110">
        <!-- Start About Us Content Section section -->
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-us-wrapper">

                            <p>{!! $term_and_conditions->TermAndConditionTitle !!}</p>
                            <p>{!! $term_and_conditions->TermAndConditionDes !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

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
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst3.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst4.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst5.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst6.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst7.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst8.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst9.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst10.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst11.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst12.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst13.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst14.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst15.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst16.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst17.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst18.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst19.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst20.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst21.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst22.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst23.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="https://www.instagram.com/"><img
                                        src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
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
