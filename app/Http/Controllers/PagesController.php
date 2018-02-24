<?php
//php artisan make:controller PagesController
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Google;
use Google_Client; 

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

   public function test(){
      
        return view('Layouts.main');
   }

   public function hackHome(){
      
        return view('Pages.hackHome');
   }
   
   public function getHome()
    {
        return view('Layouts.main');
    }
    public function indexx(Google $google)
    {
    $result = $google->getBooks();
    print_r($result);
    }
}

