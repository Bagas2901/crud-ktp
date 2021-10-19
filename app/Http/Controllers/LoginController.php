<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //index login
    public function index()
    {
        //call view
        return view('login');
    }

    //proses login
    public function proses_login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin == '1') {
                $request->session()->regenerate();
                return redirect()->intended('ktp');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('ktp');
            }
            return redirect('/');
        }
        return redirect('/')->with('loginError', 'Opps! Silahkan Cek Username dan Password');
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
