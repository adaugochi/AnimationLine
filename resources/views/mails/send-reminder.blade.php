@extends('mails.layouts.html')
@section('content')
    <h1>Hi {{ $data['name'] }},</h1>

    <p>
        This email is to remind you that the service you ordered:
        <span class="text-brand">{{ ucwords($data['service']) }} Package</span> that you are yet to give us
        a brief.
    </p>

    <p>
        Please complete your brief so our team at AnimationLine will start working on it.
    </p>

    <a class="btn" href="{{ route('login') }}" target="_blank">Login</a>

    <style>
        .text-brand {
            font-weight: bold;
        }
    </style>
@endsection()