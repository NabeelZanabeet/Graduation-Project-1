<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use SplDoublyLinkedList;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**Access Control By Authintication (All functions in this controller wont be accessed without login)*/
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
         $keys=[];
         $Message="no command";
         $project='';
         $slidenum='';
         $encode='';
        return view('/dashboard',compact('Message','project','slidenum','encode','keys'));
    }


    public function test(Request $request)
    {   
       $Speak=$request->input('InputTextArea');                      
       $reply = explode(" ", $Speak);
       $Message='try again';
       $keys=[];
       $project=$request->input('project');
       $slidenum=$request->input('slidenum');
       $encode=$request->input('encode');
      $replyarray=json_decode($encode,true);
     // $list =  new \SplDoublyLinkedList;

        for( $i=0 ; $i<count($reply) ; $i++){
            if($reply[$i]=="مشروع"){
                $Message="ok";
                $project=$reply[$i+1];
                //$Message=$project;
            }
            //cmd1 : Create Presentation presentation-Name 
           if($reply[$i]=="create" && !empty ($reply[$i+1]) && $reply[$i+1]=="presentation"){
               $project=$reply[$i+2];
               $Message='presentation '.$project.' created';
               $attributes=['name'=>$reply[$i+2],'funnum'=>'1'];
               $replyarray=array_add($replyarray, $Message, $attributes);
               $array= array_dot([$project =>'']);
           }

           //cmd2: create slide slide-num 
           if($reply[$i]=="create" && !empty ($reply[$i+1]) && $reply[$i+1]=="slide"){
               $slidenum='slide '.$reply[$i+2];
               $Message=$slidenum.' created';
              // $array= array_dot([$project => [$slidenum =>'']]);
               $attributes=['projectname'=>$project ,'slidenum'=>$reply[$i+2],'funnum'=>'2'];
               $replyarray=array_add($replyarray, $Message, $attributes);
               }

          // cmd: color  
             if($reply[$i]=="color" || $reply[$i]=="text"){
                //$array= array_dot([$project => [$slidenum =>[$reply[$i]=> $reply[$i+1]]]]);
               //$arra=array_add($arra,$project.$slidenum.$reply[$i],$reply[$i+1]);
                $Message=$reply[$i].' changed to '.$reply[$i+1].' in '.$slidenum;
                 $attributes=['projectname'=>$project ,'slidenum'=>$slidenum,'change'=>$reply[$i],'to'=>$reply[$i+1],'funnum'=>'3'];
                 $replyarray=array_add($replyarray, $Message, $attributes);
                }
                if($reply[$i]=="undo" ){
                    array_pop ( $replyarray );
                    $Message="done";
                    }
                    if($reply[$i]=="generate" ){
                        
                        $replyarray=[];
                        $Message="done";
                        }
               

        }
    if($replyarray != [])
    { list($keys, $values) = array_divide($replyarray);}
      $encode=json_encode($replyarray);
       //$Message=$encode;
      
        return view('/dashboard',compact('Message','project','slidenum','encode','keys'));
    }

}