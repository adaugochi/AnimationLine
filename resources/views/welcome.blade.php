@extends('layouts.app')
@section('content')
    <section id="whyUs" class="py-100">
        <div class="container text-center">
            <h1 class="page-title">Why Choose Active Mockup?</h1>
            <p>
                Active Mockup has been the #1 Leading World App UI Mockup Designer. We are sure a trial will convince
                you, that's why we go above and beyond to create unique & professional App Mockup at an affordable price.
            </p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('img/professional.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-3">Professional</h3>
                            <p>
                                Our team of experienced designers are on hand to design you a professional bespoke design,
                                creative and innovative mockups for your business.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <img src="{{ asset('img/affordable.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-3">Affordable</h3>
                            <p>
                                We pride ourselves on the most cost-effective App UI design & understand the need to
                                keep costs low but quality high.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card">
                            <img src="{{ asset('img/perfection.svg') }}" class="card-image-width mx-auto d-block">
                            <h3 class="font-weight-bold my-3">Perfection</h3>
                            <p>
                                We're not happy until you are happy, that's why we offer a 100% money back guarantee
                                plus unlimited revisions are available
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ourDesigns" class="bg-white py-100">
        <div class="container text-center">
            <h1 class="page-title">
                Any Style & Any Genre...
                Professionally Designed To Appeal To Your Target Audience
            </h1>
            <a href="#">
                <div class="btn-brand-primary btn-pill mt-3 mb-5 btn">
                    <span class="d-inline-block text-decoration-none">Get Started</span>
                    <button class="d-none d-inline-block btn pt-1 btn-circle">
                        <i class="material-icons">flash_on</i>
                    </button>
                </div>
            </a>
            
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('img/mockup1.png') }}" class="mockup-width">
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <img src="{{ asset('img/mockup2.jpg') }}" class="mockup-width">
                </div>
                <div class="col-md-6 mt-4">
                    <img src="{{ asset('img/mockup3.png') }}" class="mockup-width">
                </div>
                <div class="col-md-6 mt-4">
                    <img src="{{ asset('img/mockup4.jpg') }}" class="mockup-width">
                </div>
            </div>
        </div>
    </section>
    <section id="works" class="text-center text-white">
        <div class="container">
            <h1 class="page-title">How It Works...</h1>
            <p>Our Simple Online Process Couldn't Be Easier...</p>

            <div class="mt-5">
                <div class="row">
                    <div class="col-md-3 steps-to">
                        <i class="material-icons icon-big my-3">add_shopping_cart</i>
                        <h1>1.</h1>
                        <h4 class="my-3 font-size-20">Place Your Order</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <i class="material-icons icon-big my-3">create</i>
                        <h1>2.</h1>
                        <h4 class="my-3 font-size-20">Give Us Your Brief</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <i class="material-icons icon-big my-3">email</i>
                        <h1>3.</h1>
                        <h4 class="my-3 font-size-20">First Draft Delivered</h4>
                    </div>
                    <div class="col-md-3 mt-4 mt-md-0 steps-to">
                        <i class="material-icons icon-big my-3">send</i>
                        <h1>4.</h1>
                        <h4 class="my-3 font-size-20">Final Design Delivered</h4>
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
                    <div class="card card-height">
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
                    <div class="card card-height">
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
                    <div class="card card-height">
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

                <div class="col-md-4 mb-4">
                    <div class="card card-height">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer4.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Tara Klane</h4>
                        <p class="page-title">Programmer</p>
                        <div>
                            <p>
                                "This is the second time I have used The Active Mockup, both times I was very impressed."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer1.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Andy Bogacky</h4>
                        <p class="page-title">Entrepreneur</p>
                        <div>
                            <p>
                                "Thank you for the wonderful App UI. I will certainly be using this service again "
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card card-height">
                        <div class="mb-3">
                            <img src="{{ asset('images/customer5.jpg') }}" class="card-image-width bd-radius">
                        </div>
                        <h4>Michael Paloa</h4>
                        <p class="page-title">App Designer</p>
                        <div>
                            <p>
                                "I have to give credit to the awesome team at Active Mockup for delivering an
                                eye catching App UI"
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
                        <h1 class="font-weight-bold text-brand-primary font-size-60">$79</h1>
                        <p>One Page App UI</p>
                        <p>Source PSD Layered file</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-primary btn-small mt-2" href="#">Check out</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-lg card-scale">
                        <h1 class="text-white">Standard</h1>
                        <h1 class="font-weight-bold text-white font-size-60">$199</h1>
                        <p>Three Page App UI</p>
                        <p>Source PSD Layered file</p>
                        <p>Commercial use</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-white btn-small mt-2" href="#">Checkout</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card card-scale">
                        <h1>Pro</h1>
                        <h1 class="font-weight-bold text-brand-primary font-size-60">$299</h1>
                        <p>Six Page App UI </p>
                        <p>Source PSD Layered file</p>
                        <p>Commercial use</p>
                        <p>Responsive Design</p>
                        <p>Unlimited Revisions</p>
                        <div>
                            <a class="btn btn-brand-primary btn-small mt-2" href="#">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-100 bg-white text-center">
        <div class="container text-center">
            <h1>Happiness Guarantee</h1>
            <h5 class="page-title">Our 100% Money Back Guarantee</h5>
            <p>
                We're not happy until you are happy, that's why we offer a 100% money back guarantee plus unlimited
                revisions. If you are not happy with your design or you require any changes just let us know and
                we will be more than happy to edit the design or simply give you a full refund.
            </p>
            <h5>Peter Owens</h5>
            <p><small>CEO,  Active Mockup</small></p>
        </div>
    </section>
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 quick-links">
                    <h6><label>Quick Links</label></h6>
                    <p><a href="#works"><span class="text-gray">Our Work</span></a></p>
                    <p><a href="#pricing"><span class="text-gray">Pricing</span></a></p>
                    <p><a href="#ourDesigns"><span class="text-gray">Our Design</span></a></p>
                    <p>
                        <a href="" data-toggle="modal" data-target="#policyModal">
                            <span class="text-gray tx-12">Privacy policy</span>
                        </a>
                        @include('elements.modal', ['modalId' => 'policyModal', 'modalTitle' => 'Privacy Policy'])
                    </p>
                    <p>
                        <a href="" data-toggle="modal" data-target="#tcModal">
                            <span class="text-gray tx-12">Terms &amp; Conditions</span>
                        </a>
                        @include('elements.modal', ['modalId' => 'tcModal', 'modalTitle' => 'Terms & Conditions'])
                    </p>
                </div>

                <div class="col-sm-2">
                    <h6><label>Contact</label></h6>
                    <p class="text-gray tx-12">+234 (0) 703 710 3288</p>
                    <p class="email text-gray">info@activemockup.com</p>
                </div>

                <div class="col-sm-2">
                    <h6><label>Address</label></h6>
                    <p class="text-gray">123 Main Street, Lekki, Lagos, Nigeria</p>
                </div>

                <div class="col-sm-6">
                    <h6><label>Why Us</label></h6>
                    <p class="text-gray">
                        Active Mockup has been the #1 Leading World App UI Mockup Designer. We are sure a trial will
                        convince you, that's why we go above and beyond to create unique & professional App Mockup
                        at an affordable price.
                    </p>
                    <div>
                        <img src="{{ asset('img/logo.png') }}" width="200">
                    </div>
                </div>
            </div>

            <div class="copyright-footer">
                <p class="text-center">
                    <span>© Copyright <?= date('Y'); ?> Active Mockup. All rights reserved. </span>
                    <a class="text-brand-primary" href="#">www.activemockup.com</a>
                </p>
            </div>
        </div>
    </section>
@endsection()