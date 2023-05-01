<?php

namespace App\Http\Controllers;

use App\Models\scheme;
use App\Models\schoolscheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schemes = scheme::where('slug', $request->schemeID)->get();
        return view('scheme.scheme_view', ['schemes' => $schemes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('scheme.scheme_view');
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
