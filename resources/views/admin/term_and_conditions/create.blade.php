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
                    <h1>Add New Term And Condition</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.term_and_conditions-index') }}">
                                    <i class="fas fa-users-cog"></i> All Term And Condition
                                </a>
                            </li>
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
                                        <form action="{{ route('super_admin.term_and_conditions-store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Title AR: <strong
                                                            class="text-danger"> * @error('term_and_condition_title_ar') -
                                                                {{ $message }}
                                                            @enderror</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="term_and_condition_title_ar"
                                                            class="form-control @error('term_and_condition_title_ar') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Title AR"
                                                            value="{{ old('term_and_condition_title_ar') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Title EN : <strong
                                                            class="text-danger"> * @error('term_and_condition_title_en') -
                                                                {{ $message }}
                                                            @enderror</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-format-title"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <input type="text" name="term_and_condition_title_en" class="form-control @error('term_and_condition_title_en') is-invalid @enderror"
                                                            id="validationServer01" placeholder="Title EN"
                                                            value="{{ old('term_and_condition_title_en') }}">
                                                    </div>
                                                </div>







                                                <div class="col-md-12 mb-3">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01">Status : <strong class="text-danger">
                                                            * @error('term_and_condition_status') - {{ $message }}
                                                            @enderror</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-account-check"></span>
                                                        </div>
                                                        <select name="term_and_condition_status" class="custom-select my-1 mr-sm-2 "
                                                            id="inlineFormCustomSelectPref">
                                                            <option value="" selected>Choose Status...</option>
                                                            <option value="1" @if (old('general_instruction_status') == '1') selected @endif>Active</option>
                                                            <option value="2" @if (old('general_instruction_status') == '2') selected @endif>Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Term And Condition Details AR : <strong
                                                            class="text-danger">
                                                            * @error('term_and_condition_des_ar') - {{ $message }}
                                                            @enderror</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-book-open"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="term_and_condition_des_ar"
                                                            class="form-control " rows="10">{{ old('term_and_condition_des_ar') }}</textarea>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="text-dark font-weight-medium mb-3"
                                                        for="validationServer01"> Term And Condition Details EN : <strong
                                                            class="text-danger">
                                                            * @error('term_and_condition_des_en') - {{ $message }}
                                                            @enderror</strong></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text mdi mdi-book-open"
                                                                id="inputGroupPrepend2"></span>
                                                        </div>
                                                        <textarea style="width: 90% !important" name="term_and_condition_des_en"
                                                            class="form-control " rows="10">{{ old('term_and_condition_des_en') }}</textarea>

                                                    </div>
                                                </div>


                                            </div>
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </form>
                                    </div>
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
            CKEDITOR.replace( 'term_and_condition_des_ar',{
                fullPage: true,
                allowedContent: true,
                height : '800px'
            });
            CKEDITOR.replace( 'term_and_condition_des_en',{
                fullPage: true,
                allowedContent: true,
                height : '800px'
            });

    </script>
@endsection
