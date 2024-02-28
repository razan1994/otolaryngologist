@extends('front_end_inners.app_front_end')
{{-- SEO SECTION --}}
@section('page_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($seo_operation->seo_title) ? $seo_operation->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($seo_operation->meta_desc) ? $seo_operation->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($seo_operation->keywords) ? $seo_operation->keywords : 'Undefined' }}@endsection


@section('canonical')
    @if (Config::get('app.locale') == 'en')
        <link rel="canonical" href="https://otolaryngologist-jo.com/en/Contact-Us" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Contact-Us" hreflang="en-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/اتصل-بنا" hreflang="ar-jo"/>
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar/اتصل-بنا" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar/اتصل-بنا" hreflang="ar-jo"/>
        <link rel="alternate" href="https://otolaryngologist-jo.com/en/Contact-Us" hreflang="en-jo"/>
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
                <div  class="page-banner-content">
                    <h2><span class="banner-title">{{__('front_end.ContactUs_Contact')}}</span></h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}} </a></li>
                        <li>{{__('front_end.ContactUs_Contact')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start Contact Area -->
        <section class="contact-area ptb-100">
            <div class="container">
                <div class="section-title">

                    <h4>{{__('front_end.ContactUs_Contact1')}}</h4>
                </div>

                <div class="contact-form">
                    <form action="{{route('contactUsRequest1')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="full_name" id="name" class="form-control" required data-error="{{__('front_end.ContactUs_error_name')}}  {{__('front_end.ContactUs_Name')}}" placeholder="{{__('front_end.ContactUs_Name')}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="{{__('front_end.ContactUs_error_name')}}  {{__('front_end.ContactUs_Email')}}" placeholder="{{__('front_end.ContactUs_Email')}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" required data-error="{{__('front_end.ContactUs_error_name')}} {{__('front_end.ContactUs_Phone')}}" class="form-control" placeholder="{{__('front_end.ContactUs_Phone')}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="{{__('front_end.ContactUs_error_name')}}  {{__('front_end.ContactUs_Subject')}}" placeholder="{{__('front_end.ContactUs_Subject')}}">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="{{__('front_end.ContactUs_error_name')}}  {{__('front_end.ContactUs_YourMessage')}}" placeholder="{{__('front_end.ContactUs_YourMessage')}} "></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button style=" border: 2px solid #d59647;
                                background-color: #d59647;
                                padding: 14px 28px;" type="submit" class="default-btn">{{__('front_end.ContactUs_SendMessage')}}</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="contact-info">
                    <div class="contact-info-content">
                        <h3>{{__('front_end.ContactUs_YourMessage1')}}</h3>
                        <h2>
                            <a dir="ltr" href="tel:+0881306298615">+962799559157</a>
                            <span>{{__('front_end.ContactUs_OR')}}</span>
                            <a href="mailto:grin@gmail.com">dranasabushamleh82@gmail.com</a>
                        </h2>

                        <h3 dir="ltr" style="margin-top: 50px;">{{__('front_end.ContactUs_YourMessage2')}}</h3>
                        <h2> 
                            <i class='bx bxs-map'></i> <a href="#">{{__('front_end.west_amman')}}</a>
                            <span></span>
                            <i class='bx bxs-map'></i><a href="mailto:grin@gmail.com">{{__('front_end.east_amman')}}</a>
                        </h2>

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class="center">
                    <div style="text-decoration:none; overflow:hidden;"><div id="google-maps-canvas" >
                        <iframe style="width: 100%;height:400px;margin-top: 25px;"  frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=مستشفى+العيون+التخصصي،+Abdullah+Ibn+Jubayr,+Amman,+Jordan&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                    </div><style>#google-maps-canvas img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>

                </div>
            </div>
        </section>
        <!-- End Contact Area -->

        @endsection
