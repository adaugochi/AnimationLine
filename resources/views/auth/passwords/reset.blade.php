@extends('layouts.auth')
@section('title', 'Reset Password')
@section('route', $pwdUpdate)
@section('auth-header', 'Reset Password')
@section('content')
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <input type="text" class="card-form__input rounded form-control form-control-lg @error('email') is-invalid @enderror"
               name="email" placeholder="Email Address" value="{{ $email }}" readonly>
        @include('elements.error', ['fieldName' => 'email'])
    </div>
    <div class="form-group">
        <input type="password" class="card-form__input rounded form-control form-control-lg @error('password') is-invalid @enderror"
               name="password" placeholder="Enter New Password" id="password">
        @include('elements.error', ['fieldName' => 'password'])
    </div>
    <div class="form-group">
        <input type="password" class="card-form__input rounded form-control form-control-lg"
               name="password_confirmation" placeholder="Re-enter Password">
    </div>
    <button type="submit" class="btn text-uppercase btn-brand-primary btn-block py-12">
        Reset Password
    </button>

    <div class="mt-5 text-center">
        <a href="{{ $loginRoute }}" class="text-brand-primary fs-12">Back to Login</a>
    </div>
@endsection
