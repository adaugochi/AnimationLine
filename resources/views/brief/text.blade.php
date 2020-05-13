@extends('layouts.main')
@section('title', 'Brief')

@section('content')
    <div class="mx-auto mb-5">
        <div class="card">
            <h3>{{ $isEdit ? 'Edit' : 'Complete Your' }} Brief</h3>
            <div class="empty-state">
                <img src="{{ asset('img/brief.svg') }}" class="empty-state__icon">
                @if(!$isEdit)
                    <h3 class="empty-state__description mt-2">Payment was Successful</h3>
                    <p>Please follow the step below to complete the process</p>
                @else
                    <p>Please proceed to update your brief</p>
                @endif
            </div>

            <form class="card-form__wrapper validateForm" method="post"
                  action="{{ $isEdit ? route('edit-brief') : route('create-brief') }}">
                <input type="hidden" name="billing_id" value="{{ $id }}">
                @csrf
                <div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Full Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control card-form__input"
                                   readonly value="{{ auth()->user()->getFullName() }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Email Address<span class="text-danger">*</span>
                            </label>
                            <input type="text" class="card-form__input form-control"
                                   readonly value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Company's Name<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="company_name" class="card-form__input form-control"
                                   value="{{ $isEdit ? $brief->company_name : '' }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">Company's Website</label>
                            <i class="fa fa-link url-icon"></i>
                            <input type="text" name="company_website" class="card-form__input form-control"
                                   value="{{ $isEdit ? $brief->company_website : '' }}" placeholder="URL">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">
                                Speed of the video<span class="text-danger">*</span>
                            </label>
                            <select name="video_speed" class="card-form__input form-control"
                                    data-value="{{ $isEdit ? $brief->video_speed : '' }}" id="accent">
                                <option value="">What speed do you prefer?</option>
                                <option value="slow">Slow</option>
                                <option value="medium">Medium</option>
                                <option value="fast">Fast</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 company-logo">
                            <label for="logo">
                                <span class="file-label">
                                    Company's Logo<span class="text-danger">*</span>
                                </span>
                                <div>
                                    <span class="file-placeholder">Choose File</span>
                                    <span class="file-selected">
                                        {{ $isEdit ? $brief->company_logo : 'No File Chosen' }}
                                    </span>
                                </div>
                            </label>
                            <input type="file" id="logo" class="file-input form-control-file" name="company_logo"
                                   accept="[&quot;.png, .jpg, .jpeg &quot;]">

                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">Script for the video<span class="text-danger">*</span></label>
                            <textarea class="card-form__input form-control" rows="5" name="video_script"
                                      placeholder="Some text...">{{ $isEdit ? $brief->video_script : ''}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="card-form__label">Addition Information<span class="text-danger">*</span></label>
                            <textarea class="card-form__input form-control" rows="5" name="other_info"
                                      placeholder="Any other information...">{{ $isEdit ? $brief->other_info : ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-brand-primary px-5 py-12 mt-2">
                        {{ $isEdit ? 'UPDATE BRIEF' : 'SUBMIT BRIEF' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection