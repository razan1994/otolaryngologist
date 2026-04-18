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
            --success-soft: #ecfdf3;
            --success-text: #15803d;
            --warning-soft: #fff7ed;
            --warning-text: #c2410c;
            --danger-soft: #fef2f2;
            --danger-text: #dc2626;
            --secondary-soft: #f1f5f9;
            --secondary-text: #475569;
        }

        .appointment-show-page {
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

        .page-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .page-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 12px;
            padding: 11px 18px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none !important;
            transition: .2s ease;
            white-space: nowrap;
            min-height: 44px;
        }

        .page-action-btn:hover {
            transform: translateY(-1px);
        }

        .page-action-btn.primary-btn {
            background: var(--primary);
            color: #fff !important;
            box-shadow: 0 8px 20px rgba(29, 78, 216, 0.18);
        }

        .page-action-btn.primary-btn:hover {
            background: #1e40af;
        }

        .page-action-btn.secondary-btn {
            background: #eef2f7;
            color: #334155 !important;
        }

        .page-action-btn.secondary-btn:hover {
            background: #e2e8f0;
        }

        .details-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .details-card-header {
            padding: 22px 24px 18px;
            border-bottom: 1px solid #eef2f7;
            background: #fff;
        }

        .details-card-header h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
        }

        .details-card-header p {
            margin: 6px 0 0;
            font-size: 13px;
            color: var(--text-muted);
        }

        .info-section {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px;
            height: 100%;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            font-size: 17px;
            font-weight: 700;
            color: var(--text-main);
        }

        .section-title i {
            color: var(--primary);
        }

        .details-table {
            width: 100%;
            margin-bottom: 0;
        }

        .details-table tr:not(:last-child) td,
        .details-table tr:not(:last-child) th {
            border-bottom: 1px solid #f1f5f9;
        }

        .details-table th,
        .details-table td {
            padding: 12px 0;
            vertical-align: top;
            font-size: 14px;
        }

        .details-table th {
            width: 38%;
            color: var(--text-muted);
            font-weight: 600;
            padding-right: 14px;
        }

        .details-table td {
            color: var(--text-main);
            font-weight: 500;
            word-break: break-word;
        }

        .booking-ref {
            font-weight: 700;
            color: var(--primary);
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 13px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            min-width: 116px;
            max-width: 100%;
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

        .notes-box {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px;
            color: var(--text-main);
            line-height: 1.7;
            min-height: 120px;
            white-space: pre-wrap;
        }

        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .time-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 16px;
        }

        .time-label {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-bottom: 8px;
        }

        .time-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-main);
            line-height: 1.5;
        }

        @media (max-width: 991.98px) {
            .details-card-header,
            .details-card-body {
                padding-left: 16px;
                padding-right: 16px;
            }

            .page-title-wrap h2 {
                font-size: 24px;
            }

            .page-head-top {
                align-items: stretch;
            }

            .page-actions {
                width: 100%;
            }

            .page-action-btn {
                flex: 1 1 0;
            }
        }

        @media (max-width: 767.98px) {
            .appointment-show-page {
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

            .details-card {
                border-radius: 16px;
            }

            .details-card-header {
                padding: 16px;
            }

            .details-card-body {
                padding: 16px;
            }

            .details-card-header h4 {
                font-size: 16px;
            }

            .details-card-header p {
                font-size: 12px;
                line-height: 1.5;
            }

            .info-section,
            .notes-box {
                border-radius: 14px;
                padding: 14px;
            }

            .details-table th,
            .details-table td {
                display: block;
                width: 100%;
                padding: 8px 0;
            }

            .details-table th {
                padding-bottom: 2px;
            }

            .timeline-grid {
                grid-template-columns: 1fr;
            }

            .page-actions {
                flex-direction: column;
            }

            .page-action-btn {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content appointment-show-page">

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

            <div class="page-head">
                <div class="page-head-top">
                    <div class="page-title-wrap">
                        <h2>
                            <i class="mdi mdi-calendar-check"></i>
                            <span>Appointment Details</span>
                        </h2>
                        <p>Review the full appointment record, patient details, booking data, and activity timestamps.</p>

                        <nav class="page-breadcrumb" aria-label="breadcrumb">
                            <ol>
                                <li>
                                    <a href="{{ route('super_admin.dashboard') }}">
                                        <i class="mdi mdi-home"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('super_admin.appointments-index') }}">
                                        <i class="mdi mdi-calendar-check"></i> Appointments
                                    </a>
                                </li>
                                <li>
                                    <i class="mdi mdi-eye"></i> Details
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="page-actions">
                        <a href="{{ route('super_admin.appointments-edit', ['id' => $appointment->id]) }}" class="page-action-btn primary-btn">
                            <i class="mdi mdi-playlist-edit"></i>
                            <span>Edit</span>
                        </a>

                        <a href="{{ route('super_admin.appointments-index') }}" class="page-action-btn secondary-btn">
                            <i class="mdi mdi-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
            </div>



                <div class="details-card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="info-section">
                                <div class="section-title">
                                    <i class="mdi mdi-account"></i>
                                    <span>Patient Information</span>
                                </div>

                                <table class="details-table">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ $appointment->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $appointment->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $appointment->country_key }} {{ $appointment->phone }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="info-section">
                                <div class="section-title">
                                    <i class="mdi mdi-calendar-clock"></i>
                                    <span>Appointment Details</span>
                                </div>

                                <table class="details-table">
                                    <tr>
                                        <th>Booking Reference</th>
                                        <td><span class="booking-ref">{{ $appointment->booking_reference ?? '-' }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Appointment Type</th>
                                        <td>{{ $appointment->appointmentType->name_en ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ $appointment->appointment_date ? $appointment->appointment_date->format('d/m/Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td>{{ $appointment->start_time }} - {{ $appointment->end_time }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
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
                                            @endswitch
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 mb-4">
                            <div class="info-section">
                                <div class="section-title">
                                    <i class="mdi mdi-note-text"></i>
                                    <span>Notes</span>
                                </div>

                                <div class="notes-box">
                                    {{ $appointment->notes ?? 'No notes' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="info-section">
                                <div class="section-title">
                                    <i class="mdi mdi-clock-outline"></i>
                                    <span>Timestamps</span>
                                </div>

                                <div class="timeline-grid">
                                    <div class="time-card">
                                        <div class="time-label">Created At</div>
                                        <div class="time-value">
                                            {{ $appointment->created_at ? $appointment->created_at->format('d/m/Y H:i') : '-' }}
                                        </div>
                                    </div>

                                    <div class="time-card">
                                        <div class="time-label">Confirmed At</div>
                                        <div class="time-value">
                                            {{ $appointment->confirmed_at ? $appointment->confirmed_at->format('d/m/Y H:i') : '-' }}
                                        </div>
                                    </div>

                                    <div class="time-card">
                                        <div class="time-label">Updated At</div>
                                        <div class="time-value">
                                            {{ $appointment->updated_at ? $appointment->updated_at->format('d/m/Y H:i') : '-' }}
                                        </div>
                                    </div>

                                    <div class="time-card">
                                        <div class="time-label">Cancelled At</div>
                                        <div class="time-value">
                                            {{ $appointment->cancelled_at ? $appointment->cancelled_at->format('d/m/Y H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
