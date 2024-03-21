<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('kk.index', [
            'kks' => KartuKeluarga::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'no' => 'required|string|max:16|unique:kartu_keluarga',
            'nama_kepala' => 'required|string|max:100',
        ], [
            'no.required' => 'Nomor Kartu Keluarga wajib diisi',
            'no.unique' => 'Nomor kartu sudah terdaftar. Silahkan periksa lol',
            'nama_kepala.required' => 'Nama kepala keluarga wajib diisi',
        ])->validate();
        $kartuKeluarga = new KartuKeluarga($validatedData);
        $kartuKeluarga->save();
        return redirect(route('kk-list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(KartuKeluarga $kartuKeluarga)
    {
        return view('kk.edit', [
            'kk' => $kartuKeluarga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, KartuKeluarga $kartuKeluarga)
    {
        $validatedData = validator($request->all(), [
            'nama_kepala' => 'required|string|max:100',
        ], [
            'nama_kepala.required' => 'Nama kepala keluarga wajib diisi',
        ])->validate();
        $kartuKeluarga->nama_kepala = $validatedData['nama_kepala'];
        $kartuKeluarga->save();
        return redirect(route('kk-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        
        $kartuKeluarga->delete();
        return redirect(route('kk-list'));
    }
}
