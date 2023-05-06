<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $subject = subject::all();
        return view('subject.subject_view', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('subject.subject_add', compact('user', 'darasa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'subject_name' => 'required',
            'user_id' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        subject::create($formdata);
        return redirect()->route('subject_id')->with('success', 'subject was added successful');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
