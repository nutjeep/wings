<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $validation = $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'role_id'   => '',
            'password'  => 'required|min:8',
        ]);

        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('register')->with('success', 'Berhasil membuat akun');
    }
}
