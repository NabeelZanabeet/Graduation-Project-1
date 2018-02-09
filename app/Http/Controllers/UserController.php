<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getHome()
    {
        return view('panels.user.home');
    }
}
