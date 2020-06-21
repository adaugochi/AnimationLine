@extends('layouts.auth')
@section('title', 'Billing')
@section('route', '/save-billing-details')
@section('auth-header', 'Billing Information')
@section('content')
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="package" value="{{ $package }}">
    <input type="hidden" name="service" value="{{ $service }}">
    <input type="hidden" name="currency" value="USD" id="currency">
    <div class="form-group">
        <label class="card-form__label">City<span class="text-danger">*</span></label>
        <input type="text" name="city" class="form-control card-form__input" id="city">
    </div>
    <div class="form-group">
        <label class="card-form__label">State<span class="text-danger">*</span></label>
        <input type="text" name="state" class="card-form__input form-control" id="state">
    </div>
    <div class="form-group">
        <label class="card-form__label">Country<span class="text-danger">*</span></label>
        <select name="country" class="card-form__input form-control custom-select" id="country" autocomplete="true">
            <option value="">Please choose a country</option>
            @foreach(\App\Country::getAllCountries() as $country)
                <option value="{{ $country->code }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="fs-12 form-group">
        This is to enable us generate a token that we will use in tracking your order.
        Please click on the button below to proceed to payment
    </div>
    <button type="submit" class="btn btn-lg text-uppercase btn-brand-primary btn-block py-12">
        Proceed to payment
    </button>
@endsection