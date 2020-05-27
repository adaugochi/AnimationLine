@extends('portal.layouts.main')
@section('title', 'Brief')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.order') }}">Orders</a></li>
    <li class="active">Brief</li>
@endsection()
@section('content-body')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card__title fs-20 pb-1">
                    <i class="fa fa-user pr-2 card__icon blue" aria-hidden="true"></i>
                    <span>Personal Information</span>
                </div>
                <div class="card__body">
                    <div class="d-flex justify-content-between py-1">
                        <label>Name:</label>
                        <span>{{ $billing->user->getFullName() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Email Address:</label>
                        <span class="text-brand-primary text-underline">{{ $billing->user->email }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Country:</label>
                        <span>{{ \Illuminate\Support\Arr::get($countries, $billing->country) }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>State:</label>
                        <span>{{ $billing->state }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>City:</label>
                        <span>{{ $billing->city }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="card">
                <div class="card__title fs-20 pb-1">
                    <i class="fa fa-credit-card-alt pr-2 card__icon pink" aria-hidden="true"></i>
                    <span>Billing Information</span>
                </div>
                <div class="card__body">
                    <div class="d-flex justify-content-between py-1">
                        <label>Service Opted For:</label>
                        <span>{{ ucwords($billing->service) }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Package:</label>
                        <span class="text-brand-primary">{{ ucfirst($billing->package) }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Amount:</label>
                        <span>{{ $billing->getCurrencyAndAmount() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Payment Method:</label>
                        <span>{{ ucfirst($billing->payment_method) }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Status:</label>
                        <span class="font-weight-bold status status-{{ $billing->status }}">
                            {{ ucwords(str_replace('-', ' ', $billing->status)) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="card">
                <div class="card__title fs-20 pb-1">
                    <i class="fa fa-sticky-note pr-2 card__icon green" aria-hidden="true"></i>
                    <span>Brief Information</span>
                </div>
                <div class="card__body">
                    <div class="d-flex justify-content-between py-1">
                        <label>Company Name:</label>
                        <span>{{ $brief->company_name }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <label>Company Website:</label>
                        @if($brief->company_website)
                            <a href="{{$brief->company_website}}" class="text-brand-primary" target="_blank">
                                {{ $brief->company_website }}
                            </a>
                        @else
                            <span class="text-brand-primary">---</span>
                        @endif
                    </div>
                    @if($billing->service === \App\Billing::TEXT || $billing->service === \App\Billing::VIDEO)
                        <div class="d-flex justify-content-between py-1">
                            <label>Gender of the Artist:</label>
                            <span>{{ $brief->artist_gender ?: '---' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <label>Accent of the Artist:</label>
                            <span>{{ $brief->artist_accent ?: '---'}}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <label>Voice Type:</label>
                            <span>{{ $brief->voice_type ?: '---' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <label>Video Speed:</label>
                            <span>{{ $brief->video_speed ?: '---'}}</span>
                        </div>
                        <div class="">
                            <label>Video Script:</label>
                            <p>{{ $brief->video_script}}</p>
                        </div>
                    @endif
                    <div class="">
                        <label>Other information:</label>
                        <p>{{ $brief->other_info ?: 'None' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card">
                <div class="card__title fs-20 pb-1">
                    <i class="fa fa-camera pr-2 card__icon orange" aria-hidden="true"></i>
                    <span>Company's Logo</span>
                </div>
                <div class="card__body">
                    <img src="{{ asset('uploads/company-logos/'.$brief->company_logo) }}" class="w-100">
                    <a href="{{ asset('uploads/company-logos/'.$brief->company_logo) }}"
                       class="btn btn-brand-primary mt-3" download>
                        <i class="fa fa-download" aria-hidden="true"></i>
                        Download
                    </a>
                </div>
            </div>
        </div>
        @if($billing->service === \App\Billing::LOGO)
            <div class="col-lg-3 mt-4">
                <div class="card">
                    <div class="card__title fs-20 pb-1">
                        <i class="fa fa-picture-o pr-2 card__icon indigo" aria-hidden="true"></i>
                        <span>Sample Logo</span>
                    </div>
                    <div class="card__body">
                        <img src="{{ asset('uploads/sample-logos/'.$brief->logo_sample) }}" class="w-100">
                        <a href="{{ asset('uploads/sample-logos/'.$brief->logo_sample) }}"
                           class="btn btn-brand-primary mt-3" download>
                            <i class="fa fa-download" aria-hidden="true"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection