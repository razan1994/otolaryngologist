@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@if ($treatments->currentPage() == 1)
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
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Treatments" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments" hreflang="en-jo" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات" hreflang="ar-jo" />
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/العلاجات" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات" hreflang="ar-jo" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments" hreflang="en-jo" />
        @endif
    @endsection
@else
    @section('page_title')
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} -
        {{ 'page=' . $treatments->currentPage() }}
    @endsection
    @section('meta_title')
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} -
        {{ 'page=' . $treatments->currentPage() }}
    @endsection
    @section('meta_desc')
        {{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} -
        {{ 'page=' . $treatments->currentPage() }}
    @endsection
    @section('meta_keywords')
        {{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }} -
        {{ 'page=' . $treatments->currentPage() }}
    @endsection


    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical"
                href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}" />
            <link rel="alternate"
                href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}"
                hreflang="en-jo" />
            <link rel="alternate"
                href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}"
                hreflang="ar-jo" />
        @else
            <link rel="canonical"
                href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}" />
            <link rel="alternate"
                href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}"
                hreflang="ar-jo" />
            <link rel="alternate"
                href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}"
                hreflang="en-jo" />
        @endif
    @endsection
@endif


@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection


<style>
    .custom-row-spacing {
        margin-bottom: 20px;
    }

    .wrapper {
    position: relative;
    height: 500px;
    width: 750px;
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

.wrapper .images .img-1,
.wrapper .images .img-2 {
    height: 100%;
    width: 100%;
    background-size: cover;
    background-position: center;
}

.wrapper .images .img-2 {
    position: absolute;
    width: 50%;
}

.wrapper .slider {
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 99;
}

.wrapper .slider input {
    width: 100%;
    outline: none;
    background: none;
    -webkit-appearance: none;
}

.slider input::-webkit-slider-thumb {
    height: 486px;
    width: 3px;
    background: none;
    -webkit-appearance: none;
    cursor: col-resize;
}

.slider .drag-line {
    width: 3px;
    height: 486px;
    position: absolute;
    left: 50%;
    pointer-events: none;
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


    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.nav_Treatments') }}</li>
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
                        <img src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}"
                            alt="">
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

                            <p>{{ __('front_end.ourTreatments_Treatments1') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

    <!-- Start Treatment section section -->
    @if (isset($treatments) && $treatments->count() > 0)
        <div class="newest-product-section mb-110">
            <div class="container">
                <div class="row">
                    @foreach ($treatments as $treatment)
                        <div class="col-sm mb-20">
                            <div class="product-card-group">
                                <div class="product-card hover-btn">
                                    <div class="product-card-img double-img">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            @if (isset($treatment->image) && file_exists($treatment->image))
                                                <img src="{{ asset($treatment->image) }}" alt="" class="img1">
                                                <img src="{{ asset($treatment->image) }}" alt="" class="img2">
                                            @endif
                                        </a>
                                        <div class="overlay">
                                            <div class="cart-area">
                                                <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"
                                                    class="hover-btn3 add-cart-btn">
                                                    <i class="bi bi-check"></i>{{ __('front_end.btn_ReadMore') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card-content">
                                        <h6>
                                            <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"
                                                class="read-mor">
                                                {{ Str::limit($treatment->title, 20) }}
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
    <!-- End Newest Product section section -->


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
