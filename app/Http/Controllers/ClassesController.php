<?php

namespace App\Http\Controllers;

use App\Models\classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create(classes $classes){
        return view('classes.add_class', ['classes' => $classes]);
    }
}
