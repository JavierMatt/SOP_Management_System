<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Filecontroller extends Controller
{
    //
    public function showFileUser()
    {
        // logik
        return view('userpage');
    }
    public function showFileAdmin()
    {
        // logik
        return view('adminpage');
    }
}
