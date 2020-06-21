@extends('mails.layouts.html')
@section('content')
    <h3>Hi {{ $data['name'] }},</h3>
    <p>Your payment has been received.</p>
    <p>We receive your payment successfully. You can now proceed to give us your brief.</p>
    <a class="btn" href="{{ route('login') }}" target="_blank">Login</a>
    <style>
        .text-brand {
            font-weight: bold;
        }
    </style>
@endsection()