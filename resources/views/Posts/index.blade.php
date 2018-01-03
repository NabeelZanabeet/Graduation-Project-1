@extends('layouts.layout')

@section('content')
     <h2 algin="center">Posts</h2>
     <p></p>
     @if (count($posts) >0)
          @foreach ($posts as $post)
                <div class="card">
                    <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                    <!--Access post user By implementing Model Relation in post and user models-->
                    <small>Written on {{$post->created_at}} by{{$post->user->name}}</small>
                </div>
          @endforeach
          {{$posts->links()}}
          <p><a class="btn btn-success btn-lg" href="/post/create" role="button">Creat Post</a></p>
     @else
            <h3>No posts !!</h3>
     @endif
@endsection