@extends('layouts.main')

@section('content')
    <div>
        <div class="container">
            <div class="mx-auto mb-5">
                <div class="card">
                    {{--@if (session()->has('success'))--}}
                        <div class="empty-state">
                            <span class="material-icons empty-state__icon icon-success">check</span>
                            <h3 class="empty-state__description mt-2">Payment was Successful</h3>
                            <p>Please follow the step below to complete the process</p>
                        </div>
                        <form class="card-form__wrapper validateForm" method="post" action="{{ route('create-brief') }}">
                            <input type="hidden" name="billing_id" value="{{ $id }}">
                            @csrf
                            <div>
                                <h3>Complete Your Brief</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="card-form__label">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control card-form__input" readonly value="{{ $fullName }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="card-form__label">Email<span class="text-danger">*</span></label>
                                        <input type="text" class="card-form__input form-control" readonly value="{{ $email }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="card-form__label">App Full Name<span class="text-danger">*</span></label>
                                        <input type="text" name="app_full_name" class="card-form__input form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="card-form__label">Official Website</label>
                                        <input type="text" name="website" class="card-form__input form-control">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="card-form__label">Description<span class="text-danger">*</span></label>
                                        <textarea class="card-form__input form-control" rows="5" name="description"
                                                  placeholder="Please describe the full function of the App"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-brand-primary btn-block btn-lg">SUBMIT BRIEF</button>
                            </div>
                        </form>
                    {{--@elseif(session()->has('error'))--}}
                        {{--<div class="empty-state">--}}
                            {{--<span class="material-icons empty-state__icon icon-danger">close</span>--}}
                            {{--<p class="empty-state__description mt-2">Payment was Unsuccessful</p>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                </div>
            </div>
        </div>
    </div>
@endsection