<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\SchoolAttendance;
use App\Models\student;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchoolAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_attendances = SchoolAttendance::where('is_active', 1)->get();

        return view('school_attendance.school_attendance_view',compact('school_attendances') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $term = term::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();

        return view('school_attendance.school_attendance_add', ['term'=>$term, 'darasa'=>$darasa, 'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'term_id' => 'required',
            'darasa_id' => 'required',
            'user_id' => 'required',
            'attendance_name' => 'required',
        ]);
        $formdata['is_active'] = 1;
        $formdata['created_by'] = auth()->id();
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        SchoolAttendance::create($formdata);

        return redirect()->route('school_attendance.index')->with('success', 'attendance was created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolAttendance $schoolAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolAttendance $schoolAttendance)
    {
        $term = term::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();

        return view('school_attendance.school_attendance_edit', ['school_attendance'=>$schoolAttendance,'term'=>$term, 'darasa'=>$darasa, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolAttendance $schoolAttendance)
    {
        $formdata = $request->validate([
            'term_id' => 'required',
            'darasa_id' => 'required',
            'user_id' => 'required',
            'attendance_name' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $schoolAttendance->update($formdata);

        return redirect()->route('school_attendance.index')->with('success', 'attendance was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolAttendance $schoolAttendance)
    {
        $schoolAttendance->deleted_by = auth()->id();
        $schoolAttendance->is_active = 0;
        $schoolAttendance->save();

        return redirect()->route('school_attendance.index')->with('success', 'attendance was removed successful');
    }
}
