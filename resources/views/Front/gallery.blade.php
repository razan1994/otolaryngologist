@extends('front_end_inners.app_front_end')

@if($photos->currentPage() == 1)
    {{-- SEO SECTION --}}
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection



    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After" hreflang="en-jo"/>
        @endif
    @endsection

@else
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $photos->currentPage() }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $photos->currentPage() }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} - {{ 'page=' . $photos->currentPage() }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection



    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After?{{ 'page=' . $photos->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?{{ 'page=' . $photos->currentPage() }}" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?{{ 'page=' . $photos->currentPage() }}" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?{{ 'page=' . $photos->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد?{{ 'page=' . $photos->currentPage() }}" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After?{{ 'page=' . $photos->currentPage() }}" hreflang="en-jo"/>
        @endif
    @endsection
@endif


@section('h1_val')
{{$seo_operation?->h1_val}}
@endsection
@section('h2_val')
{{$seo_operation?->h2_val}}
@endsection

<style>
    .wrapper {
        position: relative;
        height: 190px;
        width: 100%;
        /* max-width: 250px; */
        overflow: hidden;
        background: #fff;
        border: 7px solid #fff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
    }

    .wrapper .images {
        height: 100%;
        width: 100%;
        display: flex;
    }

    .wrapper .images .img-1 {
        height: 100%;
        width: 100%;
        background-size: cover;
    }

    .wrapper .images .img-2 {
        position: absolute;
        height: 100%;
        width: 50%;
        background-size: cover;
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
        z-index: 2;
    }

    .wrapper .slider input[type="range"]::-webkit-slider-thumb {
        height: 486px;
        width: 3px;
        background: none;
        appearance: none;
        cursor: col-resize;
    }

    .slider .drag-line {
        width: 3px;
        height: 190px;
        position: absolute;
        left: 50%;
        pointer-events: none;
        z-index: 5;
    }

    .slider .drag-line::before,
    .slider .drag-line::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 222px;
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
, نتائج العلاج قبل وبعد, قبل وبعد النتائج الطبيةصور تجميل الأنف قبل وبعد العملية, Dr. Anas Abu Shamleh Clinic, comprehensive services in ear, nose, and throat, the best ENT consultant for endoscopic sinus surgery and rhinoplasty in Amman, Jordan, before and after rhinoplasty, results before and after, before and after treatment photos, treatment results before and after, before and after medical results, rhinoplasty photos before and after the procedure" src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}" >

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
                    <div class="col-lg-3 col-sm-10">
                        <div style="border: none" class="article-card">
                            <div style="padding: 0px" class="article-card-content style-3">
                                <div class="wrapper">
                                    <div class="images">
                                        @if (isset($photo->image_before) &&
                                                isset($photo->image_after) &&
                                                file_exists(public_path($photo->image_before)) &&
                                                file_exists(public_path($photo->image_after)))
                                            <div class="img-1"
                                                style="background-image: url('{{ asset($photo->image_after) }}');">
                                            </div>
                                            <div class="img-2"
                                                style="background-image: url('{{ asset($photo->image_before) }}');">
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
                                <div class="article-card-content">
                                    <h6 dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">{{ Str::limit($photo->title, 80) }}</h6>
                                    <a href="{{ route('gallery-details', $photo->alias_name) }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="read-more">
                                        <p>{{ __('front_end.btn_ReadMore') }}</p>
                                    </a>
                                </div>
                            </div>
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
