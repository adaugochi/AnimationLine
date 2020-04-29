@extends('layouts.main')

@section('title', 'Brief')

@section('content')
    <div class="mx-auto mb-5">
        <div class="card">
            @if(!$isEdit)
                <div class="empty-state">
                    <span class="material-icons empty-state__icon icon-success">check</span>
                    <h3 class="empty-state__description mt-2">Payment was Successful</h3>
                    <p>Please follow the step below to complete the process</p>
                </div>
            @endif
            <form class="card-form__wrapper validateForm" method="post" action="{{ $isEdit ? route('edit-brief') : route('create-brief') }}">
                <input type="hidden" name="billing_id" value="{{ $id }}">
                @csrf
                <div>
                    <h3>{{ $isEdit ? 'Edit' : 'Complete Your' }} Brief</h3>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Full Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control card-form__input" readonly value="{{ $fullName }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Email Address<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="card-form__input form-control" readonly value="{{ $email }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Name of animation video<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="app_full_name" class="card-form__input form-control"
                                   value="{{ $isEdit ? $brief->app_full_name : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">Official Website</label>
                            <input type="text" name="website" class="card-form__input form-control"
                                   value="{{ $isEdit ? $brief->website : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Which country accent will you prefer?<span class="text-danger">*</span>
                            </label>
                            <select name="country_accent" class="card-form__input form-control"
                                    data-value="{{ $isEdit ? $brief->country_accent : '' }}" id="accent">
                                <option value="">Please choose a country</option>
                                @foreach(\App\Country::getAllCountries() as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Which voice artist will you prefer?<span class="text-danger">*</span>
                            </label>
                            <select name="voiceover_artist" class="card-form__input form-control"
                                    data-value="{{ $isEdit ? $brief->voiceover_artist : '' }}" id="artist">
                                <option value="">Please choose a voice artist</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="card-form__label">Description<span class="text-danger">*</span></label>
                            <textarea class="card-form__input form-control" rows="5" name="description"
                                      placeholder="Please describe what the video is about">{{ $isEdit ? $brief->description : ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-brand-primary px-5 py-12">
                        {{ $isEdit ? 'UPDATE BRIEF' : 'SUBMIT BRIEF' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection