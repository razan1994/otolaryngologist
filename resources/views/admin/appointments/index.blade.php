@extends('admin.layouts.app')

@section('admin_css')
    <link href="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #1d4ed8;
            --primary-soft: #eff6ff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --bg-soft: #f8fafc;
            --white: #ffffff;
            --success-soft: #ecfdf3;
            --success-text: #15803d;
            --warning-soft: #fff7ed;
            --warning-text: #c2410c;
            --danger-soft: #fef2f2;
            --danger-text: #dc2626;
            --secondary-soft: #f1f5f9;
            --secondary-text: #475569;
            --shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            --radius: 18px;
        }

        .appointments-page {
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
            color: var(--text-main);
            letter-spacing: -0.4px;
        }

        .page-title-wrap p {
            margin: 6px 0 0;
            color: var(--text-muted);
            font-size: 14px;
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

        .appointments-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: var(--shadow);
            overflow: visible;
        }

        .appointments-card-header {
            padding: 22px 24px 18px;
            border-bottom: 1px solid #eef2f7;
            background: #fff;
        }

        .appointments-card-header h4 {
            margin: 0;
            font-size: 18px;
            color: var(--text-main);
        }

        .appointments-card-header p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .appointments-card-body {
            padding: 22px 24px 20px;
            overflow: visible;
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .search-box {
            position: relative;
            width: 100%;
            max-width: 380px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 14px;
        }

        .search-box input {
            height: 46px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: #fff;
            padding-left: 42px;
            padding-right: 14px;
            font-size: 14px;
            color: var(--text-main);
            box-shadow: none !important;
        }

        .search-box input:focus {
            border-color: #bfdbfe;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08) !important;
        }

        .table-shell {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow-x: auto;
            overflow-y: visible;
            -webkit-overflow-scrolling: touch;
            position: relative;
        }

        .table-shell::-webkit-scrollbar {
            height: 8px;
        }

        .table-shell::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        .table-shell::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        .appointments-table {
            margin-bottom: 0 !important;
            width: 100% !important;
            min-width: 1180px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .appointments-table thead th {
            background: #f8fafc;
            color: #334155;
            font-size: 12px;
            letter-spacing: .5px;
            text-transform: uppercase;
            border-bottom: 1px solid #e9eef5;
            border-top: none;
            padding: 16px 14px;
            vertical-align: middle;
            white-space: nowrap;
            position: sticky;
            top: 0;
            z-index: 5;
        }

        .appointments-table tbody td {
            padding: 16px 14px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
            font-size: 14px;
            color: var(--text-main);
            background: #fff;
            white-space: nowrap;
        }

        .appointments-table tbody tr:hover td {
            background: #fcfdff;
        }

        .appointments-table th:first-child,
        .appointments-table td:first-child {
            position: sticky;
            left: 0;
            z-index: 6;
            background: #fff;
            box-shadow: 2px 0 8px rgba(15, 23, 42, 0.04);
        }

        .appointments-table thead th:first-child {
            background: #f8fafc;
            z-index: 8;
        }

        .id-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 34px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #0f172a;
        }

        .booking-ref {
            color: var(--primary);
            word-break: break-word;
            white-space: normal;
            font-weight: 600;
        }

        .patient-block {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 160px;
        }

        .patient-name {
            color: var(--text-main);
            line-height: 1.3;
            white-space: normal;
            font-weight: 600;
        }

        .patient-sub {
            font-size: 12px;
            color: var(--text-muted);
        }

        .type-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 12px;
            max-width: 100%;
            white-space: nowrap;
            text-align: left;
        }

        .datetime-block {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .datetime-main {
            color: var(--text-main);
            line-height: 1.35;
        }

        .datetime-sub {
            font-size: 12px;
            color: var(--text-muted);
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 13px;
            border-radius: 999px;
            font-size: 12px;
            min-width: 116px;
            max-width: 100%;
            white-space: nowrap;
        }

        .status-pending {
            background: var(--warning-soft);
            color: var(--warning-text);
        }

        .status-confirmed {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .status-attended {
            background: var(--success-soft);
            color: var(--success-text);
        }

        .status-not-attended {
            background: var(--danger-soft);
            color: var(--danger-text);
        }

        .status-cancelled {
            background: var(--secondary-soft);
            color: var(--secondary-text);
        }

        .actions-col {
            min-width: 120px;
            text-align: center;
            white-space: normal !important;
        }

        .actions-dropdown {
            position: relative;
            display: inline-block;
            text-align: left;
        }

        .actions-toggle {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #334155;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s ease;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        }

        .actions-toggle:hover,
        .actions-toggle:focus {
            background: #f8fafc;
            border-color: #cbd5e1;
            outline: none;
        }

        .actions-toggle i {
            font-size: 18px;
        }

        .actions-menu {
            position: fixed;
            min-width: 210px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.14);
            padding: 8px;
            z-index: 99999;
            display: none;
        }

        .actions-menu.show {
            display: block;
        }

        .action-item,
        .actions-menu form {
            display: block;
            width: 100%;
            margin: 0;
        }

        .action-link,
        .action-submit {
            width: 100%;
            border: none;
            background: transparent;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 12px;
            border-radius: 10px;
            color: #0f172a;
            font-size: 13px;
            text-decoration: none !important;
            transition: .2s ease;
            cursor: pointer;
        }

        .action-link:hover,
        .action-submit:hover {
            background: #f8fafc;
            color: #0f172a;
        }

        .action-link i,
        .action-submit i {
            width: 18px;
            text-align: center;
            font-size: 14px;
            color: #64748b;
        }

        .action-submit.confirm-action {
            color: #166534;
        }

        .action-submit.confirm-action i {
            color: #16a34a;
        }

        .action-submit.attended-action {
            color: #166534;
        }

        .action-submit.attended-action i {
            color: #15803d;
        }

        .action-submit.not-attended-action {
            color: #b45309;
        }

        .action-submit.not-attended-action i {
            color: #f59e0b;
        }

        .action-submit.cancel-action {
            color: #b91c1c;
        }

        .action-submit.cancel-action i {
            color: #dc2626;
        }

        .action-divider {
            height: 1px;
            background: #eef2f7;
            margin: 6px 0;
        }

        .empty-state {
            padding: 48px 20px;
            text-align: center;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 32px;
            margin-bottom: 10px;
            color: #cbd5e1;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }

        .dataTables_wrapper .dataTables_info {
            color: var(--text-muted);
            font-size: 13px;
            padding: 0 !important;
            margin: 0;
            line-height: 1.4;
        }

        .dataTables_wrapper .dataTables_paginate {
            padding: 0 !important;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: none !important;
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            box-shadow: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button .page-link,
        .dataTables_wrapper .dataTables_paginate .paginate_button > a,
        .dataTables_wrapper .dataTables_paginate a.paginate_button {
            min-width: 42px;
            height: 42px;
            border-radius: 12px !important;
            border: 1px solid #e2e8f0 !important;
            background: #fff !important;
            color: #334155 !important;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            padding: 0 14px !important;
            text-decoration: none !important;
            font-size: 13px;
            font-weight: 500;
            transition: .2s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
        .dataTables_wrapper .dataTables_paginate a.paginate_button.current,
        .dataTables_wrapper .dataTables_paginate a.paginate_button.current:hover {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #fff !important;
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 16px;
            margin-top: 14px;
            border-top: 1px solid #eef2f7;
            flex-wrap: wrap;
        }

        .table-footer .table-info-wrap {
            flex: 1 1 260px;
        }

        .table-footer .table-pagination-wrap {
            flex: 0 0 auto;
            margin-left: auto;
        }

        @media (max-width: 767.98px) {
            .table-shell {
                background: transparent;
                border: none;
                border-radius: 0;
                overflow: visible;
            }

            .appointments-table,
            .appointments-table thead,
            .appointments-table tbody,
            .appointments-table th,
            .appointments-table td,
            .appointments-table tr {
                display: block;
                width: 100%;
            }

            .appointments-table {
                min-width: 100%;
            }

            .appointments-table thead {
                display: none;
            }

            .appointments-table tbody tr {
                background: #fff;
                border: 1px solid var(--border);
                border-radius: 16px;
                margin-bottom: 14px;
                box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
                overflow: visible;
            }

            .appointments-table tbody td,
            .appointments-table th:first-child,
            .appointments-table td:first-child {
                position: relative !important;
                left: auto !important;
                z-index: auto !important;
                box-shadow: none !important;
                background: #fff !important;
            }

            .appointments-table tbody td {
                border: none;
                border-bottom: 1px solid #f1f5f9;
                padding: 12px 14px 12px 132px;
                min-height: 54px;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                text-align: left !important;
                white-space: normal;
            }

            .appointments-table tbody td:last-child {
                border-bottom: none;
            }

            .appointments-table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 14px;
                top: 12px;
                width: 105px;
                font-size: 12px;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: .3px;
            }

            .appointments-table tbody td.actions-col {
                padding-left: 14px;
                display: block;
            }

            .appointments-table tbody td.actions-col::before {
                position: static;
                display: block;
                width: auto;
                margin-bottom: 10px;
            }

            .actions-dropdown {
                display: block;
            }

            .actions-toggle {
                width: 100%;
                justify-content: space-between;
                padding: 0 14px;
                height: 42px;
                border-radius: 12px;
            }

            .actions-menu {
                position: static;
                display: none !important;
                width: 100%;
                margin-top: 10px;
                box-shadow: none;
                border-radius: 12px;
            }

            .actions-dropdown.open .actions-menu {
                display: block !important;
            }

            .table-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .table-footer .table-pagination-wrap {
                margin-left: 0;
            }

            .dataTables_wrapper .dataTables_info {
                text-align: center;
            }

            .dataTables_wrapper .dataTables_paginate {
                justify-content: center;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content appointments-page">

            @if (session()->has('success'))
                <script>
                    swal("Great Job!", "{!! Session::get('success') !!}", "success", {
                        button: "OK",
                    });
                </script>
            @endif

            @if (session()->has('danger'))
                <script>
                    swal("Oops!", "{!! Session::get('danger') !!}", "error", {
                        button: "Close",
                    });
                </script>
            @endif

            <div class="page-head">
                <div class="page-head-top">
                    <div class="page-title-wrap">
                        <h2>Appointments</h2>
                        <p>Manage patient bookings, review schedules, and update statuses easily.</p>
                    </div>

                    <a href="{{ route('super_admin.work-days-weekly-schedule') }}" class="page-action-btn">
                        <i class="mdi mdi-calendar-month-outline"></i>
                        <span>Weekly Schedule</span>
                    </a>
                    <a href="{{ route('super_admin.appointments-create') }}" class="page-action-btn">
                        <i class="mdi mdi-calendar-month-outline"></i>
                        <span>Create new Appointment</span>
                    </a>
                </div>
            </div>

            <div class="appointments-card">
                <div class="appointments-card-header">
                    <h4>Appointments List</h4>
                    <p>Browse all appointments, search quickly, and manage booking statuses.</p>
                </div>

                <div class="appointments-card-body">
                    <div class="toolbar">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="appointmentsSearch" class="form-control"
                                placeholder="Search by patient, booking ref, phone, type...">
                        </div>
                    </div>

                    <div class="table-shell">
                        <table id="appointmentsTable" class="table appointments-table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Booking Ref</th>
                                    <th>Patient</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th class="text-center actions-col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td class="text-center" data-label="ID">
                                            <span class="id-pill">{{ $appointment->id }}</span>
                                        </td>

                                        <td data-label="Booking Ref">
                                            <span class="booking-ref">{{ $appointment->booking_reference ?? '-' }}</span>
                                        </td>

                                        <td data-label="Patient">
                                            <div class="patient-block">
                                                <span class="patient-name">
                                                    {{ trim($appointment->first_name . ' ' . $appointment->last_name) ?: '-' }}
                                                </span>
                                                <span class="patient-sub">Patient record</span>
                                            </div>
                                        </td>

                                        <td data-label="Phone">
                                            {{ trim(($appointment->country_key ?? '') . ' ' . ($appointment->phone ?? '')) ?: '-' }}
                                        </td>

                                        <td data-label="Type">
                                            <span class="type-chip">
                                                <i class="mdi mdi-stethoscope"></i>
                                                {{ $appointment->appointmentType->name_en ?? '-' }}
                                            </span>
                                        </td>

                                        <td data-label="Date">
                                            <div class="datetime-block">
                                                <span class="datetime-main">
                                                    {{ $appointment->appointment_date ? $appointment->appointment_date->format('d/m/Y') : '-' }}
                                                </span>
                                                <span class="datetime-sub">Appointment date</span>
                                            </div>
                                        </td>

                                        <td data-label="Time">
                                            <div class="datetime-block">
                                                <span class="datetime-main">{{ $appointment->start_time ?? '-' }} - {{ $appointment->end_time ?? '-' }}</span>
                                                <span class="datetime-sub">Scheduled time</span>
                                            </div>
                                        </td>

                                        <td data-label="Status">
                                            @switch($appointment->status)
                                                @case('pending')
                                                    <span class="status-pill status-pending">Pending</span>
                                                    @break
                                                @case('confirmed')
                                                    <span class="status-pill status-confirmed">Confirmed</span>
                                                    @break
                                                @case('attended')
                                                    <span class="status-pill status-attended">Attended</span>
                                                    @break
                                                @case('not_attended')
                                                    <span class="status-pill status-not-attended">Not Attended</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="status-pill status-cancelled">Cancelled</span>
                                                    @break
                                                @default
                                                    <span class="status-pill status-cancelled">Unknown</span>
                                            @endswitch
                                        </td>

                                        <td class="text-center actions-col" data-label="Actions">
                                            <div class="actions-dropdown">
                                                <button type="button" class="actions-toggle" data-toggle-actions>
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </button>

                                                <div class="actions-menu">
                                                    <a href="{{ route('super_admin.appointments-show', $appointment->id) }}"
                                                       class="action-link">
                                                        <i class="fas fa-eye"></i>
                                                        <span>View Details</span>
                                                    </a>

                                                    <a href="{{ route('super_admin.appointments-edit', $appointment->id) }}"
                                                       class="action-link">
                                                        <i class="fas fa-pen"></i>
                                                        <span>Edit Appointment</span>
                                                    </a>

                                                    @if($appointment->status === 'pending' || $appointment->status === 'confirmed')
                                                        <div class="action-divider"></div>
                                                    @endif

                                                    @if($appointment->status === 'pending')
                                                        <form action="{{ route('super_admin.appointments-status', [$appointment->id, 'confirmed']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="action-submit confirm-action">
                                                                <i class="fas fa-check-circle"></i>
                                                                <span>Confirm</span>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($appointment->status === 'confirmed')
                                                        <form action="{{ route('super_admin.appointments-status', [$appointment->id, 'attended']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="action-submit attended-action">
                                                                <i class="fas fa-user-check"></i>
                                                                <span>Mark as Attended</span>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('super_admin.appointments-status', [$appointment->id, 'not_attended']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="action-submit not-attended-action">
                                                                <i class="fas fa-user-times"></i>
                                                                <span>Mark as Not Attended</span>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('super_admin.appointments-status', [$appointment->id, 'cancelled']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="action-submit cancel-action">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Cancel Appointment</span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            <div class="empty-state">
                                                <i class="mdi mdi-calendar-remove-outline"></i>
                                                <div>No appointments found.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('admin_javascript')
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/plugins/data-tables/datatables.bootstrap4.min.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            const table = $('#appointmentsTable').DataTable({
                aLengthMenu: [
                    [20, 30, 50, 75, -1],
                    [20, 30, 50, 75, "All"]
                ],
                pageLength: 20,
                order: [[0, "desc"]],
                autoWidth: false,
                responsive: false,
                scrollX: false,
                dom: 'rt<"table-footer"<"table-info-wrap"i><"table-pagination-wrap"p>>',
                language: {
                    info: "Showing _START_ to _END_ of _TOTAL_ appointments",
                    paginate: {
                        previous: "Prev",
                        next: "Next"
                    }
                }
            });

            $('#appointmentsSearch').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('[data-toggle="tooltip"]').tooltip();

            const isMobile = () => window.innerWidth <= 767.98;

            function closeAllActionMenus() {
                $('.actions-dropdown').removeClass('open');
                $('.actions-menu.show').removeClass('show').removeAttr('style');
            }

            function positionMenu($button, $menu) {
                const buttonRect = $button[0].getBoundingClientRect();
                const menuWidth = $menu.outerWidth();
                const menuHeight = $menu.outerHeight();
                const viewportWidth = $(window).width();
                const viewportHeight = $(window).height();

                let top = buttonRect.bottom + 10;
                let left = buttonRect.right - menuWidth;

                if (left < 12) {
                    left = 12;
                }

                if ((left + menuWidth) > (viewportWidth - 12)) {
                    left = viewportWidth - menuWidth - 12;
                }

                if ((top + menuHeight) > (viewportHeight - 12)) {
                    top = buttonRect.top - menuHeight - 10;
                }

                if (top < 12) {
                    top = 12;
                }

                $menu.css({
                    top: top + 'px',
                    left: left + 'px'
                });
            }

            $(document).on('click', '[data-toggle-actions]', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const $dropdown = $(this).closest('.actions-dropdown');
                const $menu = $dropdown.find('.actions-menu');

                if (isMobile()) {
                    $('.actions-dropdown').not($dropdown).removeClass('open');
                    $dropdown.toggleClass('open');
                    return;
                }

                const wasOpen = $menu.hasClass('show');
                closeAllActionMenus();

                if (!wasOpen) {
                    $menu.addClass('show');
                    positionMenu($(this), $menu);
                }
            });

            $(window).on('resize scroll', function() {
                if (!isMobile()) {
                    $('.actions-menu.show').each(function() {
                        const $menu = $(this);
                        const $button = $menu.closest('.actions-dropdown').find('[data-toggle-actions]');
                        if ($button.length) {
                            positionMenu($button, $menu);
                        }
                    });
                }
            });

            $(document).on('click', function() {
                closeAllActionMenus();
            });

            $(document).on('click', '.actions-menu', function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endsection
