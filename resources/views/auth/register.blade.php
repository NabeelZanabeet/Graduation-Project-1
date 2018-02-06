@extends('layouts.main')

@section('head')
  <link rel="stylesheet" href="{{asset('css/register.css')}}">
@stop

@section('content')

        {!! Form::open(['url' => url('/register'), 'class' => 'form-signin'] ) !!}

        @include('includes.errors')

        <h2 class="form-signin-heading">Please register</h2>

        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Email address',
            'required',
            'id'                            => 'inputEmail'
        ]) !!}

        <label for="inputFirstName" class="sr-only">First name</label>
        {!! Form::text('first_name', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'First name',
            'required',
            'id'                            => 'inputFirstName'
        ]) !!}

        <label for="inputLastName" class="sr-only">Last name</label>
        {!! Form::text('last_name', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Last name',
            'required',
            'id'                            => 'inputLastName'
        ]) !!}


        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password',
            'required',
            'id'                            => 'inputPassword'
        ]) !!}


        <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
        {!! Form::password('password_confirmation', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Password confirmation',
            'required',
            'id'                            => 'inputPasswordConfirm'
        ]) !!}

        <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">Register</button>

        <p class="or-social">Or Use Social Login</p>

        @include('partials.socials')

        {!! Form::close() !!}


@stop