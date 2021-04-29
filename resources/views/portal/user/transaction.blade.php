@extends('portal.layouts.main')
@section('title', 'Transactions')
@section('header-breadcrumb')
    <li class="active">Users</li>
    <li class="active"><a href="{{ route('user.clients') }}">Clients</a></li>
    <li class="active">Transactions</li>
@endsection()
@section('content-body')
    @include('portal.elements.list-view-orders')
@endsection