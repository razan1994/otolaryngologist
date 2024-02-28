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
                        swal("Oops !!!", "{!! Session::get('danger') !!}", "error", {
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
                    <h1>Edite Blogs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.Photo-index') }}">
                                    <i class="far fa-newspaper"></i></span> List Photo
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"> Edit </li>
                        </ol>
                    </nav>
                </div>

                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2> Edit Photo : </h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.Photo-update', [$news_blog->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Title AR <strong class="text-danger"> *
                                                            @error('title_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_ar"
                                                            class="form-control @error('title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Title AR"
                                                            value="{{ $news_blog->title_ar }}">
                                                    </div>
                                                </div>

                                                {{-- Title EN --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Title EN <strong class="text-danger"> *
                                                            @error('title_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_en"
                                                            class="form-control @error('title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Titl_EN"
                                                            value="{{ $news_blog->title_en }}">
                                                    </div>
                                                </div>

                                                {{-- Status --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Status
                                                        <strong class="text-danger"> * @error('status')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="status" class="selectpicker" data-live-search="true"
                                                            data-width="88%" id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Choose...</option>
                                                            <option value="1"
                                                                @if ($news_blog->status == '1') selected @endif>Active
                                                            </option>
                                                            <option value="2"
                                                                @if ($news_blog->status == '2') selected @endif>Inactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- Main Image --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Image After<strong class="text-danger">
                                                            * @error('image')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="image" class="form-control"
                                                            id="validationServer01" placeholder="image">
                                                    </div>
                                                    <div style="text-align: center">
                                                        @if ($news_blog->image_after && file_exists($news_blog->image_after))
                                                            <img src="{{ asset($news_blog->image_after) }}" width="100"
                                                                height="100"
                                                                style="border-radius: 10px; border:solid 1px black;">
                                                        @else
                                                            <img src="{{ asset('images_default/default.jpg') }}"
                                                                width="100" height="100"
                                                                style="border-radius: 10px; border:solid 1px black;">
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- Main Image --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Image Before<strong class="text-danger">
                                                            * @error('image')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-cloud-upload"></span>
                                                        </div>
                                                        <input type="file" name="image1" class="form-control"
                                                            id="validationServer01" placeholder="image">
                                                    </div>
                                                    <div style="text-align: center">
                                                        @if ($news_blog->image_before && file_exists($news_blog->image_before))
                                                            <img src="{{ asset($news_blog->image_before) }}"
                                                                width="100" height="100"
                                                                style="border-radius: 10px; border:solid 1px black;">
                                                        @else
                                                            <img src="{{ asset('images_default/default.jpg') }}"
                                                                width="100" height="100"
                                                                style="border-radius: 10px; border:solid 1px black;">
                                                        @endif
                                                    </div>
                                                </div>


                                                {{-- @lang('front_end.News_Blog_Details_AR') --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Before & After
                                                        Details AR :
                                                        <strong class="text-danger"> * @error('desc_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea id="desc_ar" name="desc_ar" class="form-control ">{{ $news_blog->desc_ar }}</textarea>
                                                </div>

                                                {{-- @lang('front_end.News_Blog_Details_EN') --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Before & After
                                                        Details EN :
                                                        <strong class="text-danger">* @error('desc_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea id="desc_en" name="desc_en" class="form-control" rows="10">{{ $news_blog->desc_en }}</textarea>
                                                </div>

                                                @if(Auth::user()->id == 1)
                                                {{-- alt text Ar --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Alt Text AR <strong class="text-danger">
                                                            * @error('alt_text_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="alt_text_ar"
                                                            class="form-control @error('alt_text_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Alt Text Ar"
                                                            value="{{ $news_blog->alt_text_ar }}">
                                                    </div>
                                                </div>
                                                {{-- alt text En --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Alt Text EN <strong class="text-danger">
                                                            * @error('alt_text_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="alt_text_en"
                                                            class="form-control @error('alt_text_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Alt Text EN"
                                                            value="{{ $news_blog->alt_text_en }}">
                                                    </div>
                                                </div>
                                                {{-- image title text Ar --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Image Title Text AR <strong
                                                            class="text-danger"> * @error('image_title_text_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="image_title_text_ar"
                                                            class="form-control @error('image_title_text_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Image Titl Text Ar"
                                                            value="{{ $news_blog->image_title_text_ar }}">

                                                    </div>
                                                </div>
                                                {{-- image title text En --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Image Title Text EN <strong
                                                            class="text-danger"> * @error('image_title_text_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="image_title_text_en"
                                                            class="form-control @error('image_title_text_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Image Titl Text En"
                                                            value="{{ $news_blog->image_title_text_en }}">
                                                    </div>
                                                </div>

                                                {{-- H1 Ar --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">H1 AR <strong class="text-danger"> *
                                                            @error('h1_val_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="h1_val_ar"
                                                            class="form-control @error('h1_val_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="H2 AR"
                                                            value="{{ $news_blog->h1_val_ar }}">
                                                    </div>
                                                </div>

                                                {{-- H1 en --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">H1 EN <strong class="text-danger"> *
                                                            @error('h1_val_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="h1_val_en"
                                                            class="form-control @error('h1_val_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="H2 AR"
                                                            value="{{ $news_blog->h1_val_en }}">
                                                    </div>
                                                </div>


                                                {{-- H2 ar --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">H2 AR<strong class="text-danger"> *
                                                            @error('h2_val_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="h2_val_ar"
                                                            class="form-control @error('image_title_text_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="H2 Ar"
                                                            value="{{ $news_blog->h2_val_ar }}">

                                                    </div>
                                                </div>
                                                {{-- H2 En --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">H2 EN <strong class="text-danger"> *
                                                            @error('h2_val_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="h2_val_en"
                                                            class="form-control @error('h2_val_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Image Titl Text En"
                                                            value="{{ $news_blog->h2_val_en }}">
                                                    </div>
                                                </div>

                                                {{-- seo title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">SEO Title AR <strong class="text-danger">
                                                            * @error('seo_title_ar')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="seo_title_ar"
                                                            class="form-control @error('seo_title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="SEO Titl AR"
                                                            value="{{ $news_blog->seo_title_ar }}">
                                                    </div>
                                                </div>
                                                {{-- seo title En --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">SEO Title EN <strong class="text-danger">
                                                            * @error('seo_title_en')
                                                                -
                                                                {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="seo_title_en"
                                                            class="form-control @error('seo_title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="h2 En"
                                                            value="{{ $news_blog->seo_title_en }}">
                                                    </div>
                                                </div>
                                                {{-- @lang('front_end.News_Blog_Details_AR') --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Meta Desc AR :
                                                        <strong class="text-danger"> * @error('meta_desc_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="meta_desc_ar" rows="10" class="form-control" placeholder="Meta Desc AR">{{ $news_blog->meta_desc_ar }}</textarea>
                                                </div>

                                                {{-- @lang('front_end.News_Blog_Details_EN') --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Meta Desc EN :
                                                        <strong class="text-danger">* @error('meta_desc_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="meta_desc_en" class="form-control" rows="10" placeholder="Meta Desc EN">{{ $news_blog->meta_desc_en }}</textarea>
                                                </div>
                                                {{-- SEO Meta data AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> keywords AR :
                                                        <strong class="text-danger"> * @error('keywords_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="keywords_ar" class="form-control" placeholder="Kewords AR">{{ $news_blog->keywords_ar }}</textarea>
                                                </div>
                                                {{-- SEO Meta data EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> keywords EN :
                                                        <strong class="text-danger"> * @error('keywords_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="keywords_en" class="form-control" placeholder="Kewords EN">{{ $news_blog->keywords_en }}</textarea>
                                                </div>
                                                {{-- Redirect 301 AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Redirect 301 AR :
                                                        <strong class="text-danger"> * @error('redirect_301_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="redirect_301_ar" class="form-control" placeholder="Redirect 301 AR">{{ $news_blog->redirect_301_ar }}</textarea>
                                                </div>
                                                {{-- Redirect 301 EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Redirect 301 EN :
                                                        <strong class="text-danger"> * @error('redirect_301_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="redirect_301_en" class="form-control" placeholder="Redirect 301 EN">{{ $news_blog->redirect_301_en }}</textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Tags :
                                                        <strong class="text-danger"> * @error('redirect_301_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="tags" class="form-control" placeholder="enter , after your tag">{{ $news_blog->tags }}</textarea>
                                                </div>
                                                @endif

                                                <div class="col-md-12 mb-3">
                                                    <div class="input-group">
                                                        <button class="btn btn-primary" type="submit">Save
                                                            Updates</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================== --}}
        {{-- ================ Advance Text Area Section =============== --}}
        {{-- ========================================================== --}}
        <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

        <script>
            CKEDITOR.replace('desc_ar', {
                fullPage: true,
                allowedContent: true,
                height: '800px'
            });
            CKEDITOR.replace('desc_en', {
                fullPage: true,
                allowedContent: true,
                height: '800px'
            });
        </script>
        {{-- ========================================================== --}}
        {{-- ================ Advance Text Area Section =============== --}}
        {{-- ========================================================== --}}
    @endsection
