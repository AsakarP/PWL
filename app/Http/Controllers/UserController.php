<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {

        return view('profile.index');
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
        $user = User::with('polling_details')->get();
        $roles = Role::all();
        $kurikulums = Kurikulum::all();
        $dataTable = DataTables::of($user)
            ->addIndexColumn()
            ->make(true);
        return view('user.index', compact('dataTable', 'roles', 'kurikulums'));
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
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'add_nrp' => 'required|string',
                    'add_nama' => 'required|string',
                    'add_email' => 'required|email',
                    'add_guid_role' => 'required|string',
                    'add_tahun_masuk' => 'required|integer',
                ]
            )->validated();

            $user = new User();
            $user->nrp = $validatedData['add_nrp'];
            $user->name = $validatedData['add_nama'];
            $user->email = $validatedData['add_email'];
            $user->guid_role = $validatedData['add_guid_role'];
            $user->password = Hash::make('asd123');
            $user->tahun_masuk = $validatedData['add_tahun_masuk'];
            $user->save();
            return redirect(route('user'));
        } catch (Exception $ex) {
            dd($ex);
        }
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
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'update_nrp' => 'required|string',
                    'update_nama' => 'required|string',
                    'update_email' => 'required|email',
                    'update_guid_role' => 'required|string',
                    'update_tahun_masuk' => 'required|integer',
                ]
            )->validated();

            $user->nrp = $validatedData['update_nrp'];
            $user->name = $validatedData['update_nama'];
            $user->email = $validatedData['update_email'];
            $user->guid_role = $validatedData['update_guid_role'];
            $user->tahun_masuk = $validatedData['update_tahun_masuk'];
            $user->save();
            return redirect(route('user'));
        } catch (Exception $ex) {
            dd($ex);
        }
    }


    public function changePassword(Request $request)
    {
        $user = $user = User::find(Auth::user()->nrp);
        try {
            $request->validate([
                'currentPassword' => 'required',
                'newPassword' => 'required|different:currentPassword',
                'confirmPassword' => 'required|same:newPassword',
            ]);

            if (!Hash::check($request->currentPassword, $user->password)) {
                return redirect()->back()->with('error', 'Password saat ini salah.');
            }

            $user->password = Hash::make($request->newPassword);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diubah.');
        } catch (Exception $ex) {
            dd($ex);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user');
    }
}
