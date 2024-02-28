        
        @extends('front_end_inners.app_front_end')

        @section('content')
        <br>
        <br>
        <br>
        <br>
        <!-- Start Hospital Services Details Area -->
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="widget-area hospital-widget-area">
                            <div class="widget widget_services_info">
                                <div class="info">
                                    <i class='bx bx-phone-call'></i>
                                    <h4>{{__('front_end.Eardisease_Contact')}}</h4>
                                    <a href="tel:00874847348734">+962799559157</a>
                                </div>
                                <p>{{__('front_end.Eardisease_Contact1')}}</p>
                                <a href="{{ url('ContactUs') }}" class="default-btn">{{__('front_end.ContactUs_Contact')}}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Hospital Services Details Area -->

        @endsection