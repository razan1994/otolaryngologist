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
            <h1> Show Blog </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('super_admin.blogs-index') }}">
                            <i class="far fa-newspaper"></i></span> List Blogs
                        </a>
                    </li>
                    <li class="breadcrumb-item">

                        <i class="mdi mdi-eye"></i> Show
                        </li>



                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('super_admin.blogs-edit', $news_blog->id) }}" class="mb-1 btn btn-primary"><i
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
                            {{ isset($news_blog->title_ar) ? $news_blog->title_ar : 'Undefined' }}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Titl EN :</h4>
                        <p style="color: blue">
                            {{ isset($news_blog->title_en) ? $news_blog->title_en : 'Undefined' }}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Status :</h4>

                        <p style="color: blue">
                            {!! isset($news_blog->status) ? $news_blog->status : 'Undefined' !!}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Blog Details EN :</h4>
                        <p style="color: blue">
                            {!! isset($news_blog->desc_en) ? $news_blog->desc_en : 'Undefined' !!}</p>
                    </div>
                    <hr class="w-100">
                </div>
            </div>

            <div class="col-md-6">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="text-center pb-4">
                        <h4 class="text-dark mb-3"> Blog Details AR :</h4>

                        <p style="color: blue">
                            {!! isset($news_blog->desc_ar) ? $news_blog->desc_ar : 'Undefined' !!}</p>

                    </div>
                    <hr class="w-100">
                </div>
            </div>


            <div class="col-md-12">
                <div class="col-md-6 profile-content-left text-center  pt-5 pb-3 px-3 px-xl-5" style="margin: auto;">
                    <h3 class="text-dark mb-3"> Image </h3>
                    @if ($news_blog->image && file_exists($news_blog->image))
                        <img style="width:100%; margin-top: 8px;height: 300px;"
                            src="{{ asset($news_blog->image) }}" class="img-thumbnail image-preview"
                            alt="">
                    @else
                        <img style="width: 75%; margin-top: 8px" src="{{ asset('images_default/user.jpg') }}"
                            class="img-thumbnail image-preview" alt="">
                    @endif


                </div>
                <hr class="w-100">
            </div>


        </div>
    </div>
@endsection
