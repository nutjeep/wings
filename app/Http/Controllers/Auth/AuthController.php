<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function auth (Request $request)
    {
        $validation = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required|min:8'
        ]);

        if(Auth::attempt($validation)) {
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                return redirect()->intended(route('dashboard'));
            } else if(Auth::user()->role_id == 2) {
                return redirect()->intended('/');
            }
        }

        return back()->with('error', 'Email / Password tidak sesuai');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}