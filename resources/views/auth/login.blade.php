@extends('layouts.main')

@section('head')

    <link rel="stylesheet" href="/assets/css/signin.css">

@stop

@section('content')
<br>
        {!! Form::open(['url' => url('#'), 'class' => 'form-signin'] ) !!}
        @include('includes.status')

        <h2 class="form-signin-heading">Please sign in</h2>

        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail'
        ]) !!}

        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword'
        ]) !!}

        <div style="height:15px;"></div>
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    {!! Form::checkbox('remember', 1, null, ['id' => 'remember-me']) !!}
                    <label for="remember-me">Remember me</label>
                </fieldset>
            </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Sign in</button>
        <p><a href="{{ url('#') }}">Forgot password?</a></p>

        <p class="or-social">Or Use Social Login</p>

        @include('partials.socials')

        {!! Form::close() !!}

@stop   