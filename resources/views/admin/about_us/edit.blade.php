@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{-- =========================================================== --}}
            {{-- ================== Sweet Alert Section ==================== --}}
            {{-- =========================================================== --}}
            <div>
                @if (session()->has('success'))
                    <script>
                        swal("Great Job !!!", "{!! Session::get('success') !!}", "success", {
                            button: "OK",
                        });

                    </script>
                @endif
                @if (session()->has('danger'))
                    <script>
                        swal("oops !!!", "{!! Session::get('danger') !!}", "error", {
                            button: "Close",
                        });

                    </script>
                @endif
            </div>

            {{-- ============================================== --}}
            {{-- ================== Header ==================== --}}
            {{-- ============================================== --}}
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1>Update About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.about_us-index') }}">
                                    <span class="mdi mdi-account-group"></span> About Us
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>

                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Update  About Us :</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.about_us-update', $about->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">About us - About Dr EN:</h3>
                                                    <div class="input-group">
                                                        <textarea id="about_dr_en" name="about_dr_en" class="form-control" rows="10">{!! isset($about->about_dr_en) ? $about->about_dr_en : null !!}</textarea>
                                                    </div>
                                                    @error('about_dr_en')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">About us - About Dr AR:</h3>
                                                    <div class="input-group">

                                                        <textarea id="about_dr_ar" name="about_dr_ar" class="form-control"
                                                            rows="10">{!! isset($about->about_dr_ar) ? $about->about_dr_ar : null !!}</textarea>
                                                    </div>
                                                    @error('about_dr_ar')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01"> Vision EN:</h3>
                                                    <div class="input-group">

                                                        <textarea id="vision_en" name="vision_en" class="form-control"
                                                            rows="10">{!! isset($about->vision_en) ? $about->vision_en : null !!}</textarea>
                                                    </div>
                                                    @error('vision_en')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01"> Vision AR:</h3>
                                                    <div class="input-group">

                                                        <textarea id="vision_ar" name="vision_ar" class="form-control"
                                                            rows="10">{!! isset($about->vision_ar) ? $about->vision_ar : null !!}</textarea>
                                                    </div>
                                                    @error('vision_ar')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>



                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01"> Mission EN:</h3>
                                                    <div class="input-group">

                                                        <textarea id="mission_en" name="mission_en" class="form-control"
                                                        rows="10">{!! isset($about->mission_en) ? $about->mission_en : null !!}</textarea>

                                                    </div>
                                                    @error('mission_en')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01"> Mission AR:</h3>
                                                    <div class="input-group">

                                                        <textarea id="mission_ar" name="mission_ar" class="form-control"
                                                        rows="10">{!! isset($about->mission_ar) ? $about->mission_ar : null !!}</textarea>

                                                    </div>
                                                    @error('mission_ar')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>


                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">About us - About Clinic EN:</h3>
                                                    <div class="input-group">
                                                        <textarea id="about_clinic_en" name="about_clinic_en" class="form-control" rows="10">{!! isset($about->about_clinic_en) ? $about->about_clinic_en : null !!}</textarea>
                                                    </div>
                                                    @error('about_clinic_en')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">About us - About Clinic AR:</h3>
                                                    <div class="input-group">

                                                        <textarea id="about_clinic_ar" name="about_clinic_ar" class="form-control"
                                                            rows="10">{!! isset($about->about_clinic_ar) ? $about->about_clinic_ar : null !!}</textarea>
                                                    </div>
                                                    @error('about_clinic_ar')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">Insurance Text EN</h3>
                                                    <div class="input-group">
                                                        <textarea id="insurance_text_en" name="insurance_text_en" class="form-control" rows="10">{!! isset($about->insurance_text_en) ? $about->insurance_text_en : null !!}</textarea>
                                                    </div>
                                                    @error('insurance_text_en')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <h3 class="mb-3" for="validationServer01">Insurance Text AR :</h3>
                                                    <div class="input-group">

                                                        <textarea id="insurance_text_ar" name="insurance_text_ar" class="form-control"
                                                            rows="10">{!! isset($about->insurance_text_ar) ? $about->insurance_text_ar : null !!}</textarea>
                                                    </div>
                                                    @error('insurance_text_ar')
                                                        <h4 class="form-text text-danger"> - {{ $message }}</h4>
                                                    @enderror
                                                </div>



                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Updates</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

        <script>
                CKEDITOR.replace( 'about_dr_en',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'about_dr_ar',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'about_clinic_ar',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'about_clinic_en',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'insurance_text_ar',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'insurance_text_en',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'mission_ar',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'mission_en',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'vision_ar',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
                CKEDITOR.replace( 'vision_en',{
                    fullPage: true,
                    allowedContent: true,
                    height : '800px'
                });
        </script>
    @endsection
