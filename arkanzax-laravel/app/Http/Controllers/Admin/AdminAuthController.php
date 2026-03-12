<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (Session::get('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminEmail = env('ADMIN_USER', 'm.ark4seller@gmail.com');
        $adminPassword = env('ADMIN_PASSWORD', '123123');

        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            Session::put('admin_logged_in', true);
            Session::put('admin_email', $request->email);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_email');
        return redirect()->route('admin.login');
    }
}
