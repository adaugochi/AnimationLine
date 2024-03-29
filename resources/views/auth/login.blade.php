@extends('layouts.auth')
@section('title', 'Login')
@section('route', $loginRoute)
@section('auth-header', 'Login')
@section('content')
    <div class="form-group">
        <input class="card-form__input rounded form-control form-control-lg @error('email') is-invalid @enderror"
               type="text" name="email" placeholder="Email Address" autocomplete="true"
               value="{{ $loginRoute == route('login') ? old('email') : 'admin@example.com' }}">
        @include('elements.error', ['fieldName' => 'email'])
    </div>
    <div class="form-group">
        <input class="card-form__input rounded form-control form-control-lg @error('password') is-invalid @enderror"
               type="password" name="password" placeholder="Password" autocomplete="true"
               value="{{ $loginRoute == route('login') ? '' : '12345678' }}">
        @include('elements.error', ['fieldName' => 'password'])
        <a class="text-brand-primary fs-12 d-block mt-3" href="{{ $forgotPwdRoute }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div>
    <button type="submit" class="btn btn-lg text-uppercase btn-brand-primary btn-block py-12">Sign In</button>
    @if($loginRoute == route('login'))
        <div class="mt-5 text-center fs-12">
            Not yet a member? <a href="{{ url('register') }}" class="text-brand-primary"> Sign Up</a>
        </div>
    @endif
@endsection
