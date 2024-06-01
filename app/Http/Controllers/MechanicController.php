<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MechanicController extends Controller
{
    //
    public function dashboard()
    {
        return view('layouts.mec');
    }
}
