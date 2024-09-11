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
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/our-Treatments/{{ $treats->alias_name_en }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/our-Treatments/{{ $treats->alias_name_en }}"
            hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{ $treats->alias_name_ar }}"
            hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{ $treats->alias_name_ar }}" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/علاجاتنا/{{ $treats->alias_name_ar }}"
            hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/our-Treatments/{{ $treats->alias_name_en }}"
            hreflang="en-jo" />
    @endif
@endsection


@section('h1_val')
    {{ $treats?->h1_val }}
@endsection
@section('h2_val')
    {{ $treats?->h2_val }}
@endsection

@section('content')



    <!-- Start Breadcrumb Section -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('front_end.nav_home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{!! $treats->title !!}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Breadcrumb Section section -->

    <!-- Start Blog Details section -->
    <div class="blog-details-section mt-40 mb-40">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">

                    <div class="blog-thumb">
                        <img src="{{ asset($treats->image) }}" alt="">
                        <a href="#">{!! \Carbon\Carbon::parse($treats->created_at->toFormattedDateString())->translatedFormat(' j F Y ') !!}</a>
                    </div>
                    <div class="blog-content">
                        <h4>{!! $treats->title !!}</h4>
                        <p>{!! $treats->description !!}</p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="shop-widget mb-30">
                            <h5 class="shop-widget-title">{{ __('front_end.treatment_Recent_Treatment') }}</h5>
                            @foreach ($recent_treatments as $treatment)
                                <div class="recent-post-widget mb-20">
                                    <div class="recent-post-img">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            <img src="{{ asset($treatment->image) }}" alt="{{ $treatment->title_en }}">
                                        </a>
                                    </div>
                                    <div class="recent-post-content">
                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                            {{ $treatment->created_at->format('d F, Y') }}
                                        </a>
                                        <h6>
                                            <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                                {{ Config::get('app.locale') == 'en' ? Str::limit($treatment->title_en, 50) : Str::limit($treatment->title_ar, 50) }}
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Blog Details section -->



@endsection
