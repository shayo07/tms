<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
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
        $user = User::all();
        return view('user.view_user', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.user_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $formdata = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required',
            'password' => 'required',
            'is_super' => 'required',
            'is_admin' => 'required',
            'is_staff' => 'required',
            'is_active' => 'required',

        ]);
        $formdata ['created_by'] = auth()->id();
        $formdata['password'] = Hash::make($formdata['password']);
        $formdata ['slug'] = Str::uuid()->getHex()."".date('is');
        User::create($formdata);
        return redirect('/home')->with('success', 'user created successful');
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
    public function edit(User $user)
    {
        //
        return view('user.edit_user', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $formdata = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required',
            'is_super' => 'required',
            'is_admin' => 'required',
            'is_staff' => 'required',
            'is_active' => 'required',

        ]);
        $user->update($formdata);
        return redirect('/home')->with('success', 'user created successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->is_active = 0;
        $user->updated_by = auth()->id();
        $user->save();

        return redirect()->back()->with('success', 'student was removed successful!!');
    }
}
