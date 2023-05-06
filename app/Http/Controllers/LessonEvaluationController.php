<?php

namespace App\Http\Controllers;

use App\Models\Lesson_evaluation;
use App\Models\Lessondevelopment;
use Illuminate\Http\Request;
use Psy\Util\Str;

class LessonEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lesson_development = Lessondevelopment::where('slug', $request->lesson_development)->first();
        return view('lesson_evaluation.lesson_evaluation_view', ['lesson_development' => $lesson_development]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lesson_development = Lessondevelopment::where('is_active', 1)->get();
        return view('lesson_evaluation.lesson_evaluation_add', ['lesson_development' => $lesson_development]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'student_evaluation' => 'required',
            'teachers_evaluation' => 'required',
            'remarks' => 'required',
        ]);
        $formdata['slug'] = \Illuminate\Support\Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        Lesson_evaluation::create($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson evaluation created successful');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson_evaluation $lesson_evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson_evaluation $lesson_evaluation)
    {
        $lesson_development = Lessondevelopment::where('is_active', 1);
        return view('lesson_evaluation.lesson_evaluation_edit', ['lesson_evaluation' => $lesson_evaluation, 'lesson_development' => $lesson_development]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson_evaluation $lesson_evaluation)
    {
        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'student_evaluation' => 'required',
            'teachers_evaluation' => 'required',
            'remarks' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $lesson_evaluation->update($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson evaluation edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson_evaluation $lesson_evaluation)
    {
        $lesson_evaluation->delete();
        return redirect()->route('lesson_development.index')->with('success', 'lesson evaluation removed successful');


    }
}
