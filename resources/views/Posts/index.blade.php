@extends('layouts.layout')

@section('content')
     <h2 algin="center">Posts</h2>
     <p></p>
     @if (count($posts) >0)
          @foreach ($posts as $post)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <img style ="width:100%"src="/storage/cover_images/{{$post->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                           <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                           <!--Access post user By implementing Model Relation in post and user models-->
                           <small>Written on {{$post->created_at}} by{{$post->user->name}}</small>
                        </div>
                    </div>
                   
                </div>
          @endforeach
          {{$posts->links()}}
          <p><a class="btn btn-success btn-lg" href="/post/create" role="button">Creat Post</a></p>
     @else
            <h3>No posts !!</h3>
     @endif
@endsection