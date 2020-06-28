@extends('layouts.auth')
@section('title', 'Register')
@section('route', route('register'))
@section('auth-header', 'Register')
@section('content')
    <div class="form-group">
        <input type="text" class="card-form__input rounded form-control @error('first_name') is-invalid @enderror"
               name="first_name" placeholder="First Name" autocomplete="true" value="{{ old('first_name') }}">
        @include('elements.error', ['fieldName' => 'first_name'])
    </div>
    <div class="form-group">
        <input type="text" class="card-form__input rounded form-control @error('last_name') is-invalid @enderror"
               name="last_name" placeholder="Last Name" autocomplete="true" value="{{ old('last_name') }}">
        @include('elements.error', ['fieldName' => 'last_name'])
    </div>
    <div class="form-group">
        <input type="text" class="card-form__input rounded form-control @error('email') is-invalid @enderror"
               name="email" placeholder="Email Address" autocomplete="true" value="{{ old('email') }}">
        @include('elements.error', ['fieldName' => 'email'])
    </div>
    <div class="form-group">
        <input type="password" class="card-form__input rounded form-control @error('password') is-invalid @enderror"
               name="password" placeholder="Password" id="password" value="{{ old('password') }}">
        @include('elements.error', ['fieldName' => 'password'])
    </div>
    <div class="form-group">
        <input type="password" class="card-form__input rounded form-control @error('password') is-invalid @enderror"
               name="password_confirmation" placeholder="Re-enter Password">
    </div>
    <div class="fs-12 form-group">
        By clicking the “Sign Up” button, you agree to AnimationLine's
        <span data-toggle="modal" data-target="#tcModal" class="cursor-pointer text-brand-primary">
            terms of service
        </span>.
        @include('modals.policy-terms-modal', [
            'modalId' => 'tcModal',
            'modalTitle' => 'Terms of Service',
            'modalSize' => 'modal-lg',
            'modalBody' => \App\Contants\Message::TERMS_AND_CONDITIONS
        ])
    </div>
    <button type="submit" class="btn btn-lg btn-brand-primary btn-block text-uppercase py-12">Sign Up</button>
    <div class="mt-3 text-center fs-12">
        Already a member? <a href="{{ url('login') }}" class="text-brand-primary">Sign In</a>
    </div>
@endsection