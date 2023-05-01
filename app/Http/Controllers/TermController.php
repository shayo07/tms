<?php

namespace App\Http\Controllers;

use App\Models\term;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TermController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $term = term::where('is_active', 1)->get();
        return view('term.view_term', ['term' => $term]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('term.add_term');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'term_name' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        term::create($formdata);
        return redirect('/term');

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
    public function edit(term $term)
    {
        return view('term.edit_term', ['term' => $term]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, term $term)
    {
        $formdata = $request->validate([
            'term_name' => 'required',
            'year' => 'required',
            'status' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $term->update($formdata);
        return redirect('/term');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(term $term)
    {
        $term->is_active = 0;
        $term->updated_by = auth()->id();
        $term->save();
        return redirect()->back()->with('success', 'term was removed successful!!');
    }
}
