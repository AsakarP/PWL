<?php

namespace App\Http\Controllers;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mks = Matakuliah::orderBy('created_at', "DESC")->get();
        return view('prodi.matakuliah.index',compact('mks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Matakuliah::create($request->all());

        return redirect()->route('mk-index')->with('success','Mata Kuliah Berhasil Ditambahkan');
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
        $mk = Matakuliah::findOrFail($id);
        
        return view('prodi.matakuliah.edit' , compact('mk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mk = Matakuliah::findOrFail($id);
    
       
        $mk->update($request->all());

        
        return redirect()->route('mk-index')->with('success','User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mk = Matakuliah::findOrFail($id);

        $mk->delete();

        return redirect()->route('mk-index')->with('success','User Berhasil Dihapus');
    }
}
