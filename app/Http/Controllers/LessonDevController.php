<?php

namespace App\Http\Controllers;

use App\Models\Lesson_dev;
use App\Models\Lesson_plan;
use App\Models\Lessondevelopment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonDevController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lesson_development = Lessondevelopment::where('slug', $request->lesson_plan)->first();
        return view('lesson_dev.lesson_dev_view', ['lesson_development' => $lesson_development]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lesson_development = Lessondevelopment::where('is_active', 1)->get();
        return view('lesson_dev.lesson_dev_add', ['lesson_development' => $lesson_development]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'stage' => 'required',
            'time' => 'required',
            'teaching_activities' => 'required',
            'learning_activities' => 'required',
            'assessment' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        Lesson_dev::create($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson development was created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson_dev $lesson_dev)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson_dev $lesson_dev)
    {
        $lesson_development = Lessondevelopment::where('is_active', 1);
        return view('lesson_dev.lesson_dev_edit', ['lesson_dev' => $lesson_dev, 'lesson_development' => $lesson_development]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson_dev $lesson_dev)
    {
        $formdata = $request->validate([
            'lessondevelopment_id' => 'required',
            'stage' => 'required',
            'time' => 'required',
            'teaching_activities' => 'required',
            'learning_activities' => 'required',
            'assessment' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $lesson_dev->update($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson development was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson_dev $lesson_dev)
    {
        $lesson_dev->delete();
        return redirect()->route('lesson_development.index')->with('success', 'lesson development was removed successful');

    }
}
