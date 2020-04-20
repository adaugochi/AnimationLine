@extends('layouts.auth')

@section('title', 'Forget Password')

@section('content')

    <form method="POST" action="{{ route('password.email') }}" class="validateForm">
        @csrf
        <div class="d-flex align-items-center justify-content-center ht-100v">
            <div class="wd-300 wd-xs-350 bg-white auth_wrapper">
                @include('elements.flash-messages')
                <div class="fs-28 mb-3 font-weight-lighter text-brand-primary">Forget Password</div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Enter Email">
                    @include('elements.error', ['fieldName' => 'email'])
                </div>

                <button type="submit" class="btn text-uppercase py-3 btn-brand-primary btn-block">
                    Send Password Reset Link
                </button>

                <div class="mt-5 text-center">
                    <a href="{{ url('login') }}" class="text-brand-primary fs-12"> Back to Login</a>
                </div>
            </div>
        </div>
    </form>
@endsection
