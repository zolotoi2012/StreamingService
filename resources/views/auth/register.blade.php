@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
<title>Login</title>

<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

<img class="wave" src="{{ asset('images/wave.png') }}">
<div class="container">
    <div class="img">
        <img src="{{ asset('images/bg.svg') }}">
    </div>
    <div class="login-content">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img src="{{ asset('images/avatar.svg') }}">
            <h2 class="title">Welcome</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-div one">
                <div class="i">
                    <i class="fa fa-user"></i>
                </div>
                <div class="div">
                    <h5>Name</h5>
                    <input name="name" type="text" class="input @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="text" autofocus>
                </div>
            </div>
            <div class="input-div one">
                <div class="i">
                    <i class="fa fa-user"></i>
                </div>
                <div class="div">
                    <h5>Email</h5>
                    <input name="email" type="email" class="input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input name="password" type="password" class="input @error('password') is-invalid @enderror" required autocomplete="current-password">
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fa fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Confirm Password</h5>
                    <input id="password-confirm" type="password" class="input @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <input type="submit" class="btn" value="Register">
            <h5> OR </h5>
            <a class="btn" style="text-decoration: none; padding-top: 12px;" href="/login"> Sign In</a>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
