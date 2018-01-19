@extends('layouts.layout')

@section('style') 
    <link href="{{ asset('css/indexStyle.css') }}" rel="stylesheet">
   
@endsection

@section('content') 
<br>
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-7">
        <br><br><br><br>
        <div class="container">
           <img src="Images/Title3.png"  width="85%" hight="85%" align="center">
           <h4 align="center">The Intelligent Slide Creater</h4>
           <h5 align="center"> To mastering the art of <br>busniess, professional & public speaking</h5> 
        </div> 
    </div>
  </div>

    <div class="row-2">
        <br><br><br><br><br><br><br><br>
       <div class="col-12">
          <div align="center">
            <br><br><br><br>
           <img src="Images/GetStarted.png" width="20%" hight="20%">
           <div>  
       </div>
    </div>

    <div class="row-3">
        <br><br><br><br><br><br><br>
       <div class="col-12">
          <div align="center">
            <img src="Images/LogoIconInv.png"width="15%" hight="15%" > <br><br>
              <p class="dis">
               <b>Present like A Pro</b> <br>
               Your altimate solution to present and impress your audions, <br>
               Control all your slides by a "Custamize Voice" commands that you provide <br>
              </p>
              <br>
           <div>  
       </div>
    </div>

    
</div>
@endsection

@section('footer')

<footer class="bd-footer text-muted">
  <div class="container-fluid p-3 p-md-5">
    <ul class="bd-footer-links">
      <li><a href="https://github.com/twbs/bootstrap">GitHub</a></li>
      <li><a href="https://twitter.com/getbootstrap">Twitter</a></li>
      <li><a href="/docs/4.0/examples/">Examples</a></li>
      <li><a href="/docs/4.0/about/overview/">About</a></li>
    </ul>
   </div>
</footer>

@endsection

