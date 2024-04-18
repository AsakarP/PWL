<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        if ($session->get('profile_img')) {
            $profile_img = $session->get('profile_img');
        } else {
            $profile_img = false;
        }
        return view('profile.index', compact('nrp', 'nama', 'email', 'role', 'kurikulum', 'profile_img'));
    }
    public function updatephoto(Request $request, User $user)
    {

        $validateData = $request->validate([
            'image' => 'required|image|max:5120'
        ]);
        if (isset($request->oldImage)) {
            Storage::delete($request->oldImage);
        }
        $validateData['image'] = $request->file('image')->store('profile-photo');
        $user->profile_img = $validateData['image'];
        $user->save();
        return redirect(route('profile'));
    }
    public function deletePhoto(User $user)
    {
        Storage::delete($user->profile_img);
        $user->profile_img = '';
        $user->save();
        return redirect(route('profile'));
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
