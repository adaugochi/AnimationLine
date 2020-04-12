@extends('layouts.app')
@section('content')
    <section id="whyUs" class="py-100">
        <div class="container text-center">
            <h1 class="page-title">Why Choose Animation Line?</h1>
            <p>
                Animation Line has been the #1 Leading World Design Animation Video. We are sure a trial will convince
                you, that's why we go above and beyond to create unique & professional App Mockup at an affordable price.
            </p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-scale">
                            <img src="{{ asset('img/professional.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Professional</h3>
                            <p class="fs-16">
                                Our team of experienced designers are on hand to awesome video animation for your business.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card card-scale">
                            <img src="{{ asset('img/affordable.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Affordable</h3>
                            <p class="fs-16">
                                We pride ourselves on the most cost-effective video animation & understand the need to
                                keep costs low but quality high.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card card-scale">
                            <img src="{{ asset('img/perfection.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-4">Perfection</h3>
                            <p class="fs-16">
                                We're not happy until you are happy, that's why we offer a 100% money back guarantee
                                plus unlimited revisions are available
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="aboutUs" class="bg-white py-100">
        <div class="container text-center">
            <h1 class="page-title">About Us</h1>
            <p>
                Any Style & Any Genre... Professionally Designed To Appeal To Your Target Audience. Here are some of
                our work at Animation Line
            </p>
            <a href="/login" class="btn-brand-primary my-3 py-3 btn px-5">Get Started</a>
            
            <div class="row">

            </div>
        </div>
    </section>
    <section id="works" class="text-center text-white">
        <div class="container">
            <h1 class="page-title">How It Works</h1>
            <p>Our Simple Online Process Couldn't Be Easier...</p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-3 steps-to">
                        <img src="{{ asset('img/shopping-cart.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">01.</h1>
                        <h4 class="mt-3 fs-18">Place Your Order</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/payment.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">02.</h1>
                        <h4 class="mt-3 fs-18">Proceed To Payment</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/copywriting.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">03.</h1>
                        <h4 class="mt-3 fs-18">Give Us Your Brief</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <img src="{{ asset('img/plane.svg') }}" height="50">
                        <h1 class="font-weight-bold mt-3 text-brand-primary">04.</h1>
                        <h4 class="mt-3 fs-18">Design Delivered</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="customer" class="py-100 bg-white text-center">
        <div class="container">
            <h1 class="page-title">What Our Customers Say</h1>
            <p>
                We have produced over 2000 App UI in the last 3 years & we have ensured that every single one of our
                customers are 100% happy with our design, that is why we constantly receive glowing feedback like
                some of the examples below.
            </p>

            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer2.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Michael Smith</h4>
                        <p class="page-title">Entrepreneur</p>
                        <div>
                            <p>
                                "This was not an easy brief and to be honest I expected it to  take longer.
                                When I showed it to others, was well above expectations."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer1.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Monika Kowalska</h4>
                        <p class="page-title">App Designer</p>
                        <div>
                            <p>
                                "Brilliant design. Followed my brief exactly and produced a fantastic App Mock-up.
                                Will definitely use again."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height customer">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer3.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Andy Bogacky</h4>
                        <p class="page-title">App Designer</p>
                        <div>
                            <p>
                                "I cannot recommend Active Mockup enough. I'm not very creative so i let them take
                                charge & they over delivered "
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing" class="py-100 text-center">
        <div class="container">
            <h1 class="page-title">Our Services</h1>
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
    <section class="py-100 bg-white text-center">
        <div class="container">
            <h1>Happiness Guarantee</h1>
            <h5 class="page-title">Our 100% Money Back Guarantee</h5>
            <p>
                We're not happy until you are happy, that's why we offer a 100% money back guarantee plus unlimited
                revisions. If you are not happy with your design or you require any changes just let us know and
                we will be more than happy to edit the design or simply give you a full refund.
            </p>
            <h5 class="font-weight-bold">Ogundairo Abayomi</h5>
            <p>CEO,  Animation Line</p>

            @include('elements.feature')
        </div>
    </section>
    <section class="footer">
        <div class="copyright-footer container d-md-flex justify-content-between">
            <p>
                <span>© <?= date('Y'); ?> Animation Line. All rights reserved. </span>
                <a class="text-brand-primary" href="#">www.animationline.com</a>
            </p>

            <div>
                <span data-toggle="modal" data-target="#policyModal">
                    <span>Privacy policy</span>
                    @include('elements.modal', ['modalId' => 'policyModal', 'modalTitle' => 'Privacy Policy'])
                </span>
                    <span data-toggle="modal" data-target="#tcModal" class="ml-3">
                    <span>Terms & Conditions</span>
                    @include('elements.modal', ['modalId' => 'tcModal', 'modalTitle' => 'Terms & Conditions'])
                </span>
            </div>
        </div>
    </section>
@endsection()
