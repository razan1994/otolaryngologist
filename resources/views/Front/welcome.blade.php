@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en" hreflang="en-jo"/>
    @endif
@endsection


 @section('h1_val')
        {{$seo_operation?->h1_val}}
    @endsection
    @section('h2_val')
        {{$seo_operation?->h2_val}}
    @endsection

    <style>
      .hidden {
      display: none;
       }
        </style>


@section('content')



    <!-- Start Skin Care Banner Area -->
    <div class="skin-care-banner-area-home">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="skin-care-banner-image">

                        <img src="{{ asset('/front_end_style/assets/images/banner.png') }}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="skin-care-banner-content">


                        <h3 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"
                            class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">
                            {{ __('front_end.slider_title') }} <span
                                style="color: #d59647">{{ __('front_end.slider_title2') }} </span></h3>
                        <p class="wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">
                            {{ __('front_end.slider_desc') }}</p>


                        <div style="" class="banner-btn" data-wow-delay="0.5s">

                            <a style=" border: 2px solid #d59647;
                            background-color: #439da5;color:#fff;
                            padding: 14px 28px;"
                            class="btn wow animate__animated animate__fadeInLeft"
                            href="{{ route('dranas') }}">  {{ __('front_end.slider_btn') }}</a>


                        </div>
                    </div>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <!-- End Skin Care Banner Area -->

        <!-- Start Skin Care Features Area -->
    <div class="skin-care-features-area pt-100 pb-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="skin-care-features-card">
                            <div class="features-title">
                                <div class="icon-image">
                                    <a href="#"><img src="{{ asset('/front_end_style/assets/images/skin-care/features/microscope.png') }}"  alt="image"></a>
                                </div>
                                <h3>
                                    <a href="#">  {{ __('front_end.Features_Title1') }} </a>
                                </h3>
                            </div>
                            <p>
                                {{ __('front_end.Features_Desc1') }}
                            </p>
                            <details>
                                <summary>  {{ __('front_end.Features_btn') }}  </summary>
                                <p>
                                    {{ __('front_end.Features_ReadMore1') }}
                                </p>
                                <h2>
                                    <span style="color: #439da5">
                                    دكتور أنس أبوشملة - افضل دكتور تجميل أنف في الأردن - طبيب انف وأذن وحنجرة في عمان,
                                    دكتور تجميل انف في عمان,
    أسعار عمليات تجميل الأنف في الأردن,
    تجميل الانف بالتقسيط في الأردن,
    أفضل دكتور تجميل في الأردن,
    عملية تجميل الأنف بالليزر في الأردن,
    أفضل دكتور تجميل الأنف اللحمي,
                                    </span>
                                </h2>
                              </details>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="skin-care-features-card">
                            <div class="features-title">
                                <div class="icon-image">
                                    <a href="#"><img src="{{ asset('/front_end_style/assets/images/skin-care/features/medical-doctor.png') }}"  alt="image"></a>
                                </div>
                                <h3>
                                    <a href="#"> {{ __('front_end.Features_Title2') }}</a>
                                </h3>
                            </div>
                            <p>{{ __('front_end.Features_Desc2') }}</p>
                               <details>
                                <summary>  {{ __('front_end.Features_btn') }}  </summary>
                                   <p>{{ __('front_end.Features_ReadMore2') }}</p>
                              </details>


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="skin-care-features-card">
                            <div class="features-title">
                                <div class="icon-image">
                                    <a href="#"><img src="{{ asset('/front_end_style/assets/images/skin-care/features/medical-tool.png') }}" alt="image"></a>
                                </div>
                                <h3>
                                    <a href="#">{{ __('front_end.Features_Title3') }}  </a>
                                </h3>

                            </div>
                            <p>{{ __('front_end.Features_Desc3') }}</p>
                            <details>
                                <summary> {{ __('front_end.Features_btn') }} </summary>
                                   <p>
                                    {{ __('front_end.Features_ReadMore3') }}
                                   </p>
                              </details>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Skin Care Features Area -->

    <!-- Start Skin Care About Area -->
    <div class="skin-care-about-area ptb-100 pb-75">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="skin-care-about-image">
                        <img src="{{ asset('/front_end_style/assets/images/img-dranas2.jpeg') }}" alt="image">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="skin-care-about-content">
                        <span class="gradient-text"></span>
                        <p>{!! Str::limit($about->AboutUsDr,1185) !!} </p>


                        <ul class="about-btn-with-info">
                            <li>
                                <a style=" border: 2px solid #d59647;
                                    background-color: #439da5;color:#fff;
                                    padding: 14px 28px;"
                                    class="btn wow animate__animated animate__fadeInLeft"
                                    href="{{ route('dranas') }}">{{ __('front_end.btn_ReadMore') }}</a>

                                    {{-- <li  class="wow animate__animated animate__fadeInLeft"><a
                                        href="{{ route('dranas') }}">{{ __('front_end.btn_ReadMore') }}</a> </li> --}}
                            </li>
                            {{-- <li>
                                    <i class='bx bxs-phone'></i>
                                    <a href="tel:+962799559157">+962799559157</a>
                                </li> --}}
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Skin Care About Area -->



    <!-- Start Skin Care Before and After Area -->
    <div dir="{{ App::isLocale('ar') ? 'ltr' : 'ltr' }}" class="skin-care-before-after-area ptb-100 pb-75">
        <div class="container-fluid">
            <div class="section-title">
                <span style="color:#d59647">{{ __('front_end.home_BeforeandAfter') }}</span>
                <br>
                <h2 style="background-color: #439da5;color:#d59647;" class="btn wow animate__animated animate__fadeInLeft">
                    {{ __('front_end.home_Noseplastic') }}</h2>
            </div>
            @if (isset($photos) && $photos->count() > 0)
                <div class="skin-care-before-after-slides owl-carousel owl-theme" dir="ltr">
                    @foreach ($photos as $blog )
                    <div class="skin-care-before-after-card">
                        <img src="{{ asset($blog->image_after) }}" alt="image">
                    </div>
                    @endforeach

                </div>
            @endif
        </div>
    </div>
    <!-- End Skin Care Before and After Area -->


    <!-- Start Skin Care Dry Area -->
    <div class="skin-care-dry-area ptb-100 pb-75 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="skin-care-dry-content">
                        <span style="font-size: 25px;">{{ __('front_end.home_AboutClinic') }}</span>
                        {{-- <h4>WE Provide comprehensive care & medical services for the entire spectrum of ear, nose and throat disorders</h4> --}}
                        <p>
                            {!! Str::limit($about->AboutUsClinic,700) !!}
                        </p>


                        <br>
                        @if (isset($services) && $services->count() > 0)
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h5>{{ __('front_end.home_Weoffer') }} </h5>
                                </div>

                                @foreach ($services as $service)
                                    <div class="col-lg-6 col-md-6">

                                        <ul class="list">
                                            <li><i class='bx bx-check'></i> {!! $service->title !!} </li>
                                        </ul>
                                    </div>
                                @endforeach

                            </div>
                        @endif
                        <ul class="dry-list">

                            <li class=""><a
                                    href="{{ route('aboutClinic') }}">{{ __('front_end.btn_ReadMore') }}</a> </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <div class="skin-care-dry-image">
                        <img src="{{ asset('/front_end_style/assets/images/skin-care/dry/ent.jpg') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Skin Care Dry Area -->


    <!-- Start Covid FAQ Area -->
    <div dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" class="covid-faq-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">


                <div class="col-lg-12 col-md-12">
                    <div class="covid-faq-accordion">
                        <div class="accordion">
                            <div class="accordion-item">
                                <div class="accordion-title active">
                                    <i class='bx bx-caret-down'></i>
                                    {{ __('front_end.Toggle_Title') }}

                                </div>

                                <div class="accordion-content">
                                    <p>
                                        {{ __('front_end.Toggle_Content') }}
                                    </p>
                                    <p>{{ __('front_end.Toggle_Keywords') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End Covid FAQ Area -->

    <!-- Start Skin Care Services Area -->
    @if (isset($treatments) && $treatments->count() > 0)
        <div class="skin-care-services-area ptb-100 pb-75">
            <div class="container">
                <div class="section-title">
                    <span style="" class="">{{ __('front_end.nav_Expert') }}</span>
                    <br>
                    <h2 style="background-color: #439da5;" class="btn wow animate__animated animate__fadeInLeft">
                        {{ __('front_end.nav_OurTreatments') }}</h2>
                </div>

                <div class="row justify-content-center">
                    @foreach ($treatments as $treatment)
                        <div class="col-lg-4 col-md-6">
                            <div class="skin-care-services-card">
                                <div class="services-content">
                                    <h3>
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"> {{ Str::limit($treatment->title, 20) }}</a>
                                    </h3>

                                </div>
                                @if (isset($treatment->image) && file_exists($treatment->image))
                                    <div class="services-image">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            <img style="object-fit: fill;"
                                                src="{{ asset($treatment->image) }}" alt="image"></a>


                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
                <a class="default-btn" style="margin-top: 15px;" href="{{ route('treatments') }}"
                    class="">{{ __('front_end.btn_ReadMore') }}</a>
            </div>
        </div>
    @endif
    <!-- End Skin Care Services Area -->

    <div style="opacity: 0;" class="skin-care-services-area ptb-100 pb-75">
        <div class="container">

            <button style="opacity: 0;"  class="btn wow animate__animated animate__fadeInLeft" id="toggleButton"> </button>
            <div id="toggleContent" class="hidden">

            </div>


    <script>
    document.getElementById("toggleButton").addEventListener("click", function() {
    var content = document.getElementById("toggleContent");
    if (content.classList.contains("hidden")) {
        content.classList.remove("hidden");
    } else {
        content.classList.add("hidden");
    }
});
    </script>


        </div>
    </div>




    <!-- Start Skin Care Blog Area -->
    @if (isset($blogs) && $blogs->count() > 0)
        <div class="skin-care-blog-area ptb-100 pb-75">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title-warp">

                            <h2>{{ __('front_end.home_BlogsArticles') }}</h2>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="section-warp-btn">
                            <a href="{{ route('blogs') }}" class="default-btn">{{ __('front_end.home_SeeBlog') }}</a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="skin-care-blog-card">
                                @if (isset($blog->image) && file_exists($blog->image))
                                    <div class="blog-image">
                                        <a href="{{ route('blog-details', [$blog->alias_name]) }}"><img
                                                style="height: 258px; width: 416px;" src="{{ asset($blog->image) }}"
                                                alt="image"></a>
                                        <div class="tag">
                                            <a
                                                href="{{ route('blog-details', [$blog->alias_name]) }}">{{ Str::limit($blog->title, 80) }}</a>
                                        </div>
                                    </div>
                                @endif
                                <div class="blog-content">
                                    <ul class="entry-meta">

                                        <li><i class='bx bx-time gradient-text'></i> {!! \Carbon\Carbon::parse($blog->created_at->toFormattedDateString())->translatedFormat('j F Y ') !!}</li>

                                    </ul>
                                    <h3>
                                        <a href="{{ route('blog-details', [$blog->alias_name]) }}">
                                            {{ Str::limit($blog->title, 80) }}
                                        </a>
                                    </h3>


                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6">
                                <div class="skin-care-blog-card">
                                    <div class="blog-image">
                                        <a href="{{ route('blog-details') }}"><img src="{{ asset('/front_end_style/assets/images/skin-care/blog/blog-2.jpg') }}" alt="image"></a>
                                        <div class="tag">
                                            <a href="{{ route('blogs') }}">Nose diseases</a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta">

                                            <li><i class='bx bx-time gradient-text'></i> 30 Dec, 2022</li>

                                        </ul>
                                        <h3>
                                            <a href="{{ route('blog-details') }}">Defective sense of smel</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="skin-care-blog-card">
                                    <div class="blog-image">
                                        <a href="{{ route('blog-details') }}"><img src="{{ asset('/front_end_style/assets/images/skin-care/blog/blog-3.jpg') }}" alt="image"></a>
                                        <div class="tag">
                                            <a href="{{ route('blogs') }}">Larynx disease</a>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta">

                                            <li><i class='bx bx-time gradient-text'></i> 30 Dec, 2022</li>

                                        </ul>
                                        <h3>
                                            <a href="{{ route('blog-details') }}">Types of laryngitis</a>
                                        </h3>
                                    </div>
                                </div>
                            </div> --}}
                </div>
            </div>
        </div>
    @endif
    <!-- End Skin Care Blog Area -->

    <!-- Start Skin Care Partner Area -->
    <div class="skin-care-partner-area ptb-100 pb-75">
        <div class="container">
            <div class="skin-care-partner-inner-box">

                <div class="col-lg-12 col-md-12">
                    <div class="skin-care-dry-content">
                        <h4>
                            {{ __('front_end.HomeBlog_Title') }}
                        </h4>
                        <p>
                            {{ __('front_end.HomeBlog_Desc') }}
                        </p>


                        <details ontoggle="myFunction()">
                            <summary id="myDIV" class="default-btn">{{ __('front_end.btn_ReadMore') }}</summary>
                            <p>
                                {{ __('front_end.HomeBlog_Readmore') }}
                            </p>
                            <h1>
                                <span style="color: #414b64">
                                دكتور أنس أبوشملة - افضل دكتور تجميل أنف في الأردن - طبيب انف وأذن وحنجرة في عمان,
                                دكتور تجميل انف في عمان,
أسعار عمليات تجميل الأنف في الأردن,
تجميل الانف بالتقسيط في الأردن,
أفضل دكتور تجميل في الأردن,
عملية تجميل الأنف بالليزر في الأردن,
أفضل دكتور تجميل الأنف اللحمي,
                                </span>
                            </h1>
                        </details>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Skin Care Partner Area -->



@endsection
