<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Routing\Controller;
use App\Models\Appointment;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AppointmentController extends Controller
{
    public function index(Request $request, Route $route)
    {
        try {
            $appointments = Appointment::with(['appointmentType'])->orderBy('appointment_date', 'desc')->orderBy('start_time', 'desc')->get();
            return view('admin.appointments.index', compact('appointments'));
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function create(Route $route)
    {
        try {
            return view('admin.appointments.create');
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function show($id, Route $route)
    {
        try {
            $appointment = Appointment::with(['appointmentType'])->find($id);
            if ($appointment) {
                return view('admin.appointments.show', compact('appointment'));
            } else {
                return redirect()->route('super_admin.appointments-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function edit($id, Route $route)
    {
        try {
            $appointment = Appointment::find($id);
            if ($appointment) {
                return view('admin.appointments.edit', compact('appointment'));
            } else {
                return redirect()->route('super_admin.appointments-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

    public function softDelete($id, Route $route)
    {
        try {
            $appointment = Appointment::find($id);
            if ($appointment) {
                $appointment->delete();
                return redirect()->route('super_admin.appointments-index')->with('success', 'Appointment deleted successfully');
            } else {
                return redirect()->route('super_admin.appointments-index')->with('danger', 'This record is not in the records');
            }
        } catch (\Throwable $th) {
            $function_name = $route->getActionName();
            $check_old_errors = new SupportTicket();
            $check_old_errors = $check_old_errors->select('*')->where([
                'error_location' => $th->getFile(),
                'error_description' => $th->getMessage(),
                'function_name' => $function_name,
                'error_line' => $th->getLine(),
            ])->get();

            if ($check_old_errors->count() == 0) {
                $new_error_ticket = SupportTicket::create([
                    'error_location' => $th->getFile(),
                    'error_description' => $th->getMessage(),
                    'function_name' => $function_name,
                    'error_line' => $th->getLine(),
                ]);
                $end_error_ticket = $new_error_ticket;
            } else {
                $end_error_ticket = $check_old_errors->first();
            }
            return view('errors.support_tickets', compact('th', 'function_name', 'end_error_ticket'));
        }
    }

        /**
     * Update the status of an appointment (admin action).
     */
    public function updateStatus($id, $status)
    {
        $validStatuses = ['pending', 'confirmed', 'attended', 'not_attended', 'cancelled'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('danger', 'Invalid status.');
        }

        $appointment = Appointment::find($id);
        if (!$appointment) {
            return redirect()->back()->with('danger', 'Appointment not found.');
        }

        // Only allow valid transitions
        if ($appointment->status === $status) {
            return redirect()->back()->with('info', 'Status is already ' . $status . '.');
        }

        // Confirm: mark slot as booked
        if ($status === 'confirmed') {
            $appointment->status = 'confirmed';
            $appointment->confirmed_at = now();
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment confirmed and slot booked.');
        }

        // Attended: mark as completed
        if ($status === 'attended') {
            $appointment->status = 'attended';
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment marked as attended.');
        }

        // Not attended or cancelled: release slot
        if ($status === 'not_attended' || $status === 'cancelled') {
            $appointment->status = $status;
            $appointment->cancelled_at = now();
            $appointment->save();
            // Here you can add logic to make the slot available again in your calendar system if needed
            return redirect()->back()->with('success', 'Appointment marked as ' . str_replace('_', ' ', $status) . ' and slot released.');
        }

        // Pending (should not be set manually)
        return redirect()->back()->with('info', 'No action taken.');
    }

    // Update an appointment with all required validation checks
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $date = $request->input('appointment_date');
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');

        // 1. Check if date is fully blocked
        $blocked = \App\Models\BlockedDate::where('date', $date)
            ->where(function($q) use ($startTime, $endTime) {
                $q->where('is_full_day', true)
                  ->orWhere(function($q2) use ($startTime, $endTime) {
                      $q2->where('is_full_day', false)
                         ->where(function($q3) use ($startTime, $endTime) {
                             $q3->where(function($q4) use ($startTime, $endTime) {
                                 $q4->where('from_time', '<', $endTime)
                                    ->where('to_time', '>', $startTime);
                             });
                         });
                  });
            })
            ->exists();
        if ($blocked) {
            return back()->with('danger', 'Selected date or time is blocked.');
        }

        // 2. Check if time slot is within work days (if you have WorkDay model)
        if (class_exists('App\\Models\\WorkDay')) {
            $workDay = \App\Models\WorkDay::where('day', date('l', strtotime($date)))
                ->first();
            if (!$workDay || $startTime < $workDay->start_time || $endTime > $workDay->end_time) {
                return back()->with('danger', 'Selected time is outside the available work hours.');
            }
        }

        // 3. Check for conflicts with other appointments (same date and time)
        $conflict = Appointment::where('appointment_date', $date)
            ->where('id', '!=', $appointment->id)
            ->where(function($q) use ($startTime, $endTime) {
                $q->whereBetween('start_time', [$startTime, $endTime])
                  ->orWhereBetween('end_time', [$startTime, $endTime]);
            })
            ->exists();
        if ($conflict) {
            return back()->with('danger', 'This time slot is already booked.');
        }

        // ...proceed to update the appointment fields
        $appointment->appointment_date = $date;
        $appointment->start_time = $startTime;
        $appointment->end_time = $endTime;
        // Add other fields as needed
        $appointment->save();

        return redirect()->route('super_admin.appointments-index')->with('success', 'Appointment updated successfully.');
    }
}
