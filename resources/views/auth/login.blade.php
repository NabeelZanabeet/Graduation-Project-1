@extends('layouts.layout')

@section('content')
<div class="container">
    <p></p>
    <div align="center">
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card " style="width: 40rem;">
                    <p></p>
                <div class="card-title"align="center">Login</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div align="center" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-card">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email"  type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div align="center" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password"align="center"  class="col-md-4 control-card">Password</label>

                            <div class="col-md-6">
                                <input id="password"align="center" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div align="center" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div align="center" class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
    </div>
</div>
@endsection
