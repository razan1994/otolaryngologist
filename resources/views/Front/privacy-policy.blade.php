@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Privacy-Policy" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Privacy-Policy" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/سياسة-الخصوصية" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/سياسة-الخصوصية" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/سياسة-الخصوصية" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Privacy-Policy" hreflang="en-jo"/>
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
                    <h2>{{__('front_end.PrivacyPolicy_Privacy')}}</h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.PrivacyPolicy_Privacy')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start Privacy Policy Area -->
		<section class="privacy-policy-area ptb-100">
			<div class="container">
				<div class="single-privacy-policy">
					<h3>{{__('front_end.PrivacyPolicy_Privacy')}}</h3>
					<p>{!! $privacy->PrivacyPolicyTitle !!}</p>
					<p>{!! $privacy->PrivacyPolicyDes !!}</p>


				</div>
            </div>
		</section>
        <!-- End Privacy Policy Area -->





        @endsection
