<?php

namespace App\Http\Controllers;

use App\Models\darasa;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class DarasaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        $darasa = darasa::all();
        $user = User::all();
        foreach ($darasa as $dr){
            foreach ($user as $us){
                if ($dr['user_id'] == $us['id']){
                    $dr['user_id'] = $us['name'];
                }
            }}
        return view('darasa.view_darasa', ['darasa' => $darasa]);
    }

    public function create(){
        $user = User::all();
        return view('darasa.add_darasa', ['user' => $user]);
    }

    public function store(Request $request){
        $datafield = $request->validate([
            'class_name' => 'required',
            'class_capacity' => 'required',
            'user_id' => 'required',
            'is_active' => 'required',
        ]);
        $datafield['created_by'] = auth()->id();
        $datafield['slug'] = \Illuminate\Support\Str::uuid()->getHex()."".date('is');
        darasa::create($datafield);
        return redirect('/home')->with('success', 'class added successful');
    }

    public function edit(darasa $darasa){
        $user = User::all();
        return view('darasa.edit_darasa', ['user' => $user, 'darasa' => $darasa]);
    }

    public function update(Request $request, darasa $darasa){
        $datafield = $request->validate([
            'class_name' => 'required',
            'class_capacity' => 'required',
            'user_id' => 'required',
            'is_active' => 'required',
        ]);
        $darasa->update($datafield);
        return redirect('/home')->with('success', 'class added successful');
    }

    public function destroy(darasa $darasa){
        $darasa->delete();
        return back()->with('success', 'class deleted successful!!');
    }
}
