<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PollingDetailController extends Controller
{
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
        try {
            $validatedData = validator(
                $request->all(),
                [
                    'selectedCourses' => 'required|string',
                    'guid_polling' => 'required|string'
                ]
            )->validated();
            $data = json_decode($validatedData['selectedCourses'], true);
            foreach ($data as $course) {
                $pollingDetail = new PollingDetail();
                $pollingDetail->nrp_user = Auth::user()->nrp;
                $pollingDetail->kode_mata_kuliah = $course;
                $pollingDetail->guid_polling = $validatedData['guid_polling'];
                $pollingDetail->save();
            }

            return redirect(route('mata-kuliah-polling', ['polling' => $validatedData['guid_polling']]));
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    public function indexPolling(Polling $polling)
    {

        $currentTime = Carbon::now('Asia/Jakarta');

        $polling_detail = PollingDetail::where('nrp_user', '=', Auth::user()->nrp)->where('guid_polling', '=', $polling->guid)->count();

        if ($polling_detail > 0 || $currentTime > $polling->waktu_selesai) {
            $mata_kuliah = PollingDetail::with('mata_kuliah')->where('nrp_user', '=', Auth::user()->nrp)->where('guid_polling', '=', $polling->guid)->get();
            $dataTable = DataTables::of($mata_kuliah)
                ->addIndexColumn()
                ->make(true);
            return view('polling.result', compact('dataTable'));
        } else if ($currentTime < $polling->waktu_mulai) {
            abort(403, 'Polling Belum Dimulai.');
        } else {
            $kurikulum = Kurikulum::where('status', '=', 'active')->first();
            $mata_kuliah = MataKuliah::where('guid_kurikulum', '=', $kurikulum->guid)->get();
            $dataTable = DataTables::of($mata_kuliah)
                ->addIndexColumn()
                ->make(true);
            return view('polling.input', compact('dataTable', 'polling', 'kurikulum'));
        }
    }

    public function mataKuliahResultPolling($polling, $user)
    {
        $mata_kuliah = PollingDetail::with('mata_kuliah')->where('nrp_user', '=', $user)->where('guid_polling', '=', $polling)->get();
        $dataTable = DataTables::of($mata_kuliah)
            ->addIndexColumn()
            ->make(true);
        return view('polling.result', compact('dataTable'));
    }

    public function indexResultPolling(Polling $polling)
    {

        $role = Role::where('nama', '=', 'mahasiswa')->pluck('guid');
        $user = User::with('polling_details')->where('guid_role', '=', $role)->get();
        $dataTable = DataTables::of($user)
            ->addIndexColumn()
            ->make(true);
        return view('polling.user-result', compact('dataTable', 'polling'));
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
