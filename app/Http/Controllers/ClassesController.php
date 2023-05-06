<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\darasa;
use App\Models\student;
use App\Models\term;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(Request $request){
        $darasa = darasa::where('slug', $request['darasaID'])->where('is_active', 1)->first();
        return view('classroom.classroom_view', ['myclasses'=>$darasa->classes]);
    }

    public function create(){
        $term = term::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        $student = student::where('is_active', 1)->get();
        return view('classroom.classroom_add', ['term'=>$term, 'darasa'=>$darasa, 'student'=>$student]);
    }

    public function store(Request $request){
        $formdata = $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        classes::create($formdata);
        return redirect()->route('darasa.index')->with('success', 'student was added to a class successful');
    }

    public function destroy(classes $classes){
        $classes->delete();
        return redirect()->route('darasa.index')->with('success', 'student was deleted successful');
    }
}
