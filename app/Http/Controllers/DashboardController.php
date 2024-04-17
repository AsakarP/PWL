<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $session = new Session();
        $nrp = $session->get('nrp');
        $nama = $session->get('nama');
        $role = $session->get('role');
        return view('dashboard', compact('nrp', 'nama', 'role'));
    }
}
