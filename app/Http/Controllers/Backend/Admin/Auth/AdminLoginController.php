<?php

namespace App\Http\Controllers\Backend\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends BaseController
{
    public function __construct()
    {
        $this->middleware('guest:super_admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // return $request;
        // Validate form data
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('super_admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('super_admin.dashboard'));
        }
        // if unsuccessful
        $errors = [
            'username' => 'username or password is incorrect',
        ];
        return redirect()->back()->withInput($request->only('username', 'remember'))->withErrors($errors);
    }
}
