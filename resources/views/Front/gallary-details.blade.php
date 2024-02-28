@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($news_blog->meta_desc) ? $news_blog->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($news_blog->keywords) ? $news_blog->keywords : 'Undefined' }}@endsection
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Before&After/{{$news_blog->alias_name_en}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After/{{$news_blog->alias_name_en}}" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{$news_blog->alias_name_ar}}" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{$news_blog->alias_name_ar}}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/قبل-و-بعد/{{$news_blog->alias_name_ar}}" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Before&After/{{$news_blog->alias_name_en}}" hreflang="en-jo"/>
    @endif
@endsection


@section('h1_val')
{{$news_blog?->h1_val}}
@endsection
@section('h2_val')
{{$news_blog?->h2_val}}
@endsection


@section('content')


              <!-- Start Skin Care Banner Area -->
              <div class="skin-care-banner-area">
                <div class="container-fluid">
                    <div style="padding-top: 125px;
                    padding-bottom: 130px;" class="page-banner-content">
                        <h2>{{__('front_end.gallary_details')}}</h2>

                        <ul class="pages-list">
                            <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                            <li>{{__('front_end.gallary_details')}}</li>
                        </ul>
                    </div>
                </div>


            </div>
            <!-- End Skin Care Banner Area -->

            <!-- Start Hospital Blog Details Area -->
            <div class="hospital-blog-details-area pt-100 pb-100" dir="ltr" style="  background: #36495c;">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-8 col-md-12">
                            <div class="hospital-blog-details-desc">
                                <div class="article-content">
                                    <h3>{!! $news_blog->title !!}</h3>
                                </div>
                                <div class="article-image">
                                    <section class="image-comparison" data-component="image-comparison-slider">
                                        <div class="image-comparison__slider-wrapper">
                                            <label for="image-comparison-range" class="image-comparison__label">Move image comparison slider</label>
                                            <input type="range" min="0" max="100" value="50" class="image-comparison__range"
                                                id="image-compare-range" data-image-comparison-range="">

                                            <div class="image-comparison__image-wrapper  image-comparison__image-wrapper--overlay"
                                                data-image-comparison-overlay="">
                                                <figure class="image-comparison__figure image-comparison__figure--overlay">
                                                    <picture class="image-comparison__picture">
                                                        <source media="(max-width: 40em)"
                                                            srcset="{{ asset($news_blog->image_before) }}">
                                                        <source media="(min-width: 40.0625em) and (max-width: 48em)"
                                                            srcset="{{ asset($news_blog->image_before) }}">
                                                        <img src="{{ asset($news_blog->image_before) }}"
                                                            alt="Mojave desert in the sun" class="image-comparison__image">
                                                    </picture>

                                                    <figcaption class="image-comparison__caption image-comparison__caption--before">
                                                        <span class="image-comparison__caption-body">{{ __('front_end.gallary_Before') }}</span>
                                                    </figcaption>
                                                </figure>
                                            </div>

                                            <div class="image-comparison__slider" data-image-comparison-slider="">
                                                <span class="image-comparison__thumb" data-image-comparison-thumb="">
                                                    <svg class="image-comparison__thumb-icon" xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="10" viewBox="0 0 18 10" fill="currentColor">
                                                        <path class="image-comparison__thumb-icon--left"
                                                            d="M12.121 4.703V.488c0-.302.384-.454.609-.24l4.42 4.214a.33.33 0 0 1 0 .481l-4.42 4.214c-.225.215-.609.063-.609-.24V4.703z">
                                                        </path>
                                                        <path class="image-comparison__thumb-icon--right"
                                                            d="M5.879 4.703V.488c0-.302-.384-.454-.609-.24L.85 4.462a.33.33 0 0 0 0 .481l4.42 4.214c.225.215.609.063.609-.24V4.703z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </div>

                                            <div class="image-comparison__image-wrapper">
                                                <figure class="image-comparison__figure">
                                                    <picture class="image-comparison__picture">
                                                        <source media="(max-width: 40em)"
                                                            srcset="{{ asset($news_blog->image_after) }}">
                                                        <source media="(min-width: 40.0625em) and (max-width: 48em)"
                                                            srcset="{{ asset($news_blog->image_after) }}">
                                                        <img src="{{ asset($news_blog->image_after) }}"
                                                            alt="Mojave desert in the dark" class="image-comparison__image">
                                                    </picture>

                                                    <figcaption class="image-comparison__caption image-comparison__caption--after">
                                                        <span class="image-comparison__caption-body">{{ __('front_end.gallary_After') }}</span>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </section>
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
