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
            $session->set('name', Auth::user()->name);
            $session->set('nrp', Auth::user()->nrp);
            $session->set('role', Auth::user()->role->nama);
            $nrp = $session->get('nrp');
            $nama = $session->get('nama');
            $role = $session->get('role');
            return view('dashboard', compact('nrp', 'nama', 'role'));
        } else {
            return back()->withErrors(['login' => 'Email atau password salah.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $session = new Session();
        $session->clear();
        return redirect()->route('login');
    }
}
