@extends('layouts.auth')

@section('title', 'Forget Password')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="d-flex align-items-center justify-content-center ht-100v">

            <div class="wd-300 wd-xs-350 pd-25 bg-white rounded shadow-base">
                <div class="text-center fs-28 font-weight-bold text-gray">
                    Forget Password
                </div>

                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Enter Email">
                    @include('elements.error', ['fieldName' => 'email'])
                </div>

                <button type="submit" class="btn text-uppercase fs-10 btn-brand-primary btn-block">
                    Send Password Reset Link
                </button>

                <div class="mt-5 text-center">
                    <a href="{{ url('login') }}" class="text-brand-primary fs-12"> Back to Login</a>
                </div>
            </div>
        </div>
    </form>
@endsection
