@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="d-flex align-items-center justify-content-center ht-100v">

            <div class="wd-300 wd-xs-400 pd-25 bg-white rounded shadow-base">
                <div class="text-center fs-28 font-weight-bold text-gray">
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
                    <input type="text" class="card-form__input rounded form-control @error('city') is-invalid @enderror"
                           name="city" placeholder="Enter City">
                    @include('elements.error', ['fieldName' => 'city'])
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('postal_code') is-invalid @enderror"
                           name="postal_code" placeholder="Enter Postal Code">
                    @include('elements.error', ['fieldName' => 'postal_code'])
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('state') is-invalid @enderror"
                           name="state" placeholder="Enter State">
                    @include('elements.error', ['fieldName' => 'state'])
                </div>
                <div class="form-group">
                    <input type="text" class="card-form__input rounded form-control @error('country') is-invalid @enderror"
                           name="country" placeholder="Enter Country">
                    @include('elements.error', ['fieldName' => 'country'])
                </div>
                <button type="submit" class="btn btn-brand-primary btn-block text-uppercase fs-10">Sign Up</button>

                <div class="mt-3 text-center fs-12">
                    Already a member? <a href="{{ url('login') }}" class="text-brand-primary"> Sign In</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @include('elements.flash-messages')
@endsection