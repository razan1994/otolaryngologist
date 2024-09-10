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
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/blogs/{{ $news_blog->alias_name_en }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs/{{ $news_blog->alias_name_en }}"
            hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{ $news_blog->alias_name_ar }}"
            hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{ $news_blog->alias_name_ar }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{ $news_blog->alias_name_ar }}"
            hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs/{{ $news_blog->alias_name_en }}"
            hreflang="en-jo" />
    @endif
@endsection


@section('h1_val')
    {{ $news_blog?->h1_val }}
@endsection
@section('h2_val')
    {{ $news_blog?->h2_val }}
@endsection

@section('content')


    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{!! $news_blog->title !!}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->

    <!-- Start Blog Details section -->
    <div class="blog-details-section mt-40 mb-40">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <div class="blog-thumb">
                        <img src="{{ asset($news_blog->image) }}" alt="Blog Thumbnail">
                        <p>{!! \Carbon\Carbon::parse($news_blog->created_at)->translatedFormat('j F Y') !!}</p>
                    </div>

                    <div class="blog-content">
                        <h4>{!! $news_blog->title !!}</h4>
                        <p>{!! $news_blog->description !!}</p>
                    </div>
                </div>

                <div class="col-lg-4">
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
                                                {{ $recentBlog->title }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                            <div class="shop-widget">
                                <h5 class="shop-widget-title">{{ __('front_end.Tags') }}</h5>
                                <ul>

                                        <li>
                                            <a style="color: #000" href="#">{{$news_blog->tags }}</a>
                                        </li>

                                </ul>
                            </div>

                    </div>
                </div>
            </div>
            <div class="row mb-110">
                <div class="col-lg-12">
                    <div class="blog-details-navigation">
                        <!-- Previous Blog Navigation -->
                        @if($previous_blog)
                            <div class="single-navigation">
                                <div class="content">
                                    <a href="{{ route('blog-details', ['aliasname' => $previous_blog->alias_name_en]) }}">{{ __('front_end.Previous') }} </a>
                                    <h4><a href="{{ route('blog-details', ['aliasname' => $previous_blog->alias_name_en]) }}">{{ $previous_blog->title }}</a></h4>
                                </div>
                                <a href="{{ route('blog-details', ['aliasname' => $previous_blog->alias_name_en]) }}" class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 17.4854L1.51472 9.00007M1.51472 9.00007L10 0.514789M1.51472 9.00007L17.4246 9.35362" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        <!-- Next Blog Navigation -->
                        @if($next_blog)
                            <div class="single-navigation two">
                                <a href="{{ route('blog-details', ['aliasname' => $next_blog->alias_name_en]) }}" class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0.514648L16.4853 8.99993M16.4853 8.99993L8 17.4852M16.4853 8.99993L0.575379 8.64638" />
                                    </svg>
                                </a>
                                <div class="content">
                                    <a href="{{ route('blog-details', ['aliasname' => $next_blog->alias_name_en]) }}"> {{ __('front_end.NEXT') }}</a>
                                    <h4><a href="{{ route('blog-details', ['aliasname' => $next_blog->alias_name_en]) }}">{{ $next_blog->title }}</a></h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Blog Details section -->



@endsection
