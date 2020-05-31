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
                    <div class="form-group">
                        <div class="mb-4">
                            <button class="btn btn-brand-primary btn-link">
                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                            </button>
                            <label class="pl-2 fs-20 font-weight-bold">Get Link</label>
                            <button class="btn btn-info btn-lg float-right btn-copy"
                                    data-toggle="popover" data-content="Copied!" data-placement="top">
                                Copy Link
                            </button>
                        </div>
                        <input type="text" class="form-control card-form__input copy-url"
                            value="{{ $order->order_url }}">
                    </div>
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
                    Thank you for Accepting the order satisfactorily. We at AnimationLine are happy when our
                    customer are happy. Please leave a review or comment and click on the submit button to
                    <strong>confirm</strong> your order.
                </p>
            </div>
            <form class="validateForm reviewForm" method="post" action="{{ route('pos.review') }}">
                @csrf
                <div class="form-group">
                    <label class="card-form__label">Reviews</label>
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
                    Please tell us what you didn't find satisfactory. Ours team will review and rework it.
                    Drop your comments below.
                </p>
            </div>
            <form class="validateForm reviewForm" method="post" action="{{ route('neg.review') }}">
                @csrf
                <div class="form-group">
                    <label class="card-form__label">Comments</label>
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <textarea class="form-control comment" rows="5" name="comment"></textarea>
                </div>
                <button class="btn btn-brand-primary px-5 py-12 text-uppercase">
                    Submit
                </button>
            </form>
        </div>
    </template>
@endsection()