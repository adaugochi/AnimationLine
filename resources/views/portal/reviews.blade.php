@extends('portal.layouts.main')
@section('title', 'Reviews')
@section('header-breadcrumb')
    <li class="active">Reviews</li>
@endsection()
@section('content-body')
    @if(sizeof($reviews) > 0)
        @foreach($reviews as $key => $review)
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <label>{{ $review->order->billing->user->getFullName() }}</label>
                <p>{{ $review->comment }}</p>
            </div>
        @endforeach
    @else
        <div class="empty-state">
            <i class="fa fa-comments empty-state__icon icon-grey" aria-hidden="true"></i>
            <p class="empty-state__description mt-2">No Reviews has been made yet.</p>
        </div>
    @endif
    {{ $reviews->render() }}
@endsection()