<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $currentDateTime = Carbon::now('Asia/Jakarta');
        $polling = Polling::where('waktu_mulai', '<', $currentDateTime)->where('waktu_selesai', '>', $currentDateTime)->get();
        $dataTable = DataTables::of($polling)
            ->addIndexColumn()
            ->make(true);
        return view('dashboard', compact('dataTable'));
    }
}
