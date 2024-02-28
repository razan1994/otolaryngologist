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


@section('h1_val'){{$seo_operation?->h1_val}}@endsection
@section('h2_val'){{$seo_operation?->h2_val}}@endsection

@section('content')


              <!-- Start Skin Care Banner Area -->
              <div class="skin-care-banner-area">
                <div class="container-fluid">
                    <div style="padding-top: 125px;
                    padding-bottom: 130px;" class="page-banner-content">
                        <h2><span class="banner-title">{{__('front_end.footer_Blogs')}}</span></h2>

                        <ul class="pages-list">
                            <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                            <li>{{__('front_end.footer_Blogs')}}</li>
                        </ul>
                    </div>
                </div>


            </div>
            <!-- End Skin Care Banner Area -->


        <!-- Start  Blog Area -->
        <div class="hospital-blog-area-without-color pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    @if (isset($blogs) && $blogs->count() > 0)
                            @foreach ($blogs as $blog )
                            <div class="col-lg-4 col-md-12">
                                <div class="hospital-blog-card">
                                    @if(isset($blog->image) && file_exists($blog->image))
                                    <div class="blog-image">
                                        <a href="{{ route('blog-details', $blog->alias_name) }}"><img style="height: 256px; width: 416px;" src="{{ asset($blog->image) }}"  alt="image"></a>

                                        <div class="date">{!! \Carbon\Carbon::parse($blog->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</div>
                                    </div>
                                    @endif
                                    <div class="blog-content">

                                        <h3>
                                            <a href="{{ route('blog-details', $blog->alias_name) }}">{{ Str::limit($blog->title, 60) }}</a>
                                        </h3>
                                        <a href="{{ route('blog-details', $blog->alias_name) }}" class="blog-btn">{{__('front_end.btn_ReadMore')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12">
                                 {{ $blogs->links('vendor.pagination.custom') }}

                            </div>

                    @endif
                </div>
            </div>
        </div>
        <!-- End Blog Area -->

        <!-- Start Hospital Information Area -->
        <div class="hospital-information-area pt-100 pb-75" style="background-color: #36495c">
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
