@extends('portal.layouts.main')
@section('title', 'Order Details')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.order') }}">Orders</a></li>
    <li class="active">Details</li>
@endsection()
@section('content-body')
    @include('portal.elements.brief')
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                @include('elements.copy-link', ['orderURL' => $billing->order->order_url])
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card__title fs-20 pb-1">
                    <i class="fa fa-comment pr-2 card__icon orange" aria-hidden="true"></i>
                    <span>Review</span>
                </div>
                <div class="card__body">
                    <div class="alert alert-info fade show" role="alert">
                        <p>
                            {{ $review }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()