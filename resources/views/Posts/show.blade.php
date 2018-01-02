@extends('layouts.layout')

@section('content')
     <h2 algin="center">{{$post->title}}</h2>
     
     <div>
            {!!$post->body!!}
    </div>
    
    <hr>
     <small>written at {{$post->created_at}}</small>

     
@endsection