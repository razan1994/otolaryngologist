@extends('admin.layouts.app')


@section('content')
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

    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1> Show Service </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.insurances-index') }}">
                            <i class="far fa-newspaper"></i></span> List insurances
                        </a>
                    </li>
                    <li class="breadcrumb-item">

                        <i class="mdi mdi-eye"></i> Show
                        </li>



                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('super_admin.insurances-edit', $treatment->id) }}" class="mb-1 btn btn-primary"><i
                    class="mdi mdi-playlist-edit"></i> Edit </a>

        </div>

    </div>







    <div class="bg-white border rounded">


        <div class="row no-gutters">

            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> title AR :</h4>
                        <p style="color: blue">
                            {{ isset($treatment->title_ar) ? $treatment->title_ar : 'Undefined' }}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Titl EN :</h4>
                        <p style="color: blue">
                            {{ isset($treatment->title_en) ? $treatment->title_en : 'Undefined' }}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>



        </div>
    </div>
@endsection
