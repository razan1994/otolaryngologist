@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title'){{ isset($treats->seo_title) ? $treats->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($treats->seo_title) ? $treats->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($treats->meta_desc) ? $treats->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($treats->keywords) ? $treats->keywords : 'Undefined' }}@endsection
@section('content')
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/our-Treatments/{{$treats->alias_name_en}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/our-Treatments/{{$treats->alias_name_en}}" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{$treats->alias_name_ar}}" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{$treats->alias_name_ar}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{$treats->alias_name_ar}}" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/our-Treatments/{{$treats->alias_name_en}}" hreflang="en-jo"/>
    @endif
@endsection


@section('h1_val')
{{$treats?->h1_val}}
@endsection
@section('h2_val')
{{$treats?->h2_val}}
@endsection

@section('content')



    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{!! $treats->title !!}</li>
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
                        <img src="{{ asset($treats->image) }}" alt="">
                        <a href="#">{!!  \Carbon\Carbon::parse($treats->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</a>
                   </div>
                   <div class="blog-content">
                    <h4>{!! $treats->title !!}</h4>
                    <p>{!! $treats->description !!}</p>

                   </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="shop-widget mb-30">
                            <h5 class="shop-widget-title">{{__('front_end.treatment_Recent_Treatment')}}</h5>
                            @foreach($recent_treatments as $treatment)
                                <div class="recent-post-widget mb-20">
                                    <div class="recent-post-img">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            <img src="{{ asset($treatment->image) }}" alt="{{ $treatment->title_en }}">
                                        </a>
                                    </div>
                                    <div class="recent-post-content">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            {{ $treatment->created_at->format('d F, Y') }}
                                        </a>
                                        <h6>
                                            <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                                {{ Config::get('app.locale') == 'en' ? Str::limit($treatment->title_en, 50) : Str::limit($treatment->title_ar, 50) }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
@endforeach
                        </div>

                        <!-- Existing tags section -->
                        <div class="shop-widget">
                            <h5 class="shop-widget-title">{{__('front_end.treatment_Tags')}}</h5>
                            <ul class="tag-list">
                                <li>
                                    <a href="#"> {{ $treats->tags }}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="blog-tag-and-social">
                <div class="social">
                    <h6>Share On:</h6>
                    <ul class="social-list">
                        <li>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-110">
                <div class="col-lg-12">
                    <div class="blog-details-navigation">
                        @if($previous)
                            <div class="single-navigation">
                                <div class="content">
                                    <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                        Previous
                                    </a>
                                    <h4>
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            {{ $previous->title_en }}
                                        </a>
                                    </h4>
                                </div>
                                <a href="{{ route('treatments-details', [$treatment->alias_name]) }}" class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 17.4854L1.51472 9.00007M1.51472 9.00007L10 0.514789M1.51472 9.00007L17.4246 9.35362" />
                                    </svg>
                                </a>
                            </div>
                        @endif

                        @if($next)
                            <div class="single-navigation two">
                                <a href="{{ route('treatments-details', [$treatment->alias_name]) }}" class="nav-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 0.514648L16.4853 8.99993M16.4853 8.99993L8 17.4852M16.4853 8.99993L0.575379 8.64638" />
                                    </svg>
                                </a>
                                <div class="content">
                                    <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                        NEXT
                                    </a>
                                    <h4>
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            {{ $next->title_en }}
                                        </a>
                                    </h4>
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
