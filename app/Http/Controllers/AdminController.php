<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getHome()
    {
        return view('panels.admin.home');
    }
}
