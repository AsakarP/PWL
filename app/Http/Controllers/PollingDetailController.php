<?php

namespace App\Http\Controllers;

use App\Models\PollingDetail;
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
