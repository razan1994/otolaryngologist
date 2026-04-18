<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Routing\Controller;
use App\Models\WorkDay;
use App\Models\SupportTicket;

class WorkDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_days = WorkDay::orderBy('id', 'desc')->get();
        return view('admin.work_days.index', compact('work_days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work_days.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $workDay = WorkDay::findOrFail($id);
        return view('admin.work_days.edit', compact('workDay'));
    }

    /**
     * Soft delete the specified resource.
     */
    public function softDelete($id)
    {
        try {
            $workDay = WorkDay::find($id);
            if ($workDay) {
                $workDay->delete();
                return redirect()->route('super_admin.work-days-index')
                    ->with('success', 'Work day deleted successfully.');
            }
            return redirect()->route('super_admin.work-days-index')
                ->with('error', 'Work day not found.');
        } catch (\Exception $e) {
            SupportTicket::create([
                'user_id' => auth()->guard('super_admin')->id(),
                'category_id' => null,
                'priority' => 1,
                'subject' => 'Error deleting work day',
                'message' => $e->getMessage(),
            ]);
            return redirect()->route('super_admin.work-days-index')
                ->with('error', 'An error occurred while deleting the work day.');
        }
    }

    /**
     * Display the weekly schedule page.
     */
    public function weeklySchedule()
    {
        return view('admin.work_days.weekly_schedule');
    }
}
