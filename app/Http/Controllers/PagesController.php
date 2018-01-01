<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Hey im  passed by the controller ';
         return view('Pages.index',compact('title'));
    }
    public function about(){
        return view('Pages.about');
   }
}
