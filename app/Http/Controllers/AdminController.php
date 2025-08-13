<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard()
    {
        return view("admin.dashboard", ["title" => "Dashboard Admin | TIN", "candidates" => Candidate::count(), "id_css" => ""]);
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

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('admin.login');
    }

    public function loginAPI(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                "success" => "Login berhasil!"
            ]);
        } else {
            return response()->json([
                "error" => "Email atau password salah!"
            ]);
        }
    }

    public function logoutAPI(Request $request) {
        $request->session()->flush();
        return response()->json([
            "success" => "Logout berhasil!"
        ]);
    }
}
