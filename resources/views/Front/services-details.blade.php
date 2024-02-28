@extends('front_end_inners.app_front_end')

{{-- SEO SECTION --}}
@section('page_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_title'){{ isset($news_blog->seo_title) ? $news_blog->seo_title : 'Undefined' }}@endsection
@section('meta_desc'){{ isset($news_blog->meta_desc) ? $news_blog->meta_desc : 'Undefined' }}@endsection
@section('meta_keywords'){{ isset($news_blog->keywords) ? $news_blog->keywords : 'Undefined' }}@endsection
{{-- SEO SECTION --}}

@section('h1_val')
{{$news_blog?->h1_val}}
@endsection
@section('h2_val')
{{$news_blog?->h2_val}}
@endsection


@section('content')


        <!-- Start Skin Care Banner Area -->
        <div class="skin-care-banner-area">
            <div class="container-fluid">
                <div style="padding-top: 125px;
                padding-bottom: 130px;" class="page-banner-content">
                    <h2><span class="banner-title">{{__('front_end.Eardisease_disease')}}</span></h2>

                    <ul class="pages-list">
                        <li><a href="{{route('welcome')}}">{{__('front_end.nav_home')}}</a></li>
                        <li>{{__('front_end.Eardisease_disease')}}</li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- End Skin Care Banner Area -->

        <!-- Start Hospital Services Details Area -->
        <div class="hospital-services-details-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area hospital-widget-area">
                            {{-- <div class="widget widget_search">
                                <form class="search-form">
                                    <input type="search" class="search-field" placeholder="{{__('front_end.Eardisease_Search')}}">
                                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                                </form>
                            </div> --}}

                            <div class="widget widget_categories">
                                <h3 class="widget-title">{{__('front_end.Eardisease_AllServices')}}</h3>
                                @foreach ( $popular_blogs as  $popular_blog)
                                <ul>
                                    <li><a href="{{ route('services-details', [$popular_blog->alias_name]) }}">{!! $popular_blog->title !!}</a></li>
                                    {{-- <li><a href="#">nose diseases</a></li>
                                    <li><a href="#">Throat disease</a></li>
                                    <li><a href="#">Hearing disease</a></li> --}}
                                </ul>
                                @endforeach
                            </div>



                            <div class="widget widget_services_info">
                                <div class="info">
                                    <i class='bx bx-phone-call'></i>
                                    <h4>{{__('front_end.Eardisease_Contact')}}</h4>
                                    <a href="tel:00874847348734">+962799559157</a>
                                </div>
                                <p>{{__('front_end.Eardisease_Contact1')}}</p>
                                <a href="{{ route('ContactUs') }}" class="default-btn">{{__('front_end.ContactUs_Contact')}}</a>
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-8 col-md-12">

                        <div class="hospital-services-details-desc">
                            <img style="height: 435px; width: 831px;" src="{{ asset($news_blog->image) }}" alt="image">

                            <div class="content">
                                <h3>{!! $news_blog->title !!}</h3>
                                <p>{!! $news_blog->description !!}</p>
                            </div>
                            {{-- <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-card">
                                        <div class="number">01</div>
                                        <h4>Standards Of Treatment</h4>
                                        <p>It is a long established fact that a eader will be distracted by threadable.</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-card">
                                        <div class="number">02</div>
                                        <h4>Well Communication</h4>
                                        <p>It is a long established fact that a eader will be distracted by threadable.</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-card">
                                        <div class="number">03</div>
                                        <h4>Infection Prevention</h4>
                                        <p>It is a long established fact that a eader will be distracted by threadable.</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-card">
                                        <div class="number">04</div>
                                        <h4>30+ Years Experience</h4>
                                        <p>It is a long established fact that a eader will be distracted by threadable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-inner-content">
                                        <h4>Medical Laboratory And Specialists Services</h4>
                                        <p>Simply dummy text of the printing and typesetting industry lorem ipsum has been the industry's standard dummy.</p>
                                        <ul class="list">
                                            <li><i class='bx bx-check'></i> Routine and medical care</li>
                                            <li><i class='bx bx-check'></i> Excellence in Healthcare every</li>
                                            <li><i class='bx bx-check'></i> Building a healthy environment</li>
                                            <li><i class='bx bx-check'></i> Routine and medical care</li>
                                            <li><i class='bx bx-check'></i> Excellence in Healthcare every</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="services-details-inner-image">
                                        <img src="{{ asset('/front_end_style/assets/images/skin-care/blog/blog-1.jpg') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <h4>Health Tips & Information</h4>
                                <p>There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some humour or randomised words which don't look even slightly believable if you are going to use a passage.</p>
                            </div>
                            <div class="hospital-faq-accordion">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <div class="accordion-title active">
                                            <i class='bx bx-plus'></i>
                                            How can I book an appointment for emergency treatment?
                                        </div>
                                        <div class="accordion-content show">
                                            <p>Lorem ipsum dolor sit amet cons todo eiusmod tempor incididu ut ali xercitation ullamco Lorem ipsum dolor sit amet consectetur adipisic elit sed do eiusmod tem incidid dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-title">
                                            <i class='bx bx-plus'></i>
                                            Do you use anesthetics for operation in your hospital?
                                        </div>

                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet cons todo eiusmod tempor incididu ut ali xercitation ullamco Lorem ipsum dolor sit amet consectetur adipisic elit sed do eiusmod tem incidid dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-title">
                                            <i class='bx bx-plus'></i>
                                            What is procedures of parathyroid scanning in your hospital?
                                        </div>

                                        <div class="accordion-content">
                                            <p>Lorem ipsum dolor sit amet cons todo eiusmod tempor incididu ut ali xercitation ullamco Lorem ipsum dolor sit amet consectetur adipisic elit sed do eiusmod tem incidid dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hospital Services Details Area -->

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
