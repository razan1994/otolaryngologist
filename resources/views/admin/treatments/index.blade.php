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
                    <h1>Treatments/Services </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}">
                                    <span class="mdi mdi-home"></span> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">All Treatments/Services</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.treatments-create') }}" class="mb-1 btn btn-primary"><i
                            class="mdi mdi-playlist-plus"></i> Add New</a>


                            {{-- <a href="{{ route('super_admin.treatments-showSoftDelete') }}" class="mb-1 btn btn-danger"><i
                                class="mdi mdi-delete"></i> Archive </a> --}}


                </div>
            </div>
            {{-- ============================================== --}}
            {{-- =================== Body ===================== --}}
            {{-- ============================================== --}}
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2> List Treatments/Services : </h2>
                </div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center"><i class="mdi mdi-format-title"></i> Titl EN </th>
                                <th style="text-align: center"><i class="mdi mdi-format-title"></i>Title AR </th>
                                <th style="text-align: center"><i class="mdi mdi-image"></i> Main Image </th>
                                <th  style="text-align: center"><i class="mdi mdi-clock-outline mdi-spin"></i> Date_Time </th>
                                <th style="text-align: center"><i class="mdi mdi-settings mdi-spin"></i> Control </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($treatments->count() > 0)
                                @foreach ($treatments as $index => $treatments)
                                    <tr>
                                        <td  style="text-align: center">{{ isset($treatments->title_ar) ? $treatments->title_ar : 'Undefined' }}</td>
                                        <td  style="text-align: center">{{ isset($treatments->title_en) ? $treatments->title_en : 'Undefined' }}</td>
                                        @if ($treatments->image && file_exists($treatments->image))
                                            <td  style="text-align: center"><img src="{{ asset($treatments->image) }}" width="70" height="70"
                                                    style="border-radius: 10px; border:solid 1px black;"></th>
                                            @else
                                            <td  style="text-align: center"><img src="{{ asset('images_default/default.jpg') }}" width="70" height="70"
                                                    style="border-radius: 10px; border:solid 1px black;"></th>
                                        @endif



                                        <td style="text-align: center">
                                            {{ isset($treatments->created_at) ? $treatments->created_at : "<span style='color:red;'>Undefined</span>" }}
                                        </td>



                                        <td  style="text-align: center">

                                            <a href="{{ route('super_admin.treatments-show', $treatments->id) }}"
                                                class="mb-1 btn btn-sm btn-primary"><i class="mdi mdi-eye"></i></a>

                                            <a href="{{ route('super_admin.treatments-edit', $treatments->id) }}"
                                                class="mb-1 btn btn-sm btn-success"><i
                                                    class="mdi mdi-playlist-edit"></i></a>


                                            <a href="{{ route('super_admin.treatments-softDelete', $treatments->id) }}"
                                                class="confirm mb-1 btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
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
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">',
                "order": [
                    [0, "desc"]
                ]
            });
        });

            </script>
            <script src="{{ asset('dashboard_files/assets/plugins/data-tables/jquery.datatables.min.js') }}">
            </script>
            <script src="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}">
            </script>

        @endsection
