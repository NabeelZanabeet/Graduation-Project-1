<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
        
            <title>PLAP</title>
        
            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
     @include('inc.navbar')
    <main role="main" class="container">
            @include('inc.messages')
      <div class="starter-template">
            <div id="app">
                    <div class="container">
                       @yield('content')
                    </div>
                </div>
      </div>
      
     <!--npm run dev or npm run watch when add another script-->
      <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    </body>
</html>
