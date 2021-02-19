@extends('layouts.auth')
@section('title', 'Forget Password')
@section('route', $pwdResetEmail)
@section('auth-header', 'Forget Password')
@section('content')
    <div class="form-group">
        <input type="text" class="card-form__input rounded form-control form-control-lg @error('email') is-invalid @enderror"
               name="email" placeholder="Email Address">
        @include('elements.error', ['fieldName' => 'email'])
    </div>
    <button type="submit" class="btn text-uppercase btn-brand-primary py-12 btn-block">
        Send Password Reset Link
    </button>
    <div class="mt-5 text-center">
        <a href="{{ $loginRoute }}" class="text-brand-primary fs-12">Back to Login</a>
    </div>
@endsection
