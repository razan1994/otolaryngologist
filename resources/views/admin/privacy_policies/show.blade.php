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
            <h1>Show Privacy Policy</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.privacy_policies-index') }}">
                            <i class="fas fa-user-secret"></i></span> List Privacy Policy
                        </a>
                    </li>
                    <li class="breadcrumb-item">

                        <i class="mdi mdi-eye"></i> Show
                    </li>



                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('super_admin.privacy_policies-edit', $privacy_policy->id) }}" class="mb-1 btn btn-primary"><i
                    class="mdi mdi-playlist-edit"></i> Edit </a>

        </div>

    </div>







    <div class="bg-white border rounded">


        <div class="row no-gutters">

            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Title AR :</h4>


                        <p style="color: blue">{!! isset($privacy_policy->privacy_policy_title_ar) ? $privacy_policy->privacy_policy_title_ar : "<span style='color:red;'>Undefined</span>" !!} </p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Title EN :</h4>

                        <p style="color: blue">{!! isset($privacy_policy->privacy_policy_title_en) ? $privacy_policy->privacy_policy_title_en : "<span style='color:red;'>Undefined</span>" !!} </p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Status :</h4>
                        <p style="color: blue">{!! isset($privacy_policy->privacy_policy_status) ? $privacy_policy->privacy_policy_status : "<span style='color:red;'>Undefined</span>" !!} </p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3">  Privacy Policy Details EN:</h4>
                        <p style="color: blue">{!! isset($privacy_policy->privacy_policy_des_en) ? $privacy_policy->privacy_policy_des_en : "<span style='color:red;'>Undefined</span>" !!} </p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3">  Privacy Policy Details AR :</h4>
                        <p style="color: blue">{!! isset($privacy_policy->privacy_policy_des_ar) ? $privacy_policy->privacy_policy_des_ar : "<span style='color:red;'>Undefined</span>" !!} </p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>



        </div>
    @endsection
