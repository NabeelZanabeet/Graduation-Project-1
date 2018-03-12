<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Slides;
use Google_Service_Slides_Presentation;
use Google_Service_Slides_EventDateTime;
use Google_Service_Slides_Request;
use Google_Service_Slides_BatchUpdatePresentationRequest;
use Illuminate\Http\Request;

define('SCOPES', [
        Google_Service_Slides::PRESENTATIONS,
        Google_Service_Slides::DRIVE,
        'https://www.googleapis.com/auth/presentations',
        'https://www.googleapis.com/auth/drive'
]);
class SlidesController extends Controller
{
    protected $client;
    public $presentationId;
    public $Message="no command";
    public $title="f";
    public function __construct()
    {
        $this->title;
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(SCOPES);
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $slidesService = new Google_Service_Slides($this->client);
             $title =$_SESSION['project'];
            $presentation = new Google_Service_Slides_Presentation(array(
             'title' => $title
            ));
            $presentation = $slidesService->presentations->create($presentation);
            $_SESSION['presentationId']= $presentation->presentationId;
            $Message='presentation '.$title.' created';
            return view('/dashboard',compact('Message'));
        } else {
            return redirect()->route('oauthCallback');
        }
    }

    public function oauth()
    {
        session_start();
        $rurl = action('SlidesController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('oauthCallback2');
        }
    }

    public function createSlide()
    {
        session_start();
         if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
        // Add a slide at index 1 using the predefined 'TITLE_AND_TWO_COLUMNS' layout and
        // the ID page_id.
        $requests = array();
        $requests[] = new Google_Service_Slides_Request(array(
        'createSlide' => array (
                                'insertionIndex' => 1,
                                'slideLayoutReference' => array ( 'predefinedLayout' => 'BIG_NUMBER'))
        ));

        // If you wish to populate the slide with elements, add element create requests here,
        // using the page_id.

        // Execute the request.
         $batchUpdateRequest = new Google_Service_Slides_BatchUpdatePresentationRequest(array(
         'requests' => $requests
         ));
        $slidesService = new Google_Service_Slides($this->client);
        $presentationId = $_SESSION['presentationId'];
        $response = $slidesService->presentations->batchUpdate($presentationId, $batchUpdateRequest);
        $Message='Number Slide Created';
        return view('/dashboard',compact('Message'));
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        session_start();
        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->title,
                'description' => $request->description,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event);
            if (!$results) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
            return redirect()->route('oauthCallback');
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function generate(Request $request)
    {  session_start();
       $Speak=$request->input('speakArea');                      
       $reply = explode(" ", $Speak);
       $Message='try again';
       $keys=[];
       $project=$request->input('project');
       $slidenum=$request->input('slidenum');
       $encode=$request->input('encode');
      $replyarray=json_decode($encode,true);
     // $list =  new \SplDoublyLinkedList;

        for( $i=0 ; $i<count($reply) ; $i++){
        
            //cmd1 : Create Presentation presentation-Name 
           if($reply[$i]=="create" && !empty ($reply[$i+1]) && $reply[$i+1]=="presentation"){
               $project=$reply[$i+2];
               $Message='presentation '.$project.' created';
               $_SESSION['project']= $project;
               /*$attributes=['name'=>$reply[$i+2],'funnum'=>'1'];
               $replyarray=array_add($replyarray, $Message, $attributes);
               $array= array_dot([$project =>'']);*/
              return redirect()->route('oauthCallback');
           }

           //cmd2: create title slide  
           if($reply[$i]=="create" && !empty ($reply[$i+1]) && $reply[$i+1]=="number"&&  $reply[$i+2]=="slide"){
                 //$_SESSION['title']=$reply[$i+3];
              // $array= array_dot([$project => [$slidenum =>'']]);
               return redirect()->route('createSlide');
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
    
      
        return view('/dashboard',compact('Message'));
    }

}
