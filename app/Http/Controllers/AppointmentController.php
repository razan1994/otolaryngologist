<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Models\BlockedDate;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot anti-spam: block if 'website' field is filled
        if ($request->filled('website')) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Spam detected.'
                ], 422);
            }
            return redirect()->back()
                ->withInput([])
                ->with('error', 'Spam detected.');
        }


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'appointment_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after:start_time',
            'notes' => 'nullable|string|max:1000',
            'appointment_type_id' => 'required|exists:appointment_types,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $appointment = DB::transaction(function () use ($request) {
                $date = Carbon::parse($request->appointment_date)->format('Y-m-d');
                $dayName = Carbon::parse($date)->format('l');

                $workDay = WorkDay::where('status', 1)
                    ->where('day', $dayName)
                    ->first();

                if (!$workDay) {
                    abort(response()->json([
                        'success' => false,
                        'message' => 'This date is not available for booking.'
                    ], 409));
                }

                $requestStart = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $request->start_time);
                $requestEnd = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $request->end_time);

                $workStart = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $workDay->from_time);
                $workEnd = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $workDay->to_time);

                if ($requestStart->lt($workStart) || $requestEnd->gt($workEnd)) {
                    abort(response()->json([
                        'success' => false,
                        'message' => 'Selected time is outside working hours.'
                    ], 409));
                }

                $blockedDates = BlockedDate::where('date', $date)
                    ->whereNull('deleted_at')
                    ->get();

                foreach ($blockedDates as $blocked) {
                    if ((int) $blocked->is_full_day === 1) {
                        abort(response()->json([
                            'success' => false,
                            'message' => 'This date is not available for booking.'
                        ], 409));
                    }

                    if ($blocked->from_time && $blocked->to_time) {
                        $blockedStart = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $blocked->from_time);
                        $blockedEnd = Carbon::createFromFormat('Y-m-d H:i:s', $date . ' ' . $blocked->to_time);

                        if ($requestStart->lt($blockedEnd) && $requestEnd->gt($blockedStart)) {
                            abort(response()->json([
                                'success' => false,
                                'message' => 'This time slot is blocked. Please select another time.'
                            ], 409));
                        }
                    }
                }

                $existingAppointment = Appointment::where('appointment_date', $date)
                    ->whereIn('status', ['pending', 'confirmed', 'attended', 'not_attended'])
                    ->where(function ($query) use ($request) {
                        $query->where('start_time', '<', $request->end_time)
                            ->where('end_time', '>', $request->start_time);
                    })
                    ->lockForUpdate()
                    ->exists();

                if ($existingAppointment) {
                    abort(response()->json([
                        'success' => false,
                        'message' => 'This time slot is no longer available. Please select another time.'
                    ], 409));
                }

                $year = date('Y');
                $lastAppointment = Appointment::whereYear('created_at', $year)
                    ->whereNotNull('booking_reference')
                    ->orderByDesc('id')
                    ->first();

                $nextNumber = 1;
                if ($lastAppointment && preg_match('/#ENT-' . $year . '-(\\d+)/', $lastAppointment->booking_reference, $matches)) {
                    $nextNumber = intval($matches[1]) + 1;
                }
                $bookingReference = sprintf('#ENT-%s-%02d', $year, $nextNumber);
                while (Appointment::where('booking_reference', $bookingReference)->exists()) {
                    $nextNumber++;
                    $bookingReference = sprintf('#ENT-%s-%02d', $year, $nextNumber);
                }

                return Appointment::create([
                    'appointment_type_id' => $request->appointment_type_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'country_key' => $request->country_key,
                    'appointment_date' => $date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'notes' => $request->notes,
                    'booking_reference' => $bookingReference,
                    'status' => 'pending',
                ]);
            });

            // Send email with all appointment data
            try {
                $emailData = [
                    'subject' => 'New Appointment Scheduled',
                    'desc_ar' =>
                        "First Name: {$appointment->first_name}\n" .
                        "Last Name: {$appointment->last_name}\n" .
                        "Phone: {$appointment->phone}\n" .
                        "Country Key: {$appointment->country_key}\n" .
                        "Appointment Date: {$appointment->appointment_date}\n" .
                        "Start Time: {$appointment->start_time}\n" .
                        "End Time: {$appointment->end_time}\n" .
                        "Notes: {$appointment->notes}"
                ];
                Mail::to(config('mail.from.address'))
                    ->send(new TestEmail((object)$emailData, null));
            } catch (\Throwable $e) {
                // Optionally log or handle email sending failure
            }

            return response()->json([
                'success' => true,
                'message' => 'Appointment scheduled successfully!',
                'booking_reference' => $appointment->booking_reference,
                'appointment' => $appointment
            ], 201);
        } catch (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
            throw $e;
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to create appointment at the moment.'
            ], 500);
        }
    }
}
