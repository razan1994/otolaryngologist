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
        <link rel="canonical" href="https://otolaryngologist-jo.com/en" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en" hreflang="en-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar" hreflang="ar-jo" />
    @else
        <link rel="canonical" href="https://otolaryngologist-jo.com/ar" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/ar" hreflang="ar-jo" />
        <link rel="alternate" href="https://otolaryngologist-jo.com/en" hreflang="en-jo" />
    @endif
@endsection


@section('h1_val')
    {{ $seo_operation?->h1_val }}
@endsection
@section('h2_val')
    {{ $seo_operation?->h2_val }}
@endsection

<style>
    /*# Before & After CSS */
    .wrapper {
        position: relative;
        height: 500px;
        width: 100%;
        max-width: 750px;
        overflow: hidden;
        background: #fff;
        border: 7px solid #fff;
    }

    .wrapper .images {
        height: 100%;
        width: 100%;
        display: flex;
    }

    .wrapper .images .img-1,
    .wrapper .images .img-2 {
        height: 100%;
        width: 100%;
        background-size: cover;
        background-position: center;
    }

    .wrapper .images .img-2 {
        position: absolute;
        width: 50%;
    }

    .slider {
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 10;
    }

    .slider input {
        width: 100%;
        outline: none;
        background: none;
        -webkit-appearance: none;
    }

    .slider input::-webkit-slider-thumb {
        height: 486px;
        width: 3px;
        background: none;
        -webkit-appearance: none;
        cursor: col-resize;
    }

    .slider .drag-line {
        width: 3px;
        height: 486px;
        position: absolute;
        left: 49.85%;
        pointer-events: none;
    }

    .slider .drag-line::before,
    .slider .drag-line::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 222px;
        background: #fff;
    }

    .slider .drag-line::before {
        top: 0;
    }

    .slider .drag-line::after {
        bottom: 0;
    }

    .slider .drag-line span {
        height: 42px;
        width: 42px;
        border: 3px solid #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .slider .drag-line span::before,
    .slider .drag-line span::after {
        position: absolute;
        content: "";
        top: 50%;
        border: 10px solid transparent;
        border-bottom-width: 0px;
        border-right-width: 0px;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .slider .drag-line span::before {
        left: 40%;
        border-left-color: #fff;
    }

    .slider .drag-line span::after {
        left: 60%;
        border-top-color: #fff;
    }


    /* Mobile Styles */
    @media (max-width: 768px) {
        .wrapper {
            position: relative;
            height: 300px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            background: #443838;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper .images {
            height: 100%;
            width: 100%;
            display: flex;
        }

        .wrapper .images .img-1,
        .wrapper .images .img-2 {
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        .wrapper .images .img-2 {
            position: absolute;
            width: 50%;
            overflow: hidden;
        }

        .wrapper .slider {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }


        .wrapper .slider input[type="range"]::-webkit-slider-thumb {
            height: 300px;
        }

        .slider .drag-line {
            height: 300px;
        }

        .slider .drag-line::before,
        .slider .drag-line::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 500px;
            background: #fff;
        }

        .slider .drag-line::before {
            top: 0;
        }

        .slider .drag-line::after {
            bottom: 0;
        }

        .slider .drag-line span {
            height: 42px;
            width: 42px;
            border: 3px solid #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .slider .drag-line span::before,
        .slider .drag-line span::after {
            position: absolute;
            content: "";
            top: 50%;
            border: 10px solid transparent;
            border-bottom-width: 0px;
            border-right-width: 0px;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .slider .drag-line span::before {
            left: 40%;
            border-left-color: #fff;
        }

        .slider .drag-line span::after {
            left: 60%;
            border-top-color: #fff;
        }

        .label-before,
        .label-after {
            font-size: 12px;
            padding: 3px;
        }
    }

    /* Extra Small Screens */
    @media (max-width: 480px) {
        .wrapper {
            position: relative;
            height: 200px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper .images {
            height: 100%;
            width: 100%;
            display: flex;
        }

        .wrapper .images .img-1,
        .wrapper .images .img-2 {
            height: 100%;
            width: 100%;
            background-size: cover;
        }

        .wrapper .images .img-2 {
            position: absolute;
            width: 50%;
            overflow: hidden;
        }

        .wrapper .slider {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .wrapper .slider input[type="range"]::-webkit-slider-thumb {
            height: 200px;
        }

        .slider .drag-line {
            height: 200px;
        }

        ..slider .drag-line::before,
        .slider .drag-line::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 500px;
            background: #fff;
        }

        .slider .drag-line::before {
            top: 0;
        }

        .slider .drag-line::after {
            bottom: 0;
        }

        .slider .drag-line span {
            height: 42px;
            width: 42px;
            border: 3px solid #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .slider .drag-line span::before,
        .slider .drag-line span::after {
            position: absolute;
            content: "";
            top: 50%;
            border: 10px solid transparent;
            border-bottom-width: 0px;
            border-right-width: 0px;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .slider .drag-line span::before {
            left: 40%;
            border-left-color: #fff;
        }

        .slider .drag-line span::after {
            left: 60%;
            border-top-color: #fff;
        }

        .label-before,
        .label-after {
            font-size: 10px;
            padding: 2px;
        }
    }
</style>


@section('content')

   <!-- Start Video section -->
   <div class="full-video-banner">
    <video preload="none" class="banner-video" autoplay muted loop playsinline>
        <source src="{{ asset('front_end_style/assets/videos/banner-video1.mp4') }}" type="video/mp4">
        <p>الدكتور أنس أبو شملة - اختصاصي أنف وأذن وحنجرة معتمد في الأردن, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
            الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن
            Dr. Anas Abushamleh - Board-Certified ENT Specialist in Jordan, Expert in Treating Ear, Nose, and Throat Diseases, Member of the Jordanian Surgeons Association and the Jordan Medical Association, Best ENT Doctor in Amman, Jordan."
        </p>
    </video>
    <div class="overlay"></div>
    <div class="banner-content">
        <h4> {{ __('front_end.slider_title') }}
            <span>{{ __('front_end.slider_title2') }}</span>
        </h4>
        <p>{{ __('front_end.slider_desc') }}</p>
        <a href="{{ route('dranas') }}" class="primary-btn1 hover-btn3">{{ __('front_end.slider_btn') }}</a>
    </div>
</div>
<!-- End Video section -->


    <!-- Start Blogs Features section -->
    <div class="blog-masonary-section mt-110 mb-110">
        <div class="container-xl container-fluid">
            <div class="blog-masonary mb-80">
                <div class="row justify-content-center g-4 mb-50">
                    <div class="col-lg-4 col-sm-10">
                        <div class="article-card">
                            <div class="article-card-content style-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{ asset('front_end_style/assets/img/home1/icon1.png') }}" alt="الدكتور أنس ابوشملة, أفضل طبيب أنف وأذن وحنجرة ووالجيوب الأنفية بالمنظار وتجميل الأنف في عمان الأردن, خبير في علاج أمراض الأذن والأنف والحنجرة, أمراض الأنف، التهابات الأنف، انحراف الحاجز الأنفي، التهاب الجيوب الأنفية، حساسية الأنف، تورم الأنف، انسداد الأنف، أورام الأنف، علاج الأنف، ألم الأنف، تنظير الأنف، تشخيص أمراض الأنف، جراحة الأنف، علاج التهابات الأنف، علاج انسداد الأنف، التهابات الجيوب الأنفية المزمنة، علاج حساسية الأنف، أسباب انسداد الأنف، أعراض أمراض الأنف، تشخيص التهاب الأنف, Dr. Anas Abu Shumla, the best ENT specialist and endoscopic sinus surgeon, and nasal plastic surgeon in Amman, Jordan, is an expert in treating ear, nose, and throat diseases. His specialties include nasal diseases, nasal inflammations, deviated nasal septum, sinusitis, nasal allergies, nasal swelling, nasal obstruction, nasal tumors, nasal treatment, nasal pain, nasal endoscopy, diagnosis of nasal diseases, nasal surgery, treatment of nasal inflammations, treatment of nasal obstruction, chronic sinusitis treatment, treatment of nasal allergies, causes of nasal obstruction, symptoms of nasal diseases, and diagnosis of nasal inflammation."
                                        style="width: 70px; height: 70px;" class="me-3">
                                    <h5 class="mb-0">
                                        <a href="#" class="hover-underline">
                                            {{ __('front_end.Features_Title1') }}
                                        </a>
                                    </h5>
                                </div>
                                <p class="Features_ReadMore">{{ __('front_end.Features_Desc1') }}</p>
                                <div class="more-content" style="display: none;">
                                    <p>{{ __('front_end.Features_ReadMore1') }}</p>
                                    <p>{{ __('front_end.keywords_nose_diseases') }}</p>
                                </div>
                                <a href="javascript:void(0);" class="read-more" onclick="toggleContent(this)">
                                    {{ Config::get('app.locale') == 'en' ? 'Read More' : 'اقرأ المزيد' }}
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-sm-10">
                        <div class="article-card">
                            <div class="article-card-content style-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{ asset('front_end_style/assets/img/home1/icon2.png') }}" alt="الدكتور أنس ابوشملة, أفضل طبيب أنف وأذن وحنجرة ووالجيوب الأنفية بالمنظار وتجميل الأنف في عمان الأردن, خبير في علاج أمراض الأذن والأنف والحنجرة, أمراض الأنف، أمراض الأذن، التهاب الأذن، فقدان السمع، طنين الأذن، أوجاع الأذن، انسداد الأذن، عدوى الأذن، ألم الأذن، جراحة الأذن، تشخيص أمراض الأذن، علاج التهاب الأذن، ضعف السمع، التهاب الأذن الوسطى، التهاب الأذن الخارجية، أذن swimmer، انسداد قناة الأذن، داء منيير، صمم، مشاكل الأذن، مشاكل السمع، جراحة الأذن، أعراض طنين الأذن، أسباب فقدان السمع، علاج طنين الأذن، مشاكل الأذن الداخلية، استشاري أمراض الأذن، تقنيات علاج الأذن، تأهيل السمع، تشخيص طنين الأذن، الوقاية من مشاكل الأذن، استشارات الأذن، أمراض الأذن الشائعة، علاج عدوى الأذن، اضطرابات الأذن,Dr. Anas Abu Shumla, the best ENT specialist and endoscopic sinus and nasal cosmetic surgeon in Amman, Jordan, is an expert in treating ear, nose, and throat diseases. His expertise includes ear diseases, ear infections, hearing loss, tinnitus, ear pain, ear blockage, ear infections, ear surgery, diagnosing ear diseases, treating ear inflammation, hearing impairment, middle ear infections, outer ear infections, swimmer's ear, ear canal blockage, Meniere's disease, deafness, ear problems, hearing problems, ENT surgery, symptoms of tinnitus, causes of hearing loss, treatment of tinnitus, inner ear issues, ENT consultant, ear treatment techniques, hearing rehabilitation, tinnitus diagnosis, prevention of ear problems, ear consultations, common ear diseases, ear infection treatment, and ear disorders."
                                        style="width: 70px; height: 70px;" class="me-3">
                                    <h5 class="mb-0">
                                        <a href="#" class="hover-underline">
                                            {{ __('front_end.Features_Title2') }}
                                        </a>
                                    </h5>
                                </div>
                                <p class="Features_ReadMore">{{ __('front_end.Features_Desc2') }}</p>
                                <div class="more-content" style="display: none;">
                                    <p>{{ __('front_end.Features_ReadMore2') }}</p>
                                    <p>{{ __('front_end.keywords_ear_diseases') }}</p>

                                </div>
                                <a href="javascript:void(0);" class="read-more" onclick="toggleContent(this)">
                                    {{ Config::get('app.locale') == 'en' ? 'Read More' : 'اقرأ المزيد' }}
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-sm-10">
                        <div class="article-card">
                            <div class="article-card-content style-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{ asset('front_end_style/assets/img/home1/icon3.png') }}" alt="الدكتور أنس ابوشملة, أفضل طبيب أنف وأذن وحنجرة ووالجيوب الأنفية بالمنظار وتجميل الأنف في عمان الأردن, خبير في علاج أمراض الأذن والأنف والحنجرة, أمراض الأنف، أمراض الحنجرة، التهاب الحنجرة، تشخيص أمراض الحنجرة، علاج التهاب الحنجرة، أورام الحنجرة، خراج الحنجرة، التهاب الحنجرة المزمن، صعوبة في البلع، بحة في الصوت، مشاكل الصوت، التهاب الحنجرة البكتيري، التهاب الحنجرة الفيروسي، تشنجات الحنجرة، سرطان الحنجرة، جراحة الحنجرة، تنظير الحنجرة، علاج بحة الصوت، أسباب صعوبة البلع، أعراض التهاب الحنجرة، تشخيص سرطان الحنجرة، علاج أورام الحنجرة، استشاري الحنجرة، علاج تشنجات الحنجرة، مشاكل الحنجرة، استشارات الحنجرة, Dr. Anas Abu Shumleh, the best ENT specialist and endoscopic sinus surgeon in Amman, Jordan, is an expert in treating ear, nose, and throat diseases. He specializes in nose diseases, throat diseases, laryngitis, diagnosing throat conditions, treating laryngitis, laryngeal tumors, laryngeal abscesses, chronic laryngitis, difficulty swallowing, hoarseness, voice problems, bacterial laryngitis, viral laryngitis, laryngeal spasms, laryngeal cancer, laryngeal surgery, laryngoscopy, treating hoarseness, causes of swallowing difficulties, symptoms of laryngitis, diagnosing laryngeal cancer, treating laryngeal tumors, laryngeal consultations, treating laryngeal spasms, throat issues, and laryngeal consultations."
                                        style="width: 70px; height: 70px;" class="me-3">
                                    <h5 class="mb-0">
                                        <a href="#" class="hover-underline">
                                            {{ __('front_end.Features_Title3') }}
                                        </a>
                                    </h5>
                                </div>
                                <p class="Features_ReadMore">{{ __('front_end.Features_Desc3') }}</p>
                                <div class="more-content" style="display: none;">
                                    <p>{{ __('front_end.Features_ReadMore3') }}</p>
                                    <p>{{ __('front_end.keywords_throat_diseases') }}</p>
                                </div>
                                <a href="javascript:void(0);" class="read-more" onclick="toggleContent(this)">
                                    {{ Config::get('app.locale') == 'en' ? 'Read More' : 'اقرأ المزيد' }}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- End Blogs Features section -->


    <!-- Start About section  -->
    <div style="background-color: #fff;padding-top:50px;padding-bottom:50px" class="makeup-section mb-110">
        <div class="container">

            <div class="makeup-top-item">

                <div class="row align-items-center justify-content-center mb-4 g-0 gy-4">
                    <div class="col-lg-5">
                        <div class="makeup-img hover-img">
                            <img src="{{ asset('front_end_style/assets/img/home1/makeup-img1.png') }}" alt="الدكتور أنس أبو شملة - اختصاصي أنف وأذن وحنجرة معتمد في الأردن, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن
Dr. Anas Abushamleh - Board-Certified ENT Specialist in Jordan, Expert in Treating Ear, Nose, and Throat Diseases, Member of the Jordanian Surgeons Association and the Jordan Medical Association, Best ENT Doctor in Amman, Jordan.">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="makeup-content1">
                            <div class="section-title2 style-2">
                                <h3>{{ __('front_end.nav_Dr_Anas') }}</h3>
                            </div>
                            <p id="aboutUsDrParagraph" class="article-card-content">
                                <span class="d-block d-lg-none">
                                    {!! Str::limit($about->AboutUsDr, 510) !!}
                                </span>
                            </p>
                            <div class="hover-img mb-20">
                                <img src="{{ asset('front_end_style/assets/img/home1/signture.png') }}" alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل اختصاصي أنف وأذن وحنجرة في عمان الأردن, جراحة الأنف والجيوب الأنفية في عمان, تقنيات متقدمة في طب الأنف والأذن والحنجرة, أمراض وعلاجات الأنف والأذن والحنجرة, أفضل عيادة أنف وأذن وحنجرة في عمان الأردن, رعاية ENT موثوقة في عمان,Dr. Anas Abu Shamla Clinic, Comprehensive Ear, Nose and Throat Services, Best ENT Specialist in Amman Jordan, Nose and Sinus Surgery in Amman, Advanced Otorhinolaryngology Techniques, Ear, Nose and Throat Diseases and Treatments, Best ENT Clinic in Amman Jordan, Reliable ENT Care in Amman">
                            </div>
                            <a href="{{ route('dranas') }}"
                                class="primary-btn1 style-2 hover-btn3">{{ __('front_end.btn_ReadMore') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center mb-4 g-0 gy-4 ">
                <div class="col-lg-8">
                    <div class="makeup-content">
                        <div class="section-title2 style-2">
                            <h3>{{ __('front_end.home_AboutClinic') }}</h3>
                        </div>
                        <p style="">{!! Str::limit($about->AboutUsClinic, 650) !!}</p>
                        <a href="{{ route('aboutClinic') }}"
                            class="primary-btn1 style-2 hover-btn3">{{ __('front_end.btn_ReadMore') }}</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="makeup-img hover-img">
                        <img src="{{ asset('front_end_style/assets/img/home1/makeup-img2.png') }}" alt="عيادة الدكتور أنس أبوشملة, خدمات شاملة في الأذن والأنف والحنجرة, أفضل اختصاصي أنف وأذن وحنجرة في عمان الأردن, جراحة الأنف والجيوب الأنفية في عمان, تقنيات متقدمة في طب الأنف والأذن والحنجرة, أمراض وعلاجات الأنف والأذن والحنجرة, أفضل عيادة أنف وأذن وحنجرة في عمان الأردن, رعاية ENT موثوقة في عمان,Dr. Anas Abu Shamla Clinic, Comprehensive Ear, Nose and Throat Services, Best ENT Specialist in Amman Jordan, Nose and Sinus Surgery in Amman, Advanced Otorhinolaryngology Techniques, Ear, Nose and Throat Diseases and Treatments, Best ENT Clinic in Amman Jordan, Reliable ENT Care in Amman">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About section -->


    <!-- Start Treatment section  -->
    @if (isset($treatments) && $treatments->count() > 0)
        <div class="newest-product-section mb-40">
            <div class="container">
                <div class="section-title2 style-2">
                    <h3>{{ __('front_end.nav_OurTreatments') }}</h3>
                    <div class="slider-btn">
                        <div class="prev-btn">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <div class="next-btn">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper newest-slider">
                            <div class="swiper-wrapper">
                                @foreach ($treatments as $treatment)
                                    <div class="swiper-slide">
                                        <div class="product-card hover-btn">
                                            <div class="product-card-img double-img">
                                                <a href="{{ route('treatments-details', [$treatment->alias_name]) }}">
                                                    @if (isset($treatment->image) && file_exists($treatment->image))
                                                        <img title="{{ $treatment->ImageTitle }}" src="{{ asset($treatment->image) }}" alt="{{ $treatment->ImageTitle }}"
                                                            class="img1">
                                                        <img title="{{ $treatment->ImageTitle }}" src="{{ asset($treatment->image) }}" alt="{{ $treatment->ImageTitle }}"
                                                            class="img2">
                                                    @endif

                                                </a>
                                                <div class="overlay">
                                                    <div class="cart-area">
                                                        <a href="{{ route('treatments-details', [$treatment->alias_name]) }}"
                                                            class="hover-btn3 add-cart-btn"><i
                                                                class="bi bi-check"></i>{{ __('front_end.btn_Read_More') }}</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product-card-content">
                                                <h6><a href="{{ route('treatments-details', [$treatment->alias_name]) }}"
                                                        class="hover-underline">{{ Str::limit($treatment->title, 20) }}</a>
                                                </h6>
                                            </div>
                                            <span class="for-border"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Treatment section -->

    <!-- Start Before & After section  -->
    <div class="just-for-section">
        <img src="{{ asset('front_end_style/assets/img/home1/icon/vector-1.svg') }}" alt="الدكتور أنس أبو شملة -  اختصاصي أنف وأذن وحنجرة معتمد في الأردن, استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن
Dr. Anas Abushamleh - Board-Certified ENT Specialist in Jordan, Expert in Treating Ear, Nose, and Throat Diseases, Member of the Jordanian Surgeons Association and the Jordan Medical Association, Best ENT Doctor in Amman, Jordan
" class="vector1">
        <img src="{{ asset('front_end_style/assets/img/home1/icon/vector-2.svg') }}" alt="الدكتور أنس أبو شملة -  اختصاصي أنف وأذن وحنجرة معتمد في الأردن, استشاري جراحات الأنف والأذن والحنجرة والجيوب الأنفية بالمنظار وتجميل الأنف, خبير في علاج أمراض الأذن والأنف والحنجرة, عضو جمعية
الجراحين الأردنيين ونقابة الأطباء الأردنية, آفضل دكتور أنف أذن وحنجرة في عمان الأردن
Dr. Anas Abushamleh - Board-Certified ENT Specialist in Jordan, Expert in Treating Ear, Nose, and Throat Diseases, Member of the Jordanian Surgeons Association and the Jordan Medical Association, Best ENT Doctor in Amman, Jordan
" class="vector2">
        <div class="container">
            <div class="section-title2 style-2">
                <h3>{{ __('front_end.BeforeandAfter') }}</h3>
                <div class="all-product hover-underline">
                    <a href="{{ route('gallery') }}">* {{ __('front_end.View_All') }}
                        <svg width="33" height="13" viewBox="0 0 33 13" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
                            <path
                                d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div dir="{{ app()->getLocale() == 'ar' ? 'ltr' : 'ltr' }}" class="row gy-4 justify-content-center">
                <div class="col-lg-12">
                    @if (isset($photos) && $photos->count() > 0)
                        <div id="splide" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($photos as $photo)
                                        <li class="splide__slide">
                                            <div class="wrapper">
                                                <div class="images">
                                                    <div title="{{ $photo->ImageTitle }}" class="img-1"
                                                        style="background-image: url('{{ asset($photo->image_after) }}');">
                                                    </div>
                                                    <div title="{{ $photo->ImageTitle }}" class="img-2"
                                                        style="background-image: url('{{ asset($photo->image_before) }}');">
                                                    </div>
                                                </div>
                                                <div class="slider">
                                                    <div class="drag-line">
                                                        <span></span>
                                                    </div>
                                                    <input type="range" min="0" max="100" value="50">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- End Before & After section  -->

    <!-- Start Blogs section  -->
    @if (isset($blogs) && $blogs->count() > 0)
        <div style="background-color: #fff;padding-top:70px;padding-bottom:70px" class="beauty-article-section mb-110">
            <div class="container-md container-fluid">
                <div class="section-title2 style-2">
                    <h3>{{ __('front_end.home_BlogsArticles') }}</h3>
                    <div class="all-product hover-underline">
                        <a href="{{ route('blogs') }}">* {{ __('front_end.View_All') }}
                            <svg width="33" height="13" viewBox="0 0 33 13" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25.5083 7.28L0.491206 7.25429C0.36093 7.25429 0.23599 7.18821 0.143871 7.0706C0.0517519 6.95299 0 6.79347 0 6.62714C0 6.46081 0.0517519 6.3013 0.143871 6.18369C0.23599 6.06607 0.36093 6 0.491206 6L25.5088 6.02571C25.6391 6.02571 25.764 6.09179 25.8561 6.2094C25.9482 6.32701 26 6.48653 26 6.65286C26 6.81919 25.9482 6.9787 25.8561 7.09631C25.764 7.21393 25.6386 7.28 25.5083 7.28Z" />
                                <path
                                    d="M33.0001 6.50854C29.2204 7.9435 24.5298 10.398 21.623 13L23.9157 6.50034L21.6317 0C24.5358 2.60547 29.2224 5.06539 33.0001 6.50854Z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="row gy-4">
                            @foreach ($blogs as $blog)
                                <div class="col-sm-4">
                                    <div class="article-card">
                                        <div class="article-image">
                                            <div class="blog-date">
                                                <a
                                                    href="{{ route('blog-details', [$blog->alias_name]) }}">{!! \Carbon\Carbon::parse($blog->created_at->toFormattedDateString())->translatedFormat('j F Y ') !!}</a>
                                            </div>
                                            <a href="{{ route('blog-details', [$blog->alias_name]) }}"
                                                class="article-card-img hover-img">
                                                @if (isset($blog->image) && file_exists($blog->image))
                                                    <img title="{{ $blog->ImageTitle }}" src="{{ asset($blog->image) }}" alt="{{ $blog->Alt }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="article-card-content">

                                            <h5><a style="margin-left: 0px;"
                                                    href="{{ route('blog-details', [$blog->alias_name]) }}"
                                                    class="hover-underline">{{ Str::limit($blog->title, 20) }}</a></h5>

                                            <p>{!! \Illuminate\Support\Str::limit(strip_tags($blog->description), 95) !!}</p>
                                            <a
                                                href="{{ route('blog-details', [$blog->alias_name]) }}">{{ __('front_end.btn_ReadMore') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Blogs section  -->


    <!-- Start HomeBlog section -->
    <div class="newsletter-section mb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter-banner hover-img">
                        <div class="newsletter-content">
                            <h2> {{ __('front_end.HomeBlog_Title') }}</h2>
                            <p class="short-text"> {{ __('front_end.HomeBlog_Desc') }}</p>
                            <div class="full-text home-more-content" style="display: none;">
                                <p>
                                    {{ __('front_end.HomeBlog_Readmore') }}
                                </p>
                                <p>
                                    {{ __('front_end.keywords_home_blog') }}
                                </p>
                            </div>


                            <a href="javascript:void(0)" class="read-more-blog" onclick="toggleContent(this)">
                                {{ __('front_end.btn_Read_More') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End HomeBlog section -->




    <!-- Start Instagram section section -->
    <div class="instagram-section mb-110 mt-110">
        <div class="container">
            <div class="section-title style-3">
                <h3>{{ __('front_end.instagramfeeds_title') }}</h3>
                <p>{{ __('front_end.instagramfeeds_SubTitle') }} <a
                        href="https://www.instagram.com/dr.anasabushamleh/">{{ __('front_end.instagramfeeds_Account') }}</a>
                </p>
            </div>
        </div>
        <div class="instagram-wrapper">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper instagram-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst1.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst3.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst4.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst5.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst6.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst7.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst8.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst9.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst10.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst11.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst12.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst13.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst14.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst15.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst16.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst17.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst18.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst19.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst20.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst21.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst22.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst23.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/Instagram/inst2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram2.jpg') }}"
                                            alt=""></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="https://www.instagram.com/"><img
                                            src="{{ asset('front_end_style/assets/img/home1/instagram1.webp') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram section section -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let video = document.querySelector('video');
            let source = video.querySelector('source');
            if (source && source.getAttribute('data-src')) {
                source.src = source.getAttribute('data-src');
                video.load();
            }
        });
    </script>

@endsection
