@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection
{{-- SEO SECTION --}}


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Dr.Anas-Abu-Shamla" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Dr.Anas-Abu-Shamla" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/دكتور-انس-ابوشمله" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/دكتور-انس-ابوشمله" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/دكتور-انس-ابوشمله" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Dr.Anas-Abu-Shamla" hreflang="en-jo"/>
    @endif
@endsection


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
                    <h2><span class="banner-title">{{__('front_end.DrAnas_AboutDrAnas')}}</span></h2>

                    <ul class="pages-list">
                        <li><a href="#">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.DrAnas_AboutDrAnas')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="container" style=" margin: auto;
            width: 100%;
            padding: 10px;">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="about-content">

                            <p style="text-align: justify;text-justify: inter-word;">{!!$about->AboutUsDr !!}</p>
                            @if (isset($services) && $services->count() > 0)
                            <h4>{{__('front_end.DrAnas_Specialties')}}</h4></p>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <ul class="about-list">
                                        @foreach ( $services as $service  )
                                        <li>
                                            <i class="bx bx-check"></i>
                                            {!! $service->title !!}
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End About Area -->





        @endsection
