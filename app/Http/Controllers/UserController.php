<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    public function profile()
    {
        $session = new Session();
        $nrp = $session->get('nrp');
        $nama = $session->get('nama');
        $email = $session->get('email');
        $role = $session->get('role');
        if ($session->get('kurikulum')) {
            $kurikulum = $session->get('kurikulum');
        } else {
            $kurikulum = false;
        }
        return view('profile.index', compact('nrp', 'nama', 'email', 'role', 'kurikulum'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
