@extends('layouts.auth')
@section('title', 'Login')
@section('route', $loginRoute)
@section('auth-header', 'Login')
@section('content')
    <div class="form-group">
        <input class="card-form__input rounded form-control @error('email') is-invalid @enderror"
               type="text" name="email" placeholder="Email Address" autocomplete="true">
        @include('elements.error', ['fieldName' => 'email'])
    </div>
    <div class="form-group">
        <input class="card-form__input rounded form-control @error('password') is-invalid @enderror"
               type="password" name="password" placeholder="Password" autocomplete="true">
        @include('elements.error', ['fieldName' => 'password'])
        <a class="text-brand-primary fs-12 d-block mt-3" href="{{ $forgotPwdRoute }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div>
    <button type="submit" class="btn btn-lg text-uppercase btn-brand-primary btn-block py-12">Sign In</button>
    <div class="mt-5 text-center fs-12">
        Not yet a member? <a href="{{ url('register') }}" class="text-brand-primary"> Sign Up</a>
    </div>
@endsection