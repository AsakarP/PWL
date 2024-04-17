<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $session = new Session();
            $session->set('nama', Auth::user()->name);
            $session->set('nrp', Auth::user()->nrp);
            $session->set('email', Auth::user()->email);
            $session->set('role', Auth::user()->role->nama);
            if (isset(Auth::user()->kurikulum)) {
                $session->set('kurikulum', Auth::user()->kurikulum->tahun_akademik);
            }

            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['login' => 'Email atau password salah.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $session = new Session();
        $session->clear();
        return redirect('/');
    }
}
