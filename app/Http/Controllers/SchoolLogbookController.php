<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\logbook;
use App\Models\schoollogbook;
use App\Models\term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SchoolLogbookController extends Controller
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
        $logs = schoollogbook::where('is_active', 1)->get();
        return view('schoollogbook.logbook_view', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $term = term::where('is_active', 1)->get();
        $darasa = darasa::where('is_active', 1)->get();
        return view('schoollogbook.logbook_add', ['user' => $user, 'term' => $term, 'darasa' =>$darasa ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formdata = $request->validate([
            'log_name' => 'required',
            'user_id' => 'required',
            'term_id' => 'required',
            'year' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['slug'] = Str::uuid()->getHex()."".date('is');
        $formdata['created_by'] = auth()->id();
        $formdata['is_active'] = 1;
        schoollogbook::create($formdata);
        return redirect('/home')->with('success', 'logbook added successful');
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
    public function edit(schoollogbook $schoollogbook)
    {
        $users = User::where('is_active', 1)->get();
        $terms = term::where('is_active', 1)->get();
        $darasas = darasa::all();
        return view('schoollogbook.logbook_edit', [ 'log'=>$schoollogbook, 'term' => $terms, 'user' => $users, 'darasa'=> $darasas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schoollogbook $logs)
    {
        $formdata = $request->validate([
            'log_name' => 'required',
            'user_id' => 'required',
            'term_id' => 'required',
            'year' => 'required',
            'darasa_id' => 'required',
        ]);
        $formdata['updated_by'] = auth()->id();
        $logs->update($formdata);
        return redirect('/home')->with('success', 'logbook updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schoollogbook $logs)
    {
        $logs->is_active = 0;
        $logs->deleted_by = auth()->id();
        $logs->save();
        return redirect()->back()->with('success', 'logbook was removed successful!!');
    }

    public function viewlogs(schoollogbook $logs)
    {
        $logbook = logbook::where('school_logbook_id', $logs['id'])->get();
        return view('logbook.logbook_view', ['logbooks' => $logbook] );
    }

}
