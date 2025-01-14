@extends('front_end_inners.app_front_end')


@if ($blogs->currentPage() == 1)
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
        <link rel="canonical"
            href="https://otolaryngologist-jo.com/{{ Config::get('app.locale') == 'en' ? 'en/blogs' : 'ar/مقالة-طبية' }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs" hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية" hreflang="ar-jo" />
    @endsection
@else
    @section('page_title')
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - Page {{ $blogs->currentPage() }}
    @endsection
    @section('meta_title')
        {{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - Page {{ $blogs->currentPage() }}
    @endsection
    @section('meta_desc')
        {{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} - Page {{ $blogs->currentPage() }}
    @endsection
    @section('meta_keywords')
        {{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}
    @endsection
    @section('canonical')
        <link rel="canonical"
            href="https://otolaryngologist-jo.com/{{ Config::get('app.locale') == 'en' ? 'en/blogs' : 'ar/مقالة-طبية' }}?page={{ $blogs->currentPage() }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs?page={{ $blogs->currentPage() }}"
            hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية?page={{ $blogs->currentPage() }}"
            hreflang="ar-jo" />
    @endsection
@endif


@endif






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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.footer_Blogs') }}</li>
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
                        <img alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل اختصاصي أنف وأذن وحنجرة في عمان الأردن, مقالات طبية حول الأذن والأنف والحنجرة, أحدث المقالات الطبية في تخصص الأنف والأذن والحنجرة, مقالات طبية متخصصة من عيادة الدكتور أنس, مدونات طبية عن الأذن والأنف والحنجرة, Dr. Anas Abu Shamleh Clinic, comprehensive services in ear, nose, and throat, the best ENT specialist in Amman, Jordan, medical articles about ear, nose, and throat, the latest medical articles in the ENT specialty, specialized medical articles from Dr. Anas Clinic, medical blogs about ear, nose, and throat"
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
                        <h3>{{ __('front_end.footer_Blogs') }}</h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="about-us-wrapper">
                            <p><strong>{{ __('front_end.blog_subTitle') }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Us Content Section section -->
    </div>
    <!-- End About Us Banner Section -->

    <!-- Start Blog Standard Left Sidebar section -->
    <div class="blog-standard-left-sidebar-section mt-40 mb-110">
        <div class="container-md container-fluid">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="sidebar-area">
                        <div class="shop-widget mb-30">
                            <h5 class="shop-widget-title">{{ __('front_end.Recent_Post') }}</h5>

                            @foreach ($recentBlogs as $recentBlog)
                                <div class="recent-post-widget mb-20">
                                    <div class="recent-post-img">
                                        <a href="{{ route('blog-details', $recentBlog->alias_name) }}">
                                            <img src="{{ asset($recentBlog->image) }}"
                                                alt="{{ $recentBlog->alt_text_en }}">
                                        </a>
                                    </div>
                                    <div class="recent-post-content">
                                        <a href="{{ route('blog-details', $recentBlog->alias_name) }}">
                                            {{ $recentBlog->created_at->format('d F, Y') }}
                                        </a>
                                        <h6>
                                            <a href="{{ route('blog-details', $recentBlog->alias_name) }}">
                                                {{ Str::limit($recentBlog->title, 50) }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @if (isset($blogs) && $blogs->count() > 0)
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="row g-4 mb-80">
                            @foreach ($blogs as $blog)
                                <div class="col-md-12">
                                    <div class="article-card style-3">
                                        <div class="article-image">
                                            <a href="{{ route('blog-details', $blog->alias_name) }}"
                                                class="article-card-img">
                                                @if (isset($blog->image) && file_exists($blog->image))
                                                    <img src="{{ asset($blog->image) }}" alt="">
                                                @endif
                                            </a>
                                            <div class="blog-date">
                                                <a href="{{ route('blog-details', $blog->alias_name) }}">
                                                    {!! \Carbon\Carbon::parse($blog->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="article-card-content">

                                            <h5><a href="{{ route('blog-details', $blog->alias_name) }}"
                                                    class="hover-underline">
                                                    {{ Str::limit($blog->title, 60) }}
                                                </a>
                                            </h5>
                                            <p>{!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) !!}</p>
                                            <a
                                                href="{{ route('blog-details', $blog->alias_name) }}">{{ __('front_end.btn_ReadMore') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav class="shop-pagination">
                            <nav class="shop-pagination">
                                {{ $blogs->links('vendor.pagination.custom') }}
                            </nav>
                        </nav>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <!-- End Blog Standard Left Sidebar section -->


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
