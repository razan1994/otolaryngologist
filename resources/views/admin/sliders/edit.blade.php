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
                    <h1><i class="mdi mdi-playlist-edit"></i> Update Slider Information</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <i class="mdi mdi-home"></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.sliders-index') }}">
                                    <i class="mdi mdi-account-group"></i> All Sliders
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><i class="mdi mdi-playlist-edit"></i> Edit</li>
                        </ol>
                    </nav>
                </div>

                {{-- ============================================== --}}
                {{-- =================== Body ===================== --}}
                {{-- ============================================== --}}
                <div class="content-wrapper">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header justify-content-between " style="background-color: #4c84ff;">
                                        {{-- <h2 style="color:white;"><i class="mdi mdi-star mdi-spin"></i> طلبات سحب الرصيد : </h2> --}}
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('super_admin.sliders-update', [$slider->id]) }}" method="POST"
                                            id="updateForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">

                                                {{-- Title AR --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3" for="validationServer01">
                                                        <i class="mdi mdi-account"></i> Title AR : <strong class="text-danger"> * @error('title_ar') ( {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_ar"
                                                            class="form-control @error('title_ar') is-invalid @enderror" id="validationServer01"
                                                            placeholder="Title AR" value="{{ isset($slider->title_ar) ? $slider->title_ar : null }}">
                                                    </div>
                                                </div>

                                                {{-- Title EN --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3" for="validationServer01">
                                                        <i class="mdi mdi-account"></i> Title EN : <strong class="text-danger"> * @error('title_en') ( {{ $message }} ) @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account" id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" id="validationServer01" placeholder="Title EN"
                                                            value="{{ isset($slider->title_en) ? $slider->title_en : null }}">
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
                                                            <span class="input-group-text mdi mdi-account" id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="sub_title_ar" class="form-control @error('sub_title_ar') is-invalid @enderror" id="validationServer01" placeholder="Title EN"
                                                            value="{{ isset($slider->sub_title_ar) ? $slider->sub_title_ar : null }}">
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
                                                            <span class="input-group-text mdi mdi-account" id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="sub_title_en" class="form-control @error('sub_title_en') is-invalid @enderror" id="validationServer01" placeholder="Title EN"
                                                            value="{{ isset($slider->sub_title_en) ? $slider->sub_title_en : null }}">
                                                    </div>
                                                </div>

                                                {{-- Desc AR --}}
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">
                                                        Description AR : <strong class="text-danger"> * @error('description_ar') - {{ $message }} @enderror</strong>
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-book-open"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="description_ar"
                                                            class="form-control "
                                                            rows="5">{{ isset($slider->description_ar) ? $slider->description_ar : null }}</textarea>
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
                                                            rows="5">{{ isset($slider->description_en) ? $slider->description_en : null }}</textarea>
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
                                                            <option value="1" @if (isset($slider->status) && $slider->status == 'Active') selected @endif>Active</option>
                                                            <option value="2" @if (isset($slider->status) && $slider->status == 'Inactive') selected @endif>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Image Filed --}}
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

                                                {{-- Display Image --}} 
                                                <div class="col-md-12 mb-3">
                                                    @if (isset($slider->image))
                                                        @if ($slider->image && file_exists($slider->image))
                                                            <img src="{{ asset($slider->image) }}" width="420" height="100" style="border-radius: 10px; border:solid 1px black;">
                                                        @else
                                                            <img src="{{ asset('front_end_style/assets/img/slider/slider1.jpg') }}" width="840" height="200">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('front_end_style/assets/img/slider/slider1.jpg') }}" width="840" height="200">
                                                    @endif
                                                </div>

                                            </div>

                                            {{-- Button --}}
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save-all"></i> Save Updates</button>
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
