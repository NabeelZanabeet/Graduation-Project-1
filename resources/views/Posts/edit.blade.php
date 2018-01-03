@extends('layouts.layout')

@section('content')
     <p></p>
        <h2 algin="center">Edit Posts</h2>
       
        {!! Form::open(['action'=>['PostController@update',$post->id],'method'=>'Post']) !!}
        <div class="form-grup">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
         <p></p>
        <div class="form-grup">
                {{Form::label('body','Body')}}
                {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
            <p></p>
           {{Form::hidden('_method','PUT')}}
           {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
           {!! Form::close() !!}
@endsection