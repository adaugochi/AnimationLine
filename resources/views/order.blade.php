@extends('layouts.main')
@section('title', 'Order')
@section('content')
    <div class="mx-auto question_wrap">
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="alert alert-success fade show" role="alert">
                        Here is the link to your order. Please double click on the button to copy to clipboard
                    </div>
                    @include('elements.copy-link', ['orderURL' => $order->order_url])
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="empty-state order">
                                <i class="fa fa-question empty-state__icon icon-grey" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center d-content-center">
                            <div>
                                <p class="fs-22">Are you satisfied with what you order?</p>
                                <button class="btn btn-success btn-lg btn-yes">Yes</button>
                                <button class="btn btn-danger btn-lg btn-no">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <template id="positive">
        <div class="card positive">
            <div class="alert alert-success fade show" role="alert">
                <p>
                    We are glad you are satisfied with your order. Kindly drop a review about our service and
                    remember to recommend us to your family and friends. <br>The AnimationLine Team
                </p>
            </div>
            <form class="validateForm reviewForm" method="post" action="{{ route('pos.review') }}">
                @csrf
                <div class="form-group">
                    <label class="card-form__label">Review</label>
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <textarea class="form-control card-form__input comment" rows="5" name="comment"></textarea>
                </div>
                <button class="btn btn-brand-primary px-5 py-12 text-uppercase">Submit</button>
            </form>
        </div>
    </template>
    <template id="negative">
        <div class="card negative">
            <div class="alert alert-success fade show" role="alert">
                <p>
                    Oops.. Do not worry, we are here to make all the necessary changes needed. Kindly state in
                    details all amendments needed to make your work satisfactory
                </p>
            </div>
            <form class="validateForm reviewForm" method="post" action="{{ route('neg.review') }}">
                @csrf
                <div class="form-group">
                    <label class="card-form__label">Comment</label>
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <textarea class="form-control card-form__input comment" rows="5" name="comment"></textarea>
                </div>
                <button class="btn btn-brand-primary px-5 py-12 text-uppercase">
                    Submit
                </button>
            </form>
        </div>
    </template>
@endsection()