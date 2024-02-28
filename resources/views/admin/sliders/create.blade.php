@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">

            <div class="breadcrumb-wrapper breadcrumb-contacts">
                {{-- ============================================== --}}
                {{-- ================== Header ==================== --}}
                {{-- ============================================== --}}
                <div>
                    <h1><i class="mdi mdi-playlist-plus"></i> Add New Slider</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}"> <i class="mdi mdi-home"></i> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.sliders-index') }}"> <i class="mdi mdi-account-group"></i> All Sliders </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><i class="mdi mdi-playlist-plus"></i> Add New Slider</li>
                        </ol>
                    </nav>
                </div>

                {{-- ============================================== --}}
                {{-- ==================== Body ==================== --}}
                {{-- ============================================== --}}
                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.sliders-store') }}" method="POST"
                                            enctype="multipart/form-data" id="createForm">
                                            @csrf
                                            <div class="form-row">

                                                {{-- Title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-account"></i> Title AR : <strong
                                                            class="text-danger"> * @error('title_ar') (
                                                            {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_ar"
                                                            class="form-control @error('title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Title AR"
                                                            value="{{ old('title_ar') }}">
                                                    </div>
                                                </div>

                                                {{-- Title EN --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-account"></i> Title EN : <strong
                                                            class="text-danger"> * @error('title_en') (
                                                            {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_en"
                                                            class="form-control @error('title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Title EN"
                                                            value="{{ old('title_en') }}">
                                                    </div>
                                                </div>


                                                {{-- Sub Title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-account"></i> Sub Title AR : <strong
                                                            class="text-danger"> * @error('sub_title_ar') (
                                                            {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="sub_title_ar"
                                                            class="form-control @error('sub_title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Sub Title AR"
                                                            value="{{ old('sub_title_ar') }}">
                                                    </div>
                                                </div>

                                                {{-- Sub Title EN --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-account"></i>Sub Title EN : <strong
                                                            class="text-danger"> * @error('sub_title_en') (
                                                            {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="sub_title_en"
                                                            class="form-control @error('sub_title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Sub Title EN"
                                                            value="{{ old('sub_title_en') }}">
                                                    </div>
                                                </div>



                                                {{-- Desc AR --}}
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        Description AR : <strong class="text-danger"> * @error('description_ar')
                                                            - {{ $message }} @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-book-open"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="description_ar"
                                                            class="form-control "
                                                            rows="5">{{ old('description_ar') }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- Desc EN --}}
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        Description EN : <strong class="text-danger"> * @error('description_en')
                                                            - {{ $message }} @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-book-open"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="description_en"
                                                            class="form-control "
                                                            rows="5">{{ old('description_en') }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- Status --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-account-switch"></i> Status : <strong class="text-danger"> * @error('status') ( {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="status" class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror" id="inlineFormCustomSelectPref">
                                                            <option value="">Select Status...</option>
                                                            <option value="1" @if (old('status') == 1) selected @endif>Active</option>
                                                            <option value="2" @if (old('status') == 2) selected @endif>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Image --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        <i class="mdi mdi-image"></i> Image : <strong class="text-danger"> @error('image')* ( {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-image"></span>
                                                        </div>
                                                        <input type="file" name="image" class="form-control" id="validationServer01" placeholder="Image">
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- Button --}}
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-playlist-plus"></i> Add Slider</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('admin_javascript')
      
    @endsection
