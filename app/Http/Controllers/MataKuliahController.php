<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;
use Illuminate\Support\Facades\Auth;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = MataKuliah::with('kurikulum')->get();
        $dataTable = DataTables::of($mata_kuliah)
            ->addIndexColumn()
            ->make(true);
        return view('mata_kuliah.index', compact('dataTable'));
    }

    public function indexFilterKurikulum(Kurikulum $kurikulum)
    {
        $mata_kuliah = MataKuliah::with('kurikulum')->where('guid_kurikulum', '=', $kurikulum->guid)->get();
        $dataTable = DataTables::of($mata_kuliah)
            ->addIndexColumn()
            ->make(true);
        $tahunAkademik = $kurikulum->tahun_akademik;
        $guid = $kurikulum->guid;
        return view('mata_kuliah.index', compact('dataTable', 'tahunAkademik', 'guid'));
    }

    public function indexPolling(Polling $polling)
    {

        $polling_detail = PollingDetail::where('nrp_user', '=', Auth::user()->nrp)->where('guid_polling', '=', $polling->guid)->count();

        if ($polling_detail > 0) {
            $mata_kuliah = PollingDetail::with('mata_kuliah')->where('nrp_user', '=', Auth::user()->nrp)->where('guid_polling', '=', $polling->guid)->get();
            $dataTable = DataTables::of($mata_kuliah)
                ->addIndexColumn()
                ->make(true);
            return view('polling.result', compact('dataTable'));
        } else {
            $kurikulum = Kurikulum::where('status', '=', 'active')->first();
            $mata_kuliah = MataKuliah::where('guid_kurikulum', '=', $kurikulum->guid)->get();
            $dataTable = DataTables::of($mata_kuliah)
                ->addIndexColumn()
                ->make(true);
            return view('polling.input', compact('dataTable', 'polling', 'kurikulum'));
        }
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
                    'add_kode' => 'required|string',
                    'add_nama' => 'required|string',
                    'add_sks' => 'required|integer',
                    'add_jadwal' => 'required|string',
                    'add_guid_kurikulum' => 'required|string'
                ]
            )->validated();

            $mataKuliah = new MataKuliah();
            $mataKuliah->kode = $validatedData['add_kode'];
            $mataKuliah->nama = $validatedData['add_nama'];
            $mataKuliah->sks = $validatedData['add_sks'];
            $mataKuliah->jadwal = $validatedData['add_jadwal'];
            $mataKuliah->guid_kurikulum = $validatedData['add_guid_kurikulum'];
            $mataKuliah->save();
            return redirect()->route('mata-kuliah-filter-kurikulum', ['kurikulum' => $mataKuliah->guid_kurikulum]);
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
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'update_kode' => 'required|string',
                    'update_nama' => 'required|string',
                    'update_sks' => 'required|integer',
                    'update_jadwal' => 'required|string',
                ]
            )->validated();

            $mataKuliah->kode = $validatedData['update_kode'];
            $mataKuliah->nama = $validatedData['update_nama'];
            $mataKuliah->sks = $validatedData['update_sks'];
            $mataKuliah->jadwal = $validatedData['update_jadwal'];
            $mataKuliah->save();
            return redirect()->route('mata-kuliah-filter-kurikulum', ['kurikulum' => $mataKuliah->guid_kurikulum]);
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        $kurikulum = $mataKuliah->guid_kurikulum;
        $mataKuliah->delete();
        return redirect()->route('mata-kuliah-filter-kurikulum', ['kurikulum' => $kurikulum]);
    }
}
