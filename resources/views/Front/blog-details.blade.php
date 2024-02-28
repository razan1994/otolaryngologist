@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($news_blog->meta_desc) ? $news_blog->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($news_blog->keywords) ? $news_blog->keywords : 'Undefined' }}@endsection
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/blogs/{{$news_blog->alias_name_en}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs/{{$news_blog->alias_name_en}}" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{$news_blog->alias_name_ar}}" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{$news_blog->alias_name_ar}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/مقالة-طبية/{{$news_blog->alias_name_ar}}" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/blogs/{{$news_blog->alias_name_en}}" hreflang="en-jo"/>
    @endif
@endsection


@section('h1_val'){{$news_blog?->h1_val}}@endsection
@section('h2_val'){{$news_blog?->h2_val}}@endsection

@section('content')


              <!-- Start Skin Care Banner Area -->
              <div class="skin-care-banner-area">
                <div class="container-fluid">
                    <div style="padding-top: 125px;
                    padding-bottom: 130px;" class="page-banner-content">
                        <h2>{{__('front_end.blog_details')}}</h2>

                        <ul class="pages-list">
                            <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                            <li>{{__('front_end.blog_details')}}</li>
                        </ul>
                    </div>
                </div>


            </div>
            <!-- End Skin Care Banner Area -->

            <!-- Start Hospital Blog Details Area -->
            <div class="hospital-blog-details-area pt-100 pb-100" style="  background: #36495c;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-12">
                            <aside class="widget-area hospital-widget-area">
                                {{-- <div class="widget widget_search">
                                    <form class="search-form">
                                        <input type="search" class="search-field" placeholder="{{__('front_end.Eardisease_Search')}}">
                                        <button type="submit"><i class='bx bx-search-alt'></i></button>
                                    </form>
                                </div> --}}
                                @if (isset($popular_blogs) && $popular_blogs->count() > 0)
                                <div class="widget widget_grin_posts_thumb" style="  background: #36495c;">
                                    <h3 class="widget-title">{{__('front_end.blog_details_PopularPost')}}</h3>
                                    @foreach ( $popular_blogs as  $popular_blog)
                                    <article class="item">
                                        <a href="{{ route('blog-details', [$popular_blog->alias_name]) }}" class="thumb">
                                            <span class="fullimage cover bg1" role="img"><img src="{{ asset($popular_blog->image) }}" alt=""></span>
                                        </a>
                                        <div class="info">

                                            <span>{!! \Carbon\Carbon::parse($popular_blog->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</span>
                                            <h4 class="title usmall">
                                                <a href="{{ route('blog-details', [$popular_blog->alias_name]) }}">{!! $popular_blog->title !!}</a>
                                            </h4>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                                @endif

                            </aside>
                        </div>

                        <div class="col-lg-8 col-md-12">
                            <div class="hospital-blog-details-desc">
                                <div class="article-content">
                                    <h3>{!! $news_blog->title !!}</h3>
                                </div>
                                <div class="article-image">
                                    <img style="height: 435px; width: 831px;" src="{{ asset($news_blog->image) }}" alt="image">

                                    <div class="date">{!!  \Carbon\Carbon::parse($news_blog->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</div>
                                </div>
                                <p>{!! $news_blog->description !!}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Hospital Blog Details Area -->

        <!-- Start Hospital Information Area -->
        <div class="hospital-information-area pt-100 pb-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="hospital-information-card">
                            <div class="content">
                                <div class="icon">
                                    <i class='bx bx-map'></i>
                                </div>
                                <h3>{{__('front_end.Eardisease_OfficeAddress')}}</h3>
                                <p>{{__('front_end.Eardisease_OfficeAddress1')}}</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="hospital-information-card">
                            <div class="content">
                                <div class="icon">
                                    <i class='bx bx-envelope'></i>
                                </div>
                                <h3>{{__('front_end.Eardisease_EmailUs')}}</h3>
                                <p>
                                    <a href="mailto:info@grin54364.com">dranasabushamleh82@gmail.com</a>

                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="hospital-information-card">
                            <div class="content">
                                <div class="icon">
                                    <i class='bx bx-phone-call'></i>
                                </div>
                                <h3>{{__('front_end.Eardisease_ContactUs')}}</h3>
                                <p>
                                    <a href="tel:00874847348734">+962799559157</a>

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hospital Information Area -->


        @endsection
