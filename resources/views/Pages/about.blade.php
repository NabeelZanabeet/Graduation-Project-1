@extends('layouts.layout')

@section('content')
       <h2> This is the About page  </h2>
       <h3>{{$title}}</h3>
       @if (count($services)>0)
         <ul>
            @foreach($services as $ser)
                <li> {{$ser}} </li>
            @endforeach
         </ul>
       @endif
@endsection
