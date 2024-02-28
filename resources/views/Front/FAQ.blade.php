@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/FAQ" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en//FAQ" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/الاسئلة-المقترحة" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/FAQ" hreflang="en-jo"/>
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
                    <h2>{{__('front_end.FAQ_FAQGet')}}</h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.FAQ_FAQ')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->


       <!-- Start FAQ Area -->
       @if (isset($faqs) && $faqs->count() > 0)
       <section class="faq-area ptb-100">
        <div class="container">


            <div class="faq-accordion">
                <div class="accordion">

                    @foreach ($faqs as $faq )

                    <div class="accordion-item">
                        <div class="accordion-title ">
                            <i class='bx bx-plus'></i>
                            {!! $faq->title !!}
                        </div>

                        <div class="accordion-content ">
                            <p>{!! $faq->answer !!}</p>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="accordion-item">
                        <div class="accordion-title active">
                            <i class='bx bx-plus'></i>
                            {{__('front_end.FAQ_FAQ2')}}
                        </div>

                        <div class="accordion-content">
                            <p> {{__('front_end.FAQ_AnswerFAQ2')}}</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-title">
                            <i class='bx bx-plus'></i>
                            {{__('front_end.FAQ_FAQ3')}}
                        </div>

                        <div class="accordion-content">
                            <p>{{__('front_end.FAQ_AnswerFAQ3')}}</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-title">
                            <i class='bx bx-plus'></i>
                            {{__('front_end.FAQ_FAQ4')}}
                        </div>

                        <div class="accordion-content">
                            <p>{{__('front_end.FAQ_AnswerFAQ4')}}</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-title">
                            <i class='bx bx-plus'></i>
                            {{__('front_end.FAQ_FAQ5')}}
                        </div>

                        <div class="accordion-content">
                            <p>{{__('front_end.FAQ_AnswerFAQ5')}}</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End FAQ Area -->



        @endsection
