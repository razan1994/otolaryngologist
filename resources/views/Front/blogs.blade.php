@extends('front_end_inners.app_front_end')
@if($blogs->currentPage() == 1)
    {{-- SEO SECTION --}}
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection
    {{-- SEO SECTION --}}



    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/blogs" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/مقالة-طبية" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs" hreflang="en-jo"/>
        @endif
    @endsection
@else
    {{-- SEO SECTION --}}
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $blogs->currentPage() }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $blogs->currentPage() }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} - {{ 'page=' . $blogs->currentPage() }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection
    {{-- SEO SECTION --}}



    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/blogs?{{ 'page=' . $blogs->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs?{{ 'page=' . $blogs->currentPage() }}" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية?{{ 'page=' . $blogs->currentPage() }}" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/مقالة-طبية?{{ 'page=' . $blogs->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية?{{ 'page=' . $blogs->currentPage() }}" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs?{{ 'page=' . $blogs->currentPage() }}" hreflang="en-jo"/>
        @endif
    @endsection
@endif


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
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.footer_Blogs') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->

    <!-- Start Blog Standard Left Sidebar section -->
    <div class="blog-standard-left-sidebar-section mt-40 mb-40">
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
                        @if (isset($blogs) && $blogs->count() > 0)
                            <div class="shop-widget">
                                <h5 class="shop-widget-title">{{ __('front_end.Tags') }}</h5>
                                <ul class="tag-list">

                                        <li>
                                            <a href="#">الدكتور أنس ابوشملة</a>
                                        </li>
                                        <li>
                                            <a href="#"> اختصاصي الأنف والأذن والحنجرة</a>
                                        </li>
                                        <li>
                                            <a href="#">مقالات طبية</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                نصائح طبية
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                معلومات طبية
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                مقالات طبية متخصصة
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                صحة الأذن والأنف والحنجرة
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        @endif
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


@endsection
