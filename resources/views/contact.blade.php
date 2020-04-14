@extends('layouts.app')
@section('title', 'Contact')
@section('header-text', \App\Contants\Message::CONTACT_HEADER_TEXT)
@section('body-text', \App\Contants\Message::CONTACT_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/contact.svg') }}">
@endsection()
@section('content')

@endsection()