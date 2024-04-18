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
        $polls = Polling::orderBy('created_at','ASC')->get();
        return view('poll.index',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Polling::create($request->all());
        
        return redirect()->route('poll.index')->with('success','Poll berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poll = Polling::findorFail($id);
        return view('poll.show',compact('poll'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {       
        $poll = Polling::findorFail($id);
        return view('poll.edit',compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poll = Polling::findorFail($id);

        $poll->update($request->all());
        return redirect()->route('poll.index')->with('success','Poll berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poll = Polling::findorFail($id);
        $poll->delete();
        return redirect()->route('poll.index')->with('success','Poll berhasil di delete');
    }
}
