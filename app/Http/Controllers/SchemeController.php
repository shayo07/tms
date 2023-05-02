<?php

namespace App\Http\Controllers;

use App\Models\scheme;
use App\Models\schoolscheme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scheme = schoolscheme::where('is_active', 1)->get();
        return view('scheme.scheme_add', ['scheme' => $scheme]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'schoolscheme_id' => 'required',
            'competence' => 'required',
            'objectives' => 'required',
            'month' => 'required',
            'week' => 'required',
            'main_topic' => 'required',
            'sub_topic' => 'required',
            'periods' => 'required',
            'teaching_activities' => 'required',
            'learning_activities' => 'required',
            'references' => 'required',
            'teaching_aids' => 'required',
            'assesments' => 'required',
            'remarks' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        scheme::create($formdata);
        return redirect()->route('scheme.index')->with('success', 'scheme added successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(scheme $scheme)
    {
        return view('scheme.scheme_details', ['scheme' => $scheme]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scheme $scheme)
    {
        $schoolscheme = schoolscheme::where('is_active', 1);
        return view('scheme.scheme_edit', ['scheme' => $scheme, 'schoolscheme' => $schoolscheme ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scheme $scheme)
    {

        $formdata = $request->validate([
            'schoolscheme_id' => 'required',
            'competence' => 'required',
            'objectives' => 'required',
            'month' => 'required',
            'week' => 'required',
            'main_topic' => 'required',
            'sub_topic' => 'required',
            'periods' => 'required',
            'teaching_activities' => 'required',
            'learning_activities' => 'required',
            'references' => 'required',
            'teaching_aids' => 'required',
            'assesments' => 'required',
            'remarks' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $scheme->update($formdata);
        return redirect()->route('schoolscheme.index')->with('success', 'scheme edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scheme $scheme)
    {
        $scheme->delete();
        return redirect()->route('schoolscheme.index');
    }
}
