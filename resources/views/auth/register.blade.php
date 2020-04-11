@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <form method="POST" action="{{ route('register') }}" class="validateForm">
        @csrf
        <div class="d-flex align-items-center justify-content-center ht-100v">

            <div class="wd-300 wd-xs-400 bg-white auth_wrapper">
                <div class="fs-28 mb-3 font-weight-lighter text-brand-primary">
                    Register
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('first_name') is-invalid @enderror"
                           name="first_name" placeholder="Enter First Name">
                    @include('elements.error', ['fieldName' => 'first_name'])
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('last_name') is-invalid @enderror"
                           name="last_name" placeholder="Enter Last Name">
                    @include('elements.error', ['fieldName' => 'last_name'])
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Enter Email">
                    @include('elements.error', ['fieldName' => 'email'])
                </div>
                <div class="form-group">
                    <input type="password" class="card-form__input rounded form-control @error('password') is-invalid @enderror"
                           name="password" placeholder="Enter Password" id="password">
                    @include('elements.error', ['fieldName' => 'password'])
                </div>
                <div class="form-group">
                    <input type="password" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
                           name="password_confirmation" placeholder="Re-enter Password">
                </div>
                <button type="submit" class="btn btn-lg btn-brand-primary btn-block text-uppercase fs-10">Sign Up</button>

                <div class="mt-3 text-center fs-12">
                    Already a member? <a href="{{ url('login') }}" class="text-brand-primary"> Sign In</a>
                </div>
            </div>
        </div>
    </form>
@endsection