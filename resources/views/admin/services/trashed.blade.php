@extends('admin.layouts.app')

@section('admin_css')
    {{-- <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard_files/assets/css/sleek.min.css') }}"> --}}
    {{-- <link href="{{ asset('dashboard_files/assets/css/sleek.css') }}"> --}}

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
                    <h1> Services Archived </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.services-index') }}">
                                    <i class="far fa-newspaper"></i></span> All Services
                                </a>
                            </li>

                            <li class="breadcrumb-item" aria-current="page" ><i class="mdi mdi-delete"></i> All Services Archived </li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2> List Services Archived : </h2>
                </div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center"><i class="mdi mdi-format-title"></i> Title EN </th>
                                <th style="text-align: center"><i class="mdi mdi-format-title"></i> Title AR </th>
                                <th style="text-align: center"><i class="far fa-question-circle"></i> Status </th>
                                <th style="text-align: center"><i class="mdi mdi-image"></i> Main Image </th>
                                <th  style="text-align: center"><i class="mdi mdi-clock-outline mdi-spin"></i> Deleted At</th>
                                <th style="text-align: center"><i class="mdi mdi-settings mdi-spin"></i> Control </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($services->count() > 0)
                                @foreach ($services as $index => $service)
                                    <tr>
                                        <td  style="text-align: center">{{ isset($service->title_ar) ? $service->title_ar : 'Undefined' }}</td>
                                        <td  style="text-align: center">{{ isset($service->title_en) ? $service->title_en : 'Undefined' }}</td>
                                        <td  style="text-align: center">{{ isset($service->status) ? $service->status : 'Undefined' }}</td>
                                        @if ($service->image && file_exists($service->image))
                                            <td  style="text-align: center"><img src="{{ asset($service->image) }}" width="70" height="70"
                                                    style="border-radius: 10px; border:solid 1px black;"></th>
                                            @else
                                            <td  style="text-align: center"><img src="{{ asset('images_default/default.jpg') }}" width="70" height="70"
                                                    style="border-radius: 10px; border:solid 1px black;"></th>
                                        @endif
                                        <td style="text-align: center">
                                            {{ isset($service->deleted_at) ? $service->deleted_at : "<span style='color:red;'>Undefined</span>" }}
                                        </td>
                                        <td  style="text-align: center">


                                                <a href="{{ route('super_admin.services-softDeleteRestore', $service->id) }}" class="unarchive mb-1 btn btn-sm btn-success"><i
                                                    class="mdi mdi-redo-variant"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection

        @section('admin_javascript')
            <script>
                jQuery(document).ready(function() {
                    jQuery('#hoverable-data-table').DataTable({
                        "aLengthMenu": [
                            [20, 30, 50, 75, -1],
                            [20, 30, 50, 75, "All"]
                        ],
                        "pageLength": 20,
                        "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
                        "order": [[ 4, "desc" ]]
                    });
                });

            </script>
            <script src="{{ asset('dashboard_files/assets/plugins/data-tables/jquery.datatables.min.js') }}">
            </script>
            <script src="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}">
            </script>

        @endsection
