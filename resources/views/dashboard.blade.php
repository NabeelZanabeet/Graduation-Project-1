@extends('layouts.main')

@section('style') 
         <link href="{{ asset('css/dashboardStyle.css') }}" rel="stylesheet">
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet" />


    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>$(document).ready(function(){
            jQuery(function(){
                jQuery('#say').click();
             });
        });
    </script>
@endsection

@section('content')

<div class="container">
        <div class="row">
          <div class="col-md-4">
              <br><br>  
                <div class="container" >
                        <div class="speech" align="center">
                            <br><br>
                            {!! csrf_field() !!}
                        <div class="form-style-5">
                            
                        </div>
                        <input onclick='responsiveVoice.speak(speak.value);' Value ="play" type='button' class="btn btn-warning" id="value" />
                       </div>
                </div>
          </div>
          <div class="col-md-4">
                <div class="container">
                   <br><br><br><br><br><br>
                   <img onclick="startDictation()" width="90%" hight="90%" src="Images/RedMic.png" />
                   <button onclick="startDictation()" type="button" class="btn btn-default" id="getRequest">Get Started</button>     
                   <button onclick="document.speakForm.submit();" type="button" class="btn btn-default  " id="submit">send</button>
                    <form  action="{{action('SlidesController@index')}}" method="post" name="speakForm"  id="VoiceForm" >
                     <input type="submit" value="Submit">
                    </form>
                </div>
          </div>

          <div class="col-md-4" id="p">
               <br><br><br><br>
               <div class="container">
                  <div class="speech" align="center">
                    <div class="form-style-5">
                       <textarea rows="13" cols="40" name="r" id="replyForm" placeholder="replyForm"> 
                          @foreach($keys as $key)
                          {{$key}}
                          @endforeach 
                     </textarea>
                    </div>  
                    <input onclick='responsiveVoice.speak("{{$Message}}");' Value ="play" type='button' class="btn btn-warning" id="say" />
                 <div>
              </div>
          </div>   

        </div>
    </div>
@endsection

    @section('script')
  

  <script>
        function startDictation() {
      
          if (window.hasOwnProperty('webkitSpeechRecognition')) {
      
            var recognition = new webkitSpeechRecognition();
      
            recognition.continuous = false;
            recognition.interimResults = false;
      
            recognition.lang = "en-US";
            recognition.start();
      
            recognition.onresult = function(e) {
              document.getElementById('speak').value
                                       = e.results[0][0].transcript;
              recognition.stop();

               document.speakForm.submit();
            };
      
            recognition.onerror = function(e) {
              recognition.stop();
            }
      
          }
        }
      </script>


      

@endsection






<!--
    <div class="container">
    

        <br>
        <p align="center">Slide creator page</p>
       <br><br>
        {!! Form::open(['action'=>'PostController@store','method'=>'Post' , 'enctype'=> 'multipart/form-data']) !!}
        <div class="form-grup" align="center">
            {{ Form::textarea('notes') }}
            <br>
        <input  align="center" type="image" src="Images/MicButton.png" alt="Submit" width="48" height="48">
       
           </div>
             {!! Form::close() !!}


      <script type="text/javascript">
        $(document).ready(function(){
             $('#getRequest').click(function(){
                $.get('getRequest',function(data)
                    $('#getRequestData').append(data);               
                        console.log(data);          
                                    });
                            }); 
                   });
      </script>
    
</div>
-->
<!--
      <script type="text/javascript">
        $(document).ready(function(){
       
            $('#sf').on('submit',function(e){
        $.ajax({
          url: "{{ URL::to('test.store') }}", //Full path of your action
          type: "post",   
          data: {'s':s,'_token': '{{ csrf_token() }}'},
          success: function(data){
            $('#reply').html(data);
          },
          error: function (xhr, status) {              
                alert('There is some error.Try after some time.'); 
              }
        });
    }
        }
           
       </script>
    -->