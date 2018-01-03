<?php
//php artisan make:controller PagesController
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
     // use with to pass valued to the views to exchange data betwwen model and view through controller
        return view('Pages.about')->with($data);
   }
}
