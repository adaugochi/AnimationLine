@extends('portal.layouts.main')
@section('title', 'Comments')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.order') }}">Orders</a></li>
    <li class="active">Comments</li>
@endsection()
@section('content-body')
    <div class="panel-group">
    @foreach($revisions as $revision)
        <div class="card mb-4">
            <div class="row">
                <div class="col-md-6">
                    @include('elements.copy-link', ['orderURL' => $revision->order->order_url])
                </div>
                <div class="col-md-6">
                    <div class="alert alert-info fade show" role="alert">
                        <p>
                            {{ $revision->comment }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection()