@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('header-breadcrumb')
    <li class="active">Dashboard</li>
@endsection()
@section('content-body')
    <div class="row card-dashboard">
        <div class="col-lg-3 col-md-6">
            <div class="card card-border-top pink">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Clients</h3>
                        <label class="fs-20">{{ $users }}</label>
                    </div>
                    <div class="card-dashboard-icon d-content-center pink">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="card card-border-top gray">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Orders</h3>
                        <label class="fs-20">{{ $billings }}</label>
                    </div>
                    <div class="card-dashboard-icon d-content-center gray">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="card card-border-top indigo">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Reviews</h3>
                        <label class="fs-20">{{ $reviews }}</label>
                    </div>
                    <div class="card-dashboard-icon d-content-center indigo">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="card card-border-top green">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Posts</h3>
                        <label class="fs-20">{{ $blogPosts }}</label>
                    </div>
                    <div class="card-dashboard-icon d-content-center green">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection