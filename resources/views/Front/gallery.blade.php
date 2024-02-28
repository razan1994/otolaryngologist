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

@section('content')


    <!-- Start Skin Care Banner Area -->
    <div class="skin-care-banner-area">
        <div class="container-fluid">
            <div style="padding-top: 125px;
                    padding-bottom: 130px;" class="page-banner-content">
                <h2><span class="banner-title">{{ __('front_end.BeforeandAfter') }}</span> </h2>

                <ul class="pages-list">
                    <li><a href="{{route('welcome')}}">{{ __('front_end.nav_home') }}</a></li>
                    <li>{{ __('front_end.home_BeforeandAfter') }}</li>
                </ul>
            </div>
        </div>


    </div>
    <!-- End Skin Care Banner Area -->

    <!-- Start Gallery Area -->
    @if (isset($photos) && $photos->count() > 0)
        <section class="gallery-area pt-100 pb-100">
            <div class="container">


                <div class="row">


                    @foreach ($photos as $blog )
                        <div class="col-lg-4 col-md-12">
                            <div class="hospital-blog-card">
                                @if(isset($blog->image_after) && file_exists($blog->image_after))
                                <div class="blog-image">
                                    <section class="image-comparison" data-component="image-comparison-slider">
                                        <div class="image-comparison__slider-wrapper">


                                            <div class="image-comparison__image-wrapper  image-comparison__image-wrapper--overlay"
                                                data-image-comparison-overlay="">
                                                <figure class="image-comparison__figure image-comparison__figure--overlay">
                                                    <picture class="image-comparison__picture">
                                                        <source media="(max-width: 40em)"
                                                            srcset="{{ asset($blog->image_before) }}">
                                                        <source media="(min-width: 40.0625em) and (max-width: 48em)"
                                                            srcset="{{ asset($blog->image_before) }}">
                                                        <img src="{{ asset($blog->image_before) }}"
                                                            alt="Mojave desert in the sun" class="image-comparison__image">
                                                    </picture>

                                                    <figcaption class="image-comparison__caption image-comparison__caption--before">
                                                        <span class="image-comparison__caption-body">{{ __('front_end.gallary_Before') }}</span>
                                                    </figcaption>
                                                </figure>
                                            </div>

                                            <div class="image-comparison__slider" data-image-comparison-slider="">

                                            </div>

                                            <div class="image-comparison__image-wrapper">
                                                <figure class="image-comparison__figure">
                                                    <picture class="image-comparison__picture">
                                                        <source media="(max-width: 40em)"
                                                            srcset="{{ asset($blog->image_after) }}">
                                                        <source media="(min-width: 40.0625em) and (max-width: 48em)"
                                                            srcset="{{ asset($blog->image_after) }}">
                                                        <img src="{{ asset($blog->image_after) }}"
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
                                @endif
                                <div class="blog-content">

                                    <h3>
                                        <a href="{{ route('gallery-details', $blog->alias_name) }}">{{ Str::limit($blog->title, 80) }}</a>
                                    </h3>
                                    <a href="{{ route('gallery-details', $blog->alias_name) }}" class="blog-btn">{{__('front_end.btn_ReadMore')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single-gallery">
                            <img src="{{ asset('/front_end_style/assets/images/gallery/gallery-7.jpg') }}" alt="image">

                            <div class="content">

                                <span>nasal deviation</span>

                                <div class="icon">
                                    <a href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-12 col-md-12">
                        {{ $photos->links('vendor.pagination.custom') }}

                   </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End Gallery Area -->

@endsection
