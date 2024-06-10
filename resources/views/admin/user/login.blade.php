@extends('layouts.app')
@section('title','Login TH21')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-box col-md-12">
                    <form id="login-form" class="form" action="{{ route('auth.Checklogin') }}" method="POST">
                        @csrf
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group input-group mt-4">
                            <input name="email" id="email_address" class="form-control" placeholder="Email address" type="email" required autofocus value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group input-group mt-5">
                            <input id="password" name="password" class="form-control" placeholder="Password" type="password" required autofocus value="{{ old('password') }}">
                            <div class="input-group-append">
                                <button id="togglePassword" class="btn btn-outline-secondary" type="button">
                                    <i id="toggleIcon" class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info">
                                <span>Remember me</span> <span><input id="remember-me" name="remember_me" type="checkbox"></span>
                            </label>
                            <br>
                            <div style="color: red;">
                                @if ($errors->any())          
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}</li>
                                    @endforeach
                                @endif
                            </div>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="{{ route('register') }}" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #login .container #login-row #login-column .login-box {
        margin-top: 0px;
        margin-bottom: 200px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-image: linear-gradient(to bottom, #aec1c3, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
    }

    #login .container #login-row #login-column .login-box #login-form {
        padding: 20px;
    }

    #login .container #login-row #login-column .login-box #login-form #register-link {
        margin-top: -85px;
    }
</style>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
    });
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>
@endsection