<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        return view("admin.dashboard", ["title" => "Dashboard Admin | TIN"]);
    }

    public function login_page()
    {
        return view("admin.login", ["title" => "Login | SMK TIN"]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors(['Email atau password salah']);
        }
    }
}
