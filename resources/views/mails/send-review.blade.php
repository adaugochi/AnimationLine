@extends('mails.layouts.html')
@section('content')
    <h3>Hi {{ $data['name'] }},</h3>

    <p>
        The Service you ordered: <span class="text-brand">{{ ucwords($data['service']) }} Package</span>
        is ready for your review. Please login to your dashboard to the link.
    </p>

    <p>
        To cross it off your to-do list, accept the delivery or request for a revision if needed!
        Please note your order will be automatically marked as delivered after 3 days, so make
        sure to review it.
    </p>

    <a class="btn" href="{{ route('login') }}" target="_blank">Login</a>

    <style>
        .text-brand {
            font-weight: bold;
        }
    </style>
@endsection()