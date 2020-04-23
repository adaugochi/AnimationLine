@extends('layouts.app')
@section('title', 'Pricing')
@section('header-text', \App\Contants\Message::PRICING_HEADER_TEXT)
@section('body-text', \App\Contants\Message::PRICING_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/pricing.svg') }}">
@endsection()
@section('content')
    <section id="pricing" class="py-100 text-center">
        <div class="container">
            <h1 class="page-title">Pricing</h1>
            <p>We offer 3 straight forward packages to match everyones needs.</p>
            <div class="row mt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h1>Basic</h1>
                        <h1 class="font-weight-bold text-brand-primary fs-60">$79</h1>
                        <p>One Page App UI</p>
                        <p>Source PSD Layered file</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="/checkout-basic">Check out</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-lg card-scale">
                        <h1>Standard</h1>
                        <h1 class="font-weight-bold text-white fs-60">$199</h1>
                        <p>Three Page App UI</p>
                        <p>Source PSD Layered file</p>
                        <p>Commercial use</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-white-outline btn-lg mt-2" href="/checkout-standard">Check out</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h1>Pro</h1>
                        <h1 class="font-weight-bold text-brand-primary fs-60">$299</h1>
                        <p>Six Page App UI </p>
                        <p>Source PSD Layered file</p>
                        <p>Commercial use</p>
                        <p>Responsive Design</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-primary btn-lg mt-2" href="/checkout-pro">Check out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()