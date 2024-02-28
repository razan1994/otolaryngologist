<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends BaseController
{
    // ================================================================
    // ======================== Admin Index Function ==================
    // ================================================================
    public function dashboard()
    {
        return view('admin.index');
    }
}
