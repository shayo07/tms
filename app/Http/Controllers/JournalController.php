<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\School_journal;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $school_journal = School_journal::where('slug', $request['school_journal'])->first();
        return view('journal.journal_view', ['journals' => $school_journal->journals, 'school_journal'=> $school_journal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subject = subject::all();
        $school_journal = School_journal::where('is_active', 1)->get();
        return view('journal.journal_add', ['subjects' => $subject, 'school_journals' => $school_journal ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'school_journal_id' => 'required',
            'session' => 'required',
            'subject_id' => 'required',
            'concept_covered' => 'required',
            'teachers_comment' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        Journal::create($formdata);
        return redirect()->route('school_journal.index')->with('success', 'journal was added successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        $subject = subject::all();
        $school_journal = School_journal::where('is_active', 1)->get();
        return view('journal.journal_edit', ['journal'=> $journal, 'subjects' => $subject, 'school_journals' => $school_journal ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        $formdata = $request->validate([
            'school_journal_id' => 'required',
            'session' => 'required',
            'subject_id' => 'required',
            'concept_covered' => 'required',
            'teachers_comment' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $journal->update($formdata);
        return redirect()->route('school_journal.index')->with('success', 'journal was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('school_journal.index')->with('success', 'journal was deleted successful');

    }
}
