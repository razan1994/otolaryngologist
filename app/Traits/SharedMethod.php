<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait SharedMethod
{
    public function authUserType()
    {
        if (Auth::guard('super_admin')->check()) {
            return 'Super Admin';
        } elseif (Auth::guard('customer')->check()) {
            return 'Customer';
        } else {
            return 'undefined';
        }
    }

}
