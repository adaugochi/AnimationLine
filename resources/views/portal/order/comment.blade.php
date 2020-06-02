@extends('portal.layouts.main')
@section('title', 'Comments')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.order') }}">Orders</a></li>
    <li class="active">Comments</li>
@endsection()
@section('content-body')
    <div class="panel-group">
    @foreach($revisions as $revision)
        <div class="card">
            <div class="row">
                <div class="col-md-6">
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
                               value="{{ $revision->order->order_url }}">
                    </div>
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