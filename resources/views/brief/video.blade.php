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
            <form class="card-form__wrapper validateForm" method="post" enctype="multipart/form-data"
                  action="{{ $isEdit ? route('edit-brief') : route('create-brief') }}">
                <input type="hidden" name="billing_id" value="{{ $id }}">
                @csrf
                <div class="row">
                    @include('elements.basic-brief')
                    <div class="form-group col-md-6 company-logo">
                        <label for="company-logo" class="card-form__label">
                                <span class="file-label">
                                    Company's Logo<span class="text-danger">*</span>
                                </span>
                        </label>
                        <div>
                            <span class="file-placeholder">Choose File</span>
                            <span class="file-selected">
                                {{ $isEdit ? $brief->company_logo : 'No File Chosen' }}
                            </span>
                        </div>
                        <input type="file" id="company-logo"
                               class="file-input form-control-file @error('company_logo') is-invalid @enderror"
                               name="company_logo" accept="[&quot;.png, .jpg, .jpeg &quot;]">
                        <label class="error" for="company-logo"></label>
                        @include('elements.error', ['fieldName' => 'company_logo'])
                    </div>

                    @if($package !== 'bronze')
                        @include('elements.gold-silver-package')
                    @endif
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="card-form__label">
                            Script for the video<span class="text-danger">*</span>
                        </label>
                        <textarea class="card-form__input form-control" rows="5" name="video_script"
                                  placeholder="Some text...">{{ $isEdit ? $brief->video_script : ''}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="card-form__label">
                            Addition Information<span class="text-danger">*</span>
                        </label>
                        <textarea class="card-form__input form-control" rows="5" name="other_info"
                                  placeholder="Any other information...">{{ $isEdit ? $brief->other_info : ''}}</textarea>
                    </div>
                </div>
                <button class="btn btn-brand-primary px-5 py-12 mt-2">
                    {{ $isEdit ? 'UPDATE BRIEF' : 'SUBMIT BRIEF' }}
                </button>
            </form>
        </div>
    </div>
@endsection