@extends('admin.layouts.app')

@section('admin_css')
    <style>
        :root {
            --primary: #1d4ed8;
            --primary-soft: #eff6ff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --bg-soft: #f8fafc;
            --white: #ffffff;
            --shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            --radius: 18px;
            --success: #16a34a;
            --info: #0ea5e9;
            --danger: #dc2626;
        }

        .schedule-page {
            padding-top: 8px;
        }

        .page-head {
            margin-bottom: 22px;
        }

        .page-head-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .page-title-wrap h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.4px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title-wrap p {
            margin: 6px 0 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .page-breadcrumb {
            margin-top: 10px;
        }

        .page-breadcrumb ol {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            list-style: none;
        }

        .page-breadcrumb li {
            color: var(--text-muted);
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .page-breadcrumb li a {
            color: var(--text-muted);
            text-decoration: none;
            transition: .2s ease;
        }

        .page-breadcrumb li a:hover {
            color: var(--primary);
        }

        .page-breadcrumb li:not(:last-child)::after {
            content: "/";
            margin-left: 8px;
            color: #cbd5e1;
        }

        .page-action-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: #fff !important;
            border-radius: 12px;
            padding: 11px 18px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none !important;
            border: none;
            box-shadow: 0 8px 20px rgba(29, 78, 216, 0.18);
            transition: .2s ease;
            white-space: nowrap;
        }

        .page-action-btn:hover {
            transform: translateY(-1px);
            color: #fff !important;
            background: #1e40af;
        }

        .schedule-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .schedule-card-header {
            padding: 22px 24px 18px;
            border-bottom: 1px solid #eef2f7;
            background: #fff;
        }

        .schedule-card-header h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
        }

        .schedule-card-header p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .schedule-card-body {
            padding: 22px 24px 24px;
            background: var(--bg-soft);
        }

        .schedule-livewire-wrap {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .4);
            overflow-x: auto;
        }

        .schedule-livewire-wrap .card,
        .schedule-livewire-wrap .table,
        .schedule-livewire-wrap .datatable-wrapper,
        .schedule-livewire-wrap .calendar,
        .schedule-livewire-wrap .fc,
        .schedule-livewire-wrap .fc-view-harness,
        .schedule-livewire-wrap .fc-scrollgrid {
            max-width: 100%;
        }

        .schedule-livewire-wrap table {
            width: 100% !important;
        }

        .schedule-livewire-wrap input,
        .schedule-livewire-wrap select,
        .schedule-livewire-wrap textarea,
        .schedule-livewire-wrap .form-control,
        .schedule-livewire-wrap .custom-select {
            border-radius: 12px !important;
            border: 1px solid var(--border) !important;
            box-shadow: none !important;
        }

        .schedule-livewire-wrap input:focus,
        .schedule-livewire-wrap select:focus,
        .schedule-livewire-wrap textarea:focus,
        .schedule-livewire-wrap .form-control:focus,
        .schedule-livewire-wrap .custom-select:focus {
            border-color: #bfdbfe !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08) !important;
        }

        .schedule-livewire-wrap .btn {
            border-radius: 12px !important;
            font-weight: 600;
        }

        .schedule-livewire-wrap .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .schedule-livewire-wrap .btn-success {
            background: var(--success);
            border-color: var(--success);
        }

        .schedule-livewire-wrap .btn-info {
            background: var(--info);
            border-color: var(--info);
        }

        .schedule-livewire-wrap .btn-danger {
            background: var(--danger);
            border-color: var(--danger);
        }

        .schedule-livewire-wrap .badge {
            border-radius: 999px;
            padding: 7px 10px;
            font-weight: 700;
        }

        .schedule-livewire-wrap .table thead th {
            background: #f8fafc;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            border-bottom: 1px solid #e9eef5;
            border-top: none;
            padding: 14px 12px;
            white-space: nowrap;
        }

        .schedule-livewire-wrap .table tbody td {
            padding: 14px 12px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
            font-size: 14px;
            color: var(--text-main);
            background: #fff;
        }

        .schedule-livewire-wrap .table tbody tr:hover td {
            background: #fcfdff;
        }

        .schedule-livewire-wrap .shadow,
        .schedule-livewire-wrap .shadow-sm,
        .schedule-livewire-wrap .shadow-lg {
            box-shadow: none !important;
        }

        .schedule-livewire-wrap .card,
        .schedule-livewire-wrap .modal-content,
        .schedule-livewire-wrap .dropdown-menu {
            border-radius: 16px !important;
        }

        @media (max-width: 991.98px) {

            .schedule-card-header,
            .schedule-card-body {
                padding-left: 16px;
                padding-right: 16px;
            }

            .page-title-wrap h2 {
                font-size: 24px;
            }

            .page-head-top {
                align-items: stretch;
            }

            .page-action-btn {
                width: 100%;
                justify-content: center;
            }

            .schedule-livewire-wrap {
                padding: 16px;
            }
        }

        @media (max-width: 767.98px) {
            .schedule-page {
                padding-top: 0;
            }

            .page-head {
                margin-bottom: 16px;
            }

            .page-title-wrap h2 {
                font-size: 22px;
                line-height: 1.3;
            }

            .page-title-wrap p {
                font-size: 13px;
                line-height: 1.5;
            }

            .page-breadcrumb li {
                font-size: 12px;
            }

            .schedule-card {
                border-radius: 16px;
            }

            .schedule-card-header {
                padding: 16px;
            }

            .schedule-card-body {
                padding: 16px;
            }

            .schedule-card-header h4 {
                font-size: 16px;
            }

            .schedule-card-header p {
                font-size: 12px;
                line-height: 1.5;
            }

            .schedule-livewire-wrap {
                padding: 14px;
                border-radius: 14px;
            }

            .schedule-livewire-wrap table {
                min-width: 720px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content schedule-page">
            <div>
                @if (session()->has('message'))
                    <script>
                        swal("Great Job !!!", "{!! Session::get('message') !!}", "success", {
                            button: "OK",
                        });
                    </script>
                @endif

                @if (session()->has('error'))
                    <script>
                        swal("Oops !!!", "{!! Session::get('error') !!}", "error", {
                            button: "Close",
                        });
                    </script>
                @endif
            </div>

            <div class="page-head">
                <div class="page-head-top">
                    <div class="page-title-wrap">
                        <h2>
                            <i class="mdi mdi-calendar-week"></i>
                            <span>Weekly Schedule</span>
                        </h2>
                        <p>Manage weekly availability, organize work days, and keep the schedule clearly structured.</p>

                        <nav class="page-breadcrumb" aria-label="breadcrumb">
                            <ol>
                                <li>
                                    <a href="{{ route('super_admin.dashboard') }}">
                                        <i class="mdi mdi-home"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('super_admin.work-days-index') }}">
                                        <i class="mdi mdi-calendar-clock"></i> Work Days
                                    </a>
                                </li>
                                <li>
                                    <i class="mdi mdi-calendar-week"></i> Weekly Schedule
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <a href="{{ route('super_admin.work-days-index') }}" class="page-action-btn">
                        <i class="mdi mdi-arrow-left"></i>
                        <span>Back to Work Days</span>
                    </a>
                </div>
            </div>

            <div class="schedule-card">
                <div class="schedule-card-header">
                    <h4>Weekly Schedule Overview</h4>
                    <p>Review and manage the weekly schedule in the same clean dashboard style used across the system.</p>
                </div>

                <div class="schedule-card-body">
                    <div class="schedule-livewire-wrap">
                        @livewire('backend.work-days.weekly-schedule')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('scheduleUpdated', event => {
            toastr.success('Weekly schedule saved successfully!', 'Success');
        });

        window.addEventListener('scheduleLoaded', event => {
            toastr.info('Schedule loaded', 'Info');
        });
    </script>
@endsection
