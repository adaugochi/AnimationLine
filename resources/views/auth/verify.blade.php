@extends('layouts.auth')
@section('title', 'Email Verification')
@section('route', route('verification.resend'))
@section('auth-header', 'Verify Your Account')
@section('content')
    <div>
        <input type="hidden" name="id" value="{{ $userId ?? '' }}">
        <p class="fs-18">
            Before proceeding to login, please check your email. An email verification
            link has been sent to your email.
        </p>
        <p class="fs-18">If you did not receive the email</p>
        <button type="submit" class="btn btn-lg text-uppercase btn-brand-primary btn-block py-12">
            click here to request another
        </button>
    </div>
@endsection
