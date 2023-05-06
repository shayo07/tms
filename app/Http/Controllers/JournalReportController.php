<?php

namespace App\Http\Controllers;

use App\Models\Journal_Report;
use App\Models\School_journal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $school_journal = School_journal::where('slug', $request['journalID'])->first();
        return view('journal_report.journal_report_view', ['journal' =>$school_journal->journal_reports]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_journals = School_journal::where('is_active', 1)->get();
        return view('journal_report.journal_report_add', compact('school_journals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = $request->validate([
            'school_journal_id' => 'required',
            'periods_taught' => 'required',
            'periods_not_taught' => 'required',
            'reason_for_not_taught' => 'required',
            'class_teacher_comment' => 'required',
            'admin_teacher_comment' => 'required',
            'super_admin_teacher_comment' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        Journal_Report::create($formdata);
        return redirect()->route('school_journal.index')->with('success', 'report was created successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal_Report $journal_Report)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal_Report $journal_report)
    {
        $school_journal = School_journal::where('is_active', 1)->get();
        return view('journal_report.journal_report_edit', ['school_journals'=>$school_journal, 'journal_report' => $journal_report]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal_Report $journal_Report)
    {
        $formdata = $request->validate([
            'school_journal_id' => 'required',
            'periods_taught' => 'required',
            'periods_not_taught' => 'required',
            'reason_for_not_taught' => 'required',
            'class_teacher_comment' => 'required',
            'admin_teacher_comment' => 'required',
            'super_admin_teacher_comment' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $journal_Report->update($formdata);
        return redirect()->route('school_journal.index')->with('success', 'report was edited successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal_Report $journal_Report)
    {
        $journal_Report->delete();
        return redirect()->route('school_journal.index')->with('success', 'report was deleted successful');
    }
}
