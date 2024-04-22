<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polls = Polling::orderBy('created_at', "DESC")->get();
        return view('prodi.polling.index',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.polling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Polling::create($request->all());

        return redirect()->route('poll-index')->with('success','Polling Berhasil Ditambahkan');
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
        $poll = Polling::findOrFail($id);
        
        return view('prodi.polling.edit' , compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poll = Polling::findOrFail($id);
    
       
        $poll->update($request->all());

        
        return redirect()->route('poll-index')->with('success','Polling Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poll = Polling::findOrFail($id);

        $poll->delete();

        return redirect()->route('poll-index')->with('success','Polling Berhasil Dihapus');
    }
}
