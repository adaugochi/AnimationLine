@extends('layouts.app')
@section('title', 'Contact')
@section('header-text', \App\Contants\Message::CONTACT_HEADER_TEXT)
@section('body-text', \App\Contants\Message::CONTACT_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/contact.svg') }}">
@endsection()
@section('content')
    <section class="py-100">
        <div class="container">
            <h1 class="page-title text-center">Contact Us</h1>
            <p class="text-center fs-18">You want to contact us for some business proposition?</p>
            <div class="mx-auto">
                <div class="card">
                    <form class="card-form__wrapper validateForm" method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="card-form__label">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control card-form__input" autocomplete="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="card-form__label">Last Name<span class="text-danger">*</span></label>
                                <input type="tel" name="last_name" class="card-form__input form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="card-form__label">Contact Mail<span class="text-danger">*</span></label>
                                <input type="text" name="email" class="card-form__input form-control" autocomplete="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="card-form__label">Company Name</label>
                                <input type="text" name="company_name" class="card-form__input form-control" autocomplete="true">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="card-form__label">
                                    What would you like us to do for you?<span class="text-danger">*</span>
                                </label>
                                <textarea class="card-form__input form-control" rows="5" name="description"
                                          placeholder="Some messages..."></textarea>
                            </div>
                        </div>
                        <button class="btn btn-brand-primary py-3 px-5 text-uppercase btn-submit">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection()