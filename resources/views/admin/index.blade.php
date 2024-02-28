@extends('admin.layouts.app')

@section('content')
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
                swal("Oops !!!", "{!! Session::get('danger') !!}", "error", {
                    button: "Close",
                });
            </script>
        @endif
    </div>

    {{-- ====================================================================== --}}
    {{-- =========================== All Counters ============================= --}}
    {{-- ====================================================================== --}}

    <div class="row">


    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-secondary">
                    <i class="mdi mdi-timer-sand mdi-spin text-white "></i>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2"><a href="#">0</a></h4>
                    <p style="color: black;"><a href="#">DDDDDD</a></p>
                </div>
            </div>
        </div>

    </div>
@endsection
