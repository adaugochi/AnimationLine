@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="validateForm">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="d-flex align-items-center justify-content-center ht-100v">
            <div class="wd-300 wd-xs-350 bg-white auth_wrapper">
                @include('elements.flash-messages')
                <div class="fs-28 mb-3 font-weight-lighter text-brand-primary">Reset Password</div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Enter Email" value="{{ $email }}" readonly>
                    @include('elements.error', ['fieldName' => 'email'])
                </div>
                <div class="form-group">
                    <input type="password" class="card-form__input rounded form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Enter New Password" id="password">
                    @include('elements.error', ['fieldName' => 'password'])
                </div>
                <div class="form-group">
                    <input type="password" class="card-form__input rounded form-control"
                           name="password_confirmation" placeholder="Re-enter Password">
                </div>

                <button type="submit" class="btn text-uppercase py-3 btn-brand-primary btn-block">
                    Reset Password
                </button>

                <div class="mt-5 text-center">
                    <a href="{{ url('login') }}" class="text-brand-primary fs-12"> Back to Login</a>
                </div>
            </div>
        </div>
    </form>
@endsection
