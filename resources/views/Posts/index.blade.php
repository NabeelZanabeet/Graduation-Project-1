@extends('layouts.layout')

@section('content')
     <h2 algin="center">Posts</h2>
     <p></p>
     @if (count($postContent) >0)
          @foreach ($postContent as $con)
                <div class="card">
                    <h3><a href="/post/{{$con->id}}">{{$con->title}}</a></h3>
                    <small>Written on {{$con->created_at}}</small>
                </div>
          @endforeach
          {{$postContent->links()}}
          <p><a class="btn btn-success btn-lg" href="/post/create" role="button">Creat Post</a></p>
     @else
            <h3>No posts !!</h3>
     @endif
@endsection