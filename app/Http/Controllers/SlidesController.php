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

    public function __construct()
    {
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
            $title='mabeel';
            $slidesService = new Google_Service_Slides($this->client);
            $presentation = new Google_Service_Slides_Presentation(array(
             'title' => $title
            ));
            $this->presentationId= $presentation->presentationId;
            $presentation = $slidesService->presentations->create($presentation);
           
            return view('/dashboard');
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
                                'slideLayoutReference' => array ( 'predefinedLayout' => 'TITLE_AND_TWO_COLUMNS')
                                )
        ));

        // If you wish to populate the slide with elements, add element create requests here,
        // using the page_id.

        // Execute the request.
         $batchUpdateRequest = new Google_Service_Slides_BatchUpdatePresentationRequest(array(
         'requests' => $requests
         ));
        $slidesService = new Google_Service_Slides($this->client);
        $presentationId = '1J7U4BTskSANnqAgBGvUmQDMZZ-QL4-N-julLt7h6_D0';
        $response = $slidesService->presentations->batchUpdate($presentationId, $batchUpdateRequest);
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
}
