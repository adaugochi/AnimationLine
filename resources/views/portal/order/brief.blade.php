@extends('portal.layouts.main')
@section('title', 'Brief')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.order') }}">Orders</a></li>
    <li class="active">Brief</li>
@endsection()
@section('content-body')
    @include('portal.elements.brief')
@endsection