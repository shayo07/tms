<?php

namespace App\Http\Controllers;

use App\Models\Lesson_plan;
use App\Models\Lessondevelopment;
use App\Models\LessonPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonPlanController extends Controller
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
        $lesson_development = Lessondevelopment::where('is_active', 1)->get();
        return view('lesson_plan.lesson_plan_add', compact('lesson_development'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'periods' => 'required',
            'time' => 'required',
            'boys_registered' => 'required',
            'girls_registered' => 'required',
            'boys_present' => 'required',
            'girls_present' => 'required',
            'competence' => 'required',
            'topic' => 'required',
            'sub_topic' => 'required',
            'general_objectives' => 'required',
            'specific_objectives' => 'required',
            'teachers_learning_material' => 'required',
            'reference' => 'required',
        ]);
        $formdata['created_by'] = auth()->id();
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        Lesson_plan::create($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson details created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson_plan $lessonPlan)
    {
        return view('lesson_plan.lesson_plan_details', ['lesson_plan' => $lessonPlan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson_plan $lesson_plan)
    {

        $lesson_development = Lessondevelopment::where('is_active')->get();
        return view('lesson_plan.lesson_plan_edit', compact('lesson_development', 'lesson_plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson_plan $lesson_plan)
    {

        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'periods' => 'required',
            'time' => 'required',
            'boys_registered' => 'required',
            'girls_registered' => 'required',
            'boys_present' => 'required',
            'girls_present' => 'required',
            'competence' => 'required',
            'topic' => 'required',
            'sub_topic' => 'required',
            'general_objectives' => 'required',
            'specific_objectives' => 'required',
            'teachers_learning_material' => 'required',
            'reference' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $lesson_plan->update($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson details updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson_plan $lesson_plan)
    {
        $lesson_plan->delete();
        return redirect()->route('lesson_development.index')->with('success', 'lesson details deleted successful');

    }
}
