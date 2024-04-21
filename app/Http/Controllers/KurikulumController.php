<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurikulum = Kurikulum::withCount('users', 'mata_kuliahs')->get();
        $dataTable = DataTables::of($kurikulum)
            ->addIndexColumn()
            ->make(true);
        return view('kurikulum.index', compact('dataTable'));
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
                    'add_tahun_akademik' => 'required|integer',
                ]
            )->validated();

            $kurikulum = new Kurikulum();
            $kurikulum->tahun_akademik = $validatedData['add_tahun_akademik'];
            $kurikulum->save();
            return redirect(route('kurikulum'));
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
    public function update(Request $request, Kurikulum $kurikulum)
    {
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'update_tahun_akademik' => 'required|integer',
                ]
            )->validated();

            $kurikulum->tahun_akademik = $validatedData['update_tahun_akademik'];
            $kurikulum->save();
            return redirect(route('kurikulum'));
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('kurikulum');
    }
}
