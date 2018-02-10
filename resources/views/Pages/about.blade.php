@extends('Layouts.main')

@section('footer')
       <h2> This is the About page  </h2>
       
       @if (count($services)>0)
         <ul class="list-group">
            @foreach($services as $ser)
                <li class= "list-group-item"> {{$ser}} </li>
            @endforeach
         </ul>
       @endif
@endsection
