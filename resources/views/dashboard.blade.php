@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <p></p>
            <div class="card" align="center">
                <div class="card-heading">Dashboard</div>

                <div class="card-body" align="center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <a href="/post/create" class="btn btn-primary">Creat Post</a> 
                      <p></p>
                    <!--Posts passed by postController-->
                    @if(count($posts)>0)
                      <h3 align="center">Your Posts </h3>
                      <table class="table table-stripped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                 <tr>
                                     <th>{{$post->title}}</th>
                                     <th><a href="/post/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                                     <th>{!! Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'Post','class'=>'float-right']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                         {!! Form::close() !!}
                                      </th>
                                 </tr>
                            @endforeach
                      </table>
                    @else
                      <h3>You have no posts</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
