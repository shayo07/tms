<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\scheme;
use App\Models\schoolscheme;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SchoolSchemeController extends Controller
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
        if (Auth::user()->is_admin){
            $schemes = schoolscheme::where('is_active', 1)->get();
        }
        else{
            $schemes = schoolscheme::where('user_id', Auth::user()->id)->where('is_active', 1)->get();
        }
        return view('schoolscheme.scheme_view', ['schemes' => $schemes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('is_active', 1)->get();
        $term = term::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('schoolscheme.scheme_add', ['user' => $user, 'term' => $term, 'darasa' =>$darasa ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'scheme_name' => 'required',
            'user_id' => 'required',
            'term_id' => 'required',
            'year' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        schoolscheme::create($formdata);
        return redirect('/home')->with('success', 'scheme added successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(schoolscheme $schoolscheme)
    {
        return view('scheme.scheme_view', compact('schoolscheme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(schoolscheme $scheme)
    {
        $users = User::where('is_active', 1)->get();
        $terms = term::where('is_active', 1)->get();
        $darasas = darasa::all();
        return view('schoolscheme.scheme_edit', [  'scheme'=>$scheme, 'term' => $terms, 'user' => $users, 'darasa'=> $darasas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schoolscheme $schoolscheme)
    {
        $formdata = $request->validate([
            'scheme_name' => 'required',
            'user_id' => 'required',
            'term_id' => 'required',
            'year' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $schoolscheme->update($formdata);
        return redirect('/home')->with('success', 'scheme updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(schoolscheme $scheme)
    {
        $scheme->deleted_by = auth()->id();
        $scheme->is_active = 0;
        $scheme->save();
        return redirect()->route('schoolscheme.index') ->with('success', 'scheme deleted successful');

    }



}
