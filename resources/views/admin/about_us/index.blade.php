@extends('admin.layouts.app')

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
                    <h1>About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
                <div>
                        <a href="{{ route('super_admin.about_us-edit', $about->id) }}" class="mb-1 btn btn-primary"><i
                                class="mdi mdi-playlist-edit"></i> Edit </a>
                </div>
            </div>

            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}


            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>About Us</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">About DR EN:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->about_dr_en !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">About DR AR:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->about_dr_ar !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">About Clinic EN:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->about_clinic_en !!}

                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">About Clinic AR:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->about_clinic_ar !!}

                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">Insurance Text EN:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->insurance_text_en !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">Insurance Text AR:</h3>
                                                        <p class="text-dark">
                                                        {!! $about->insurance_text_ar !!}

                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">Specialties EN:</h3>
                                                        <ol>
                                                            <li>ttttttttttttt</li>
                                                            <li>ttttttttttttt</li>
                                                            <li>ttttttttttttt</li>
                                                            <li>ttttttttttttt</li>
                                                            <li>ttttttttttttt</li>
                                                            <li>ttttttttttttt</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-center ">
                                                    <div class="text-center pb-4">
                                                        <h3 class="text-dark pb-2">Specialties AR:</h3>
                                                        <ol>
                                                            <li>تست تست تست تست تست تست</li>
                                                            <li>تست تست تست تست تست تست</li>
                                                            <li>تست تست تست تست تست تست</li>
                                                            <li>تست تست تست تست تست تست</li>
                                                            <li>تست تست تست تست تست تست</li>
                                                            <li>تست تست تست تست تست تست</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <hr class="w-100">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
