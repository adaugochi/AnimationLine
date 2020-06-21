@extends('mails.layouts.html')
@section('content')
    <h3>Hi {{ $data['name'] }},</h3>
    <p>
        You are receiving this email because you are yet to make payment for the {{ $data['service'] }}
        package you ordered for.
    </p>
    <p>Please login to your account and proceed to making payment.</p>
    <a class="btn" href="{{ route('login') }}" target="_blank">Login</a>
    <style>
        .text-brand {
            font-weight: bold;
        }
    </style>
@endsection()