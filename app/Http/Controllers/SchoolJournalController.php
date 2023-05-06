<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\School_journal;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchoolJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_journal = School_journal::where('is_active', 1)->get();
        return view('school_journal.school_journal_view', ['school_journals' => $school_journal]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $term = term::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('school_journal.school_journal_add', ['term' => $term, 'darasa' => $darasa, 'user' => $user ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formdata = $request->validate([
            'journal_name' => 'required',
            'darasa_id' => 'required',
            'term_id' => 'required',
            'day' => 'required',
            'date' => 'required',
            'user_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        School_journal::create($formdata);
        return redirect()->route('school_journal.index')->with('success', 'journal created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(School_journal $school_journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School_journal $school_journal)
    {
        $term = term::where('is_active', 1)->get();
        $user = User::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('school_journal.school_journal_edit', ['school_journal'=>$school_journal, 'term' => $term, 'darasa' => $darasa, 'user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School_journal $school_journal)
    {
        $formdata = $request->validate([
            'journal_name' => 'required',
            'darasa_id' => 'required',
            'term_id' => 'required',
            'day' => 'required',
            'date' => 'required',
            'user_id' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $school_journal->update($formdata);
        return redirect()->route('school_journal.index')->with('success', 'journal was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School_journal $school_journal)
    {
        $school_journal->is_active = 0;
        $school_journal->deleted_by = auth()->id();
        $school_journal->save();
        return redirect()->route('school_journal.index')->with('success', 'journal was deleted successful');

    }
}
