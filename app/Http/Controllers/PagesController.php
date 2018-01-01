<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Hey im  passed by the controller way 1';
         return view('Pages.index',compact('title'));
    }
    public function about(){
        $data = array(
           'title'=> 'About dynamic tiltle',
           'services'=>['web','prog','seo']
        );
        return view('Pages.about')->with($data);
   }
}
