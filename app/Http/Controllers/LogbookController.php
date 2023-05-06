<?php

namespace App\Http\Controllers;

use App\Models\logbook;
use App\Models\schoollogbook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LogbookController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $logbook = schoollogbook::where('is_active', 1)->get();
        return view('logbook.logbook_add', ['logbook' => $logbook]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'schoollogbook_id' => 'required',
            'week_number' => 'required',
            'month_number' => 'required',
            'main_topic' => 'required',
            'sub_topic' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'concept_covered' => 'required',
            'teachers_comment' => 'required',
            'headofdepartment_comment' => 'required',
            'headteachers_comment' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        logbook::create($formdata);
        return redirect('/home')->with('success', 'logbook added successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(logbook $logbook)
    {
        return view('logbook.logbook_details', ['logbooks' => $logbook] );
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logbook $logbook)
    {
        return view('logbook.logbook_edit', [ 'logbook' => $logbook]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logbook $logbook)
    {
        $formdata = $request->validate([
            'schoollogbook_id' => 'required',
            'week_number' => 'required',
            'month_number' => 'required',
            'main_topic' => 'required',
            'sub_topic' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'concept_covered' => 'required',
            'teachers_comment' => 'required',
            'headofdepartment_comment' => 'required',
            'headteachers_comment' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $myval = schoollogbook::where('log_name', $request['school_logbook'])->first('id');
        $logbook->update($formdata);
        return redirect('/home')->with('success', 'logbook edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logbook $logs)
    {
        $logs->delete();
        return redirect('/home')->with('success', 'logbook was removed successful!!');
    }
}
