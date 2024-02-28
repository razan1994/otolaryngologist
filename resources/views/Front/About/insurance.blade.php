@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
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
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Certified-Insurance-Companies" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Certified-Insurance-Companies" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/شركات-التأمين-المعتمدة" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/شركات-التأمين-المعتمدة" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/شركات-التأمين-المعتمدة" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Certified-Insurance-Companies" hreflang="en-jo"/>
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
                    <h2><span class="banner-title">{{__('front_end.Insurance_Certified')}}</span></h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.Insurance_Certified')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="container align-items-center" style=" margin: auto;
            ">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <div class="about-content">


                            <p style="text-align: justify;
                            text-justify: inter-word;">{{__('front_end.Insurance_Certified1')}}</p>
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End About Area -->


                <!-- Start Doctor Area -->
                @if (isset($insurances) && $insurances->count() > 0)
                <section class="">
                    <div class="container">

                        <div class="row">
                            @foreach ( $insurances as $insurance  )
                            <div class="col-lg-4 col-md-6">
                              
                                <div class="single-doctor">
                                 

                                   <div class="doctor-content">
                                        <h3>
                                            {!! $insurance->title !!}
                                        </h3>
                                    </div>
                                </div>
                               
                            </div>
                            @endforeach


                    </div>
                </section>
                @endif
                <!-- End Doctor Area -->











        @endsection
