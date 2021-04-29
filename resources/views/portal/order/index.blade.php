@extends('portal.layouts.main')
@section('title', 'Orders')
@section('header-breadcrumb')
    <li class="active">Orders</li>
@endsection()
@section('content-body')
    @include('portal.elements.list-view-orders')
@endsection