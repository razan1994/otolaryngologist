<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Routing\Controller;
use App\Models\BlockedDate;
use App\Models\SupportTicket;

class BlockedDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocked_dates = BlockedDate::orderBy('date', 'desc')->get();
        return view('admin.blocked_dates.index', compact('blocked_dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blocked_dates.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blockedDate = BlockedDate::findOrFail($id);
        return view('admin.blocked_dates.edit', compact('blockedDate'));
    }

    /**
     * Soft delete the specified resource.
     */
    public function softDelete($id)
    {
        try {
            $blockedDate = BlockedDate::find($id);
            if ($blockedDate) {
                $blockedDate->delete();
                return redirect()->route('super_admin.blocked-dates-index')
                    ->with('success', 'Blocked date deleted successfully.');
            }
            return redirect()->route('super_admin.blocked-dates-index')
                ->with('error', 'Blocked date not found.');
        } catch (\Exception $e) {
            SupportTicket::create([
                'user_id' => auth()->guard('super_admin')->id(),
                'category_id' => null,
                'priority' => 1,
                'subject' => 'Error deleting blocked date',
                'message' => $e->getMessage(),
            ]);
            return redirect()->route('super_admin.blocked-dates-index')
                ->with('error', 'An error occurred while deleting the blocked date.');
        }
    }
}
