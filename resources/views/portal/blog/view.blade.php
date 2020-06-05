@extends('portal.layouts.main')
@section('title', 'Blogs')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.blogs') }}">Blogs</a></li>
    <li class="active">View</li>
@endsection()
@section('content-body')
    <div class="card">
        <div class="mb-4">
            <img src="{{ asset('blog/images/'. $blog->image_url) }}" class="w-100">
        </div>
        <h2>{{ $blog->title }}</h2>
        <p>{!! $blog->body !!}</p>
    </div>
@endsection()