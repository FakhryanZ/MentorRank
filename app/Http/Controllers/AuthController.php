<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('alternatif');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];  

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('alternatif');
        } else {
            $request->session()->flash('error', 'Username atau password anda salah');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('home');
    }
}
