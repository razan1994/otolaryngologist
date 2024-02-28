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
                    <h1>Edite Operations</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.seo_operations-index',$operations->id) }}">
                                    <i class="far fa-newspaper"></i></span> List Seo Operations
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
                                        <h2> Edit Seo Operations : </h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.seo_operations-update', $operations->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                {{-- seo title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">SEO Title AR <strong class="text-danger"> *
                                                            @error('seo_title_ar')
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
                                                            value="{{ $operations->seo_title_ar }}">
                                                    </div>
                                                </div>
                                                {{-- seo title En --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">SEO Title EN <strong class="text-danger"> *
                                                            @error('seo_title_en')
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
                                                            id="validationServer01" placeholder="SEO Titl En"
                                                            value="{{ $operations->seo_title_en }}">
                                                    </div>
                                                </div>




                                                {{-- H1 AR --}}
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
                                                            id="validationServer01" placeholder="H1 EN"
                                                            value="{{ $operations->h1_val_ar }}">
                                                    </div>
                                                </div>

                                                                                                {{-- H1 En --}}
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
                                                                                                            id="validationServer01" placeholder="H1 EN"
                                                                                                            value="{{ $operations->h1_val_en }}">
                                                                                                    </div>
                                                                                                </div>


    {{-- H2 AR --}}
    <div class="col-md-6 mb-3">
        <label class="text-dark font-weight-medium mb-3"
            for="validationServer01">H2 AR <strong class="text-danger"> *
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
                class="form-control @error('h2_val_ar') is-invalid @enderror"
                id="validationServer01" placeholder="H2 EN"
                value="{{ $operations->h2_val_ar }}">
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
                                                            id="validationServer01" placeholder="H2 EN"
                                                            value="{{ $operations->h2_val_en }}">
                                                    </div>
                                                </div>


                                            

                                                {{-- meta descriotion AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Meta Desc AR :
                                                        <strong class="text-danger"> * @error('meta_desc_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="meta_desc_ar" rows="10" class="form-control" placeholder="Meta Desc AR">{{ $operations->meta_desc_ar }}</textarea>
                                                </div>

                                                {{-- meta descriotion EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Meta Desc EN :
                                                        <strong class="text-danger">* @error('meta_desc_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="meta_desc_en" class="form-control" rows="10" placeholder="Meta Desc EN">{{ $operations->meta_desc_en }}</textarea>
                                                </div>


                                                {{-- Keywords AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> keywords AR :
                                                        <strong class="text-danger"> * @error('keywords_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="keywords_ar" class="form-control" placeholder="Kewords AR">{{ $operations->keywords_ar }}</textarea>
                                                </div>


                                                {{-- Keywords EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> keywords EN :
                                                        <strong class="text-danger"> * @error('keywords_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="keywords_en" class="form-control" placeholder="Kewords EN">{{ $operations->keywords_en }}</textarea>
                                                </div>


                                                {{-- Redirect 301 AR --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Redirect 301 AR :
                                                        <strong class="text-danger"> * @error('redirect_301_ar')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="redirect_301_ar" class="form-control" placeholder="Redirect 301 AR">{{ $operations->redirect_301_ar }}</textarea>
                                                </div>


                                                {{-- Redirect 301 EN --}}
                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"> Redirect 301 EN :
                                                        <strong class="text-danger"> * @error('redirect_301_en')
                                                                - {{ $message }}
                                                            @enderror
                                                        </strong>
                                                    </label>
                                                    <textarea name="redirect_301_en" class="form-control" placeholder="Redirect 301 EN">{{ $operations->redirect_301_en }}</textarea>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div class="input-group">
                                                        <button class="btn btn-primary" type="submit">Save Updates</button>
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
