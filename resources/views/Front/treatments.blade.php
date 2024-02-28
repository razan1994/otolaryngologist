@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@if($treatments->currentPage() == 1)
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection


    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Treatments" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/العلاجات" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments" hreflang="en-jo"/>
        @endif
    @endsection

@else
    @section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $treatments->currentPage() }}@endsection
    @section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }} - {{ 'page=' . $treatments->currentPage() }}@endsection
    @section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }} - {{ 'page=' . $treatments->currentPage() }}@endsection
    @section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }} - {{ 'page=' . $treatments->currentPage() }}@endsection


    @section('canonical')
        @if (Config::get('app.locale') == 'en')
            <link rel="canonical" href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}" hreflang="en-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}" hreflang="ar-jo"/>
        @else
            <link rel="canonical" href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}" />
            <link rel="alternate" href="https://otolaryngologist-jo.com/ar/العلاجات?{{ 'page=' . $treatments->currentPage() }}" hreflang="ar-jo"/>
            <link rel="alternate" href="https://otolaryngologist-jo.com/en/Treatments?{{ 'page=' . $treatments->currentPage() }}" hreflang="en-jo"/>
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
                    <h2><span class="banner-title">{{__('front_end.ourTreatments_Treatments')}}</span></h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.ourTreatments_Treatments')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="container align-items-center" style=" margin: auto;">
                <div class="row align-items-center">
                    <div class="col-lg-10">
                        <div class="about-content">


                            <p style="text-align: justify;
                            text-justify: inter-word;">{{__('front_end.ourTreatments_Treatments1')}}</p>
                            </p>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End About Area -->

        <!-- Start  Blog Area -->
        <div class="hospital-blog-area-without-color">
            <div class="container">
                <div class="row justify-content-center">
                    @if (isset($treatments) && $treatments->count() > 0)
                    @foreach ($treatments as $treatment)
                            <div class="col-lg-4 col-md-12">
                                <div class="hospital-blog-card">
                                    @if (isset($treatment->image) && file_exists($treatment->image))
                                    <div class="blog-image">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"><img style="height: 256px; width: 416px;" src="{{ asset($treatment->image) }}"  alt="image"></a>

                                        <div class="date">{!! \Carbon\Carbon::parse($treatment->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</div>
                                    </div>
                                    @endif
                                    <div class="blog-content">

                                        <h3>
                                            <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"> {{ Str::limit($treatment->title, 50) }}</a></a>
                                        </h3>
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}" class="blog-btn">{{__('front_end.btn_ReadMore')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12">
                                {{ $treatments->links('vendor.pagination.custom') }}

                        </div>

                    @endif
                </div>
            </div>
        </div>
        <!-- End Blog Area -->





        @endsection
