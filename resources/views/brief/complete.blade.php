@extends('layouts.main')
@section('title', 'Brief Completed')

@section('content')
    <div class="mx-auto mb-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 py-5 py-md-0 pt-lg-5 text-md-left text-center">
                <div class="header-text">
                    <h1 class="font-weight-bold">
                        Hurray!!! You have successfully completed your order
                    </h1>
                    <p class="text-gray fs-18 ">
                        Your order is currently in progress as our admin as successfully receive
                        your brief. Our support team will get across to you soon.
                    </p>
                    <a href="/home" class="btn-brand-white mt-3 py-3 btn px-5">
                        Go to dashboard
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <img src="{{ asset('img/completed.svg') }}" class="w-100">
            </div>
        </div>
    </div>
@endsection