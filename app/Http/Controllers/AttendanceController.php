<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\classes;
use App\Models\darasa;
use App\Models\SchoolAttendance;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $school_attendance = SchoolAttendance::where('slug', $request['schoolattendanceID'])->first();
        //dd($school_attendance->attendance);
        return view('attendance.attendance_view', ['school_attendance' => $school_attendance] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $darasa = darasa::where('user_id', auth()->id())->first();
        $classroom = classes::where('darasa_id', $darasa->id)->get();
        $school_attendance = SchoolAttendance::Active()->get();
        return view('attendance.attendance_add', ['classroom'=> $classroom, 'school_attendance'=>$school_attendance]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //dd($request->all());

        $studentID = $request->student_id;
        for ($i = 0; $i < sizeof($studentID); $i++)
        {

            Attendance::create([
                'school_attendance_id' => $request->school_attendance_id,
                'date' => $request->date,
                'student_id' => $studentID[$i],
                'status' => $request->status[$i],
                'slug' => Str::uuid()->getHex()."".date('is'),
                'created_by' => auth()->id(),
            ]);
        }
        return redirect()->route('school_attendance.index')->with('success', 'attendance was added successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $school_attendance = SchoolAttendance::all();
        return view('attendance.attendance_edit', ['attendance'=>$attendance, 'school_attendances'=>$school_attendance]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $formdata = $request->validate([
            'school_attendance_id' => 'required',
            'date' => 'required',
            'student_id' => 'required',
            'status' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $attendance->update($formdata);
        return redirect()->route('school_attendance.index')->with('success', 'student attendance was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->back()->with('success', 'student attendance was edited successful');

    }
}
