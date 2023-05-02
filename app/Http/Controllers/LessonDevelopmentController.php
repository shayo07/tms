<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\Lesson_development;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;

class LessonDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lesson_development = Lesson_development::where('is_active', 1);
        return view('lesson_development.lesson_development_view', compact('lesson_development'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson_development $lesson_development)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson_development $lesson_development)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson_development $lesson_development)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson_development $lesson_development)
    {
        //
    }
}
