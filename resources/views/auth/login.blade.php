@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-center ht-100v">

            <div class="wd-300 wd-xs-350 pd-25 bg-white rounded shadow-base">
                <div class="text-center fs-28 font-weight-bold text-gray">
                    Login
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="Enter Email">
                    @include('elements.error', ['fieldName' => 'email'])
                </div>

                <div class="form-group">
                    <input type="password" class="card-form__input rounded form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Enter Password">
                    @include('elements.error', ['fieldName' => 'password'])
                    @if (Route::has('password.request'))
                        <a class="text-brand-primary fs-12 d-block mt-2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <button type="submit" class="btn text-uppercase fs-10 btn-brand-primary btn-block">Sign In</button>

                <div class="mt-5 text-center fs-12">
                    Not yet a member? <a href="{{ url('register') }}" class="text-brand-primary"> Sign Up</a>
                </div>
            </div>
        </div>
    </form>
@endsection

{{--@section('scripts')--}}
    {{--@include('elements.flash-messages')--}}
{{--@endsection--}}

