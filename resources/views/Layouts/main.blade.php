<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PLAP</title>

     <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
     {!! Html::favicon('favicon') !!}

    <meta name="description" content="GP1-Presentation Creater for Blind People">
    <meta name="author" content="Nabeel Zanabeet">
    
   <!--
    <meta property="og:url" content="http://demo1.codingo.me/">
    <meta property="og:title" content="Live Demo of Laravel 5.3 app with Multi-authentication and Social logins">
    <meta property="og:description" content="Laravel 5.3 bootstrap app with Multi Auth, Social and Email Authentication. Google re-Captcha, Facebook, Twitter, G+ and much more...">
    <meta property="og:image" content="https://tuts.codingo.me/wp-content/uploads/2016/10/social-og.png">
    <meta property="og:site_name" content="Codingo Tuts">
    <meta property="og:image:type" content="image/png">]
   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css">
    <link rel="stylesheet" href="{{asset('css/custum.css')}}">
    
    @yield('style')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('head')

</head>

<body>

<!--Navigation-->
<header>

@include('partials.above-navbar-alert')

<!--Navbar-->
    <nav class="navbar navbar-dark scrolling-navbar mdb-gradient">
        <!--Nav Logo-->
       <a href="#" class="pull-left"><img src="Images/LogoIconInv.png" width="12%" hight="12%"></a> 
       <!--Brand-->
      <!-- <a class="navbar-brand"> PLAP</a> -->
        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i></button>
        
        
            
        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">

                <!--Links-->
                <ul class="nav navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fa fa-home"></i> Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/about" target="_blank"><i class="fa fa-question-circle-o"></i>  About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/test" target="_blank"><i class="fa fa-hourglass-half"></i>  Test</a>
                    </li>
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}"><i class="fa fa-registered"></i> Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="fa fa-user"></i> {{ Auth::user()->first_name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                    @endif
                </ul>

                <!--Navbar icons-->
                <ul class="nav navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/codingo.me/" class="nav-link"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/codingo_me" class="nav-link"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://plus.google.com/u/2/b/109783202683475265470/collection/wwmLx" class="nav-link"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/codingo-me" class="nav-link"><i class="fa fa-github"></i></a>
                    </li>
                </ul>

            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->


</header>
<!--/Navigation-->

<main role="main" class="container">
        @include('inc.messages')

         <div class="starter-template">
            <div id="app">
                    <div class="container">
                       @yield('content')
                    </div>
            </div>
      </div>
</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/js/mdb.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

@yield('footer')

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-60551246-3', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>