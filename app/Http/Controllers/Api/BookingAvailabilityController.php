<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkDay;
use App\Models\BlockedDate;
use App\Models\Appointment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class BookingAvailabilityController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->toDateString();

        $workDays = WorkDay::where('status', 1)
            ->get(['day', 'from_time', 'to_time', 'slot_duration']);

        $blockedDates = BlockedDate::where('date', '>=', $today)
            ->whereNull('deleted_at')
            ->get(['date', 'is_full_day', 'from_time', 'to_time', 'reason'])
            ->map(function ($blocked) {
                return [
                    'date' => $blocked->date instanceof Carbon
                        ? $blocked->date->format('Y-m-d')
                        : Carbon::parse($blocked->date)->format('Y-m-d'),
                    'is_full_day' => (int) $blocked->is_full_day,
                    'from_time' => $blocked->from_time,
                    'to_time' => $blocked->to_time,
                    'reason' => $blocked->reason,
                ];
            })
            ->values();

        $blockedStatuses = ['pending', 'confirmed', 'attended'];
        $appointments = Appointment::where('appointment_date', '>=', $today)
            ->whereIn('status', $blockedStatuses)
            ->get(['appointment_date', 'start_time', 'end_time', 'status'])
            ->map(function ($appointment) {
                return [
                    'appointment_date' => $appointment->appointment_date instanceof Carbon
                        ? $appointment->appointment_date->format('Y-m-d')
                        : Carbon::parse($appointment->appointment_date)->format('Y-m-d'),
                    'start_time' => $appointment->start_time,
                    'end_time' => $appointment->end_time,
                    'status' => $appointment->status,
                ];
            })
            ->values();

        $timeSlots = [];
        $period = CarbonPeriod::create($today, Carbon::parse($today)->addDays(30));

        foreach ($period as $date) {
            $dateString = $date->format('Y-m-d');
            $dayName = $date->format('l');

            $workDay = $workDays->first(function ($item) use ($dayName) {
                return (string) $item->day === (string) $dayName;
            });

            if (!$workDay) {
                continue;
            }

            if (!$workDay->from_time || !$workDay->to_time || (int) $workDay->slot_duration <= 0) {
                continue;
            }

            $slotsForDay = [];
            $workStart = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $workDay->from_time);
            $workEnd = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $workDay->to_time);
            $slotDuration = (int) $workDay->slot_duration;

            $cursor = $workStart->copy();

            while ($cursor->copy()->addMinutes($slotDuration)->lte($workEnd)) {
                $slotStart = $cursor->copy();
                $slotEnd = $cursor->copy()->addMinutes($slotDuration);

                $isBlocked = false;

                foreach ($blockedDates as $blocked) {
                    if ($blocked['date'] !== $dateString) {
                        continue;
                    }

                    if ((int) $blocked['is_full_day'] === 1) {
                        $isBlocked = true;
                        break;
                    }

                    if (!empty($blocked['from_time']) && !empty($blocked['to_time'])) {
                        $blockedStart = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $blocked['from_time']);
                        $blockedEnd = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $blocked['to_time']);

                        if ($slotStart->lt($blockedEnd) && $blockedStart->lt($slotEnd)) {
                            $isBlocked = true;
                            break;
                        }
                    }
                }

                if (!$isBlocked) {
                    foreach ($appointments as $appointment) {
                        if ($appointment['appointment_date'] !== $dateString) {
                            continue;
                        }

                        $appointmentStart = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $appointment['start_time']);
                        $appointmentEnd = Carbon::createFromFormat('Y-m-d H:i:s', $dateString . ' ' . $appointment['end_time']);

                        if ($slotStart->lt($appointmentEnd) && $appointmentStart->lt($slotEnd)) {
                            $isBlocked = true;
                            break;
                        }
                    }
                }

                if (!$isBlocked) {
                    $slotsForDay[] = [
                        'start_time' => $slotStart->format('H:i:s'),
                        'end_time' => $slotEnd->format('H:i:s'),
                        'label' => $slotStart->format('h:i A') . ' - ' . $slotEnd->format('h:i A'),
                    ];
                }

                $cursor->addMinutes($slotDuration);
            }

            if (!empty($slotsForDay)) {
                $timeSlots[$dateString] = $slotsForDay;
            }
        }

        $fullDayBlockedDates = collect($blockedDates)
            ->filter(fn($blocked) => (int) $blocked['is_full_day'] === 1)
            ->values();

        return response()->json([
            'work_days' => $workDays,
            'blocked_dates' => $fullDayBlockedDates,
            'time_slots' => $timeSlots,
        ]);
    }
}
