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



              <!-- Start Skin Care Banner Area -->
              <div class="skin-care-banner-area">
                <div class="container-fluid">
                    <div style="padding-top: 125px;
                    padding-bottom: 130px;" class="page-banner-content">
                        <h2>{{__('front_end.treatment_details')}}</h2>

                        <ul class="pages-list">
                            <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                            <li>{{__('front_end.treatment_details')}}</li>
                        </ul>
                    </div>
                </div>


            </div>
            <!-- End Skin Care Banner Area -->

            <!-- Start Hospital Blog Details Area -->
            <div class="hospital-blog-details-area pt-100 pb-100" style="  background: #36495c;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="hospital-blog-details-desc">
                                <div class="article-content">
                                    <h3>{!! $treats->title !!}</h3>
                                </div>
                                <div class="article-image">
                                    <img style="height: 435px; width: 831px;" src="{{ asset($treats->image) }}" alt="image">

                                    {{-- <div class="date">{!!  \Carbon\Carbon::parse($treats->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</div>
                                </div> --}}
                                <p style="text-align: justify;text-justify: inter-word;">{!! $treats->description !!}</p>

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
