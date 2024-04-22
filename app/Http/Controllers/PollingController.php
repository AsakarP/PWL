<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polling = Polling::all();
        $dataTable = DataTables::of($polling)
            ->addIndexColumn()
            ->make(true);
        return view('polling.index', compact('dataTable'));
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
                    'add_waktu_mulai' => 'required|date_format:Y-m-d\TH:i',
                    'add_waktu_selesai' => 'required|date_format:Y-m-d\TH:i|after:' . $request['add_waktu_mulai'],
                ]
            )->validated();

            $polling = new Polling();
            $polling->waktu_mulai = $validatedData['add_waktu_mulai'];
            $polling->waktu_selesai = $validatedData['add_waktu_selesai'];
            $polling->save();
            return redirect(route('polling'));
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
    public function update(Request $request, Polling $polling)
    {
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'update_waktu_mulai' => 'required|date_format:Y-m-d\TH:i',
                    'update_waktu_selesai' => 'required|date_format:Y-m-d\TH:i|after:' . $request['update_waktu_mulai'],
                ]
            )->validated();

            $polling->waktu_mulai = $validatedData['update_waktu_mulai'];
            $polling->waktu_selesai = $validatedData['update_waktu_selesai'];
            $polling->save();
            return redirect(route('polling'));
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling->delete();
        return redirect()->route('polling');
    }
}
