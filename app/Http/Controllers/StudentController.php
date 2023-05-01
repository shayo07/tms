<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        $students = student::all();
        return view('student.view_student', compact('students'));
    }

    public function show(student $student){
        return view('student.student_details', ['student' => $student]);
    }

    public function create(){
        $term = term::all();
        return view('student.student_add', compact('term'));
    }

    public function store(Request $request){
        $formdata = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'term_id' => 'required',
            'parent_emailaddress' => ['required', 'email', Rule::unique('student', 'parent_emailaddress')],
            'home_address' => 'required',
            'is_active' => 'required',
        ]);
        $formdata['created_by'] = auth()->id();
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        student::create($formdata);
        return redirect('/students')->with('success', 'student added successful!!');
    }

    public function edit(student $student){
        $term = term::all();
        return view('student.student_edit', ['student' => $student, 'term' => $term]);
    }

    public function update(Request $request, student $student){
        $formdata = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'term_id' => 'required',
            'parent_emailaddress' => ['required', 'email'],
            'home_address' => 'required',
            'is_active' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $student->update($formdata);
        return redirect('/students')->with('success', 'student edited successfully!11');
    }

    public function destroy(student $student){
        $student->is_active = 0;
        $student->deleted_by = auth()->id();
        $student->save();
        return redirect()->back()->with('success', 'student was removed successful!!');
    }
}
