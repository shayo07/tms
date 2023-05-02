<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\Lessondevelopment;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lesson_developments = Lessondevelopment::where('is_active', 1)->get();
        return view('lesson_development.lesson_development_view', compact('lesson_developments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $term = term::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('lesson_development.lesson_development_add', compact('term', 'user', 'darasa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'term_id' => 'required',
            'name' => 'required',
            'user_id' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        Lessondevelopment::create($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson development created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lessondevelopment $lesson_development)
    {
        return view('lesson_plan.lesson_plan_view', compact('lesson_development'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lessondevelopment $lesson_development)
    {
        $term = term::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('lesson_development.lesson_development_edit', compact('lesson_development', 'term', 'user', 'darasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lessondevelopment $lesson_development)
    {
        $formdata = $request->validate([
            'term_id' => 'required',
            'name' => 'required',
            'user_id' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $lesson_development->update($formdata);
        return redirect()->route('lesson_development.index')->with('success', 'lesson development edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lessondevelopment $lesson_development)
    {
        $lesson_development->deleted_by = auth()->id();
        $lesson_development->is_active = 0;
        $lesson_development->save();
        return redirect()->route('lesson_development.index');
    }
}
