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
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/FAQ" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en//FAQ" hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/FAQ" hreflang="en-jo" />
    @endif
@endsection


@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection

@section('content')





    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('front_end.FAQ_FAQGet') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->


    <!-- Start About Us Banner Section -->
    <div class="about-us-banner mt-40 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-thumb hover-img mb-60">
                        <img src="{{ asset('front_end_style/assets/img/inner-page/about-us-banner-img.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Us Banner Section -->

    @if (isset($faqs) && $faqs->count() > 0)
        <!-- Start Faq section -->
        <div class="faq-section">
            <div class="container">
                <div class="faq-title">

                    <p>{{ __('front_end.FAQ_FAQGet') }}</p>
                    </h1>
                </div>
                <div class="row g-4 mb-40">

                    <div class="col-lg-10">
                        <div class="faq-content">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                {!! $faq->title !!} </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- End Faq section -->
    @endif


@endsection
