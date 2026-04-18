@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{-- Sweet Alert Section --}}
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

            {{-- Header --}}
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                <div>
                    <h1><i class="mdi mdi-calendar-clock"></i> Work Days</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('super_admin.dashboard') }}"> <i class="mdi mdi-home"></i> Dashboard </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><i class="mdi mdi-calendar-clock"></i> Work Days</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('super_admin.work-days-weekly-schedule') }}" class="mb-1 btn btn-success me-2">
                        <i class="mdi mdi-calendar-week"></i> Weekly Schedule
                    </a>
                </div>
            </div>

            {{-- Body --}}
            <div class="card card-default">
                <div class="card-header justify-content-between" style="background-color: #4c84ff;">
                </div>
                <div class="card-body">
                    <table id="hoverable-data-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Day</th>
                                <th>From Time</th>
                                <th>To Time</th>
                                <th>Slot Duration (min)</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($work_days->count() > 0)
                                @foreach ($work_days as $work_day)
                                    <tr>
                                        <td>{{ $work_day->id }}</td>
                                        <td>{{ $work_day->day }}</td>
                                        <td>{{ $work_day->from_time ? date('h:i A', strtotime($work_day->from_time)) : 'N/A' }}</td>
                                        <td>{{ $work_day->to_time ? date('h:i A', strtotime($work_day->to_time)) : 'N/A' }}</td>
                                        <td>{{ $work_day->slot_duration }}</td>
                                        <td>
                                            @if ($work_day->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Not Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $work_day->created_at }}</td>
                                        <td>
                                            <a href="{{ route('super_admin.work-days-edit', $work_day->id) }}"
                                               class="mb-1 btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('super_admin.work-days-softDelete', $work_day->id) }}"
                                               class="confirm mb-1 btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
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
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>
@endsection
