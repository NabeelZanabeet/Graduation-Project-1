@extends('layouts.layout')

@section('content')
     <h2 algin="center">
         {{$post->title}}
     </h2>
     
     <div>
        {!!$post->body!!}
     </div>
    
     <hr>
        <small>written at {{$post->created_at}}</small>
     <hr>
     <img src="/storage/cover_images/{{$post->cover_image}}">
                        
     <!--To prevent guests to access edit and delete of a post-->
    @guest

    @else
     <!--To prevent users to access edit and delete each other posts-->
        @if(Auth::user()->id==$post->user_id)
           <a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit Post </a>
           <!--Delete btn is a form to access the destroy func in postsContrller-->
           {!! Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'Post','class'=>'float-right']) !!}
            <!--OverRide POST method to DELETE in laravel Form-->
           {{Form::hidden('_method','DELETE')}}
            <!--Form specific Btn-->
           {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
           {!! Form::close() !!}
        @endif
    @endguest
@endsection