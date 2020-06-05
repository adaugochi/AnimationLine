@extends('layouts.app')
@section('title', 'Blog')
@section('header-text', \App\Contants\Message::BLOG_HEADER_TEXT)
@section('body-text', \App\Contants\Message::BLOG_BODY_TEXT)
@section('image')
    <img src="{{ asset('img/blog.svg') }}" class="blog__header-img-width">
@endsection()
@section('content')
    <section id="posts" class="py-100 text-center">
        <div class="container">
            <h1 class="page-title mb-4 mb-md-3">Latest Articles</h1>
            @if(sizeof($blogs) > 0)
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-6">
                            <div class="d-flex blog__wrapper">
                                <img src="{{ asset('blog/images/'. $blog->image_url) }}" class="blog__img"/>
                                <div class="blog__text-wrapper pl-3 text-left">
                                    <a href="{{ route('show.post', $blog->id) }}" class="cursor-pointer">
                                        <label class="blog__title">{{ $blog->title }}</label>
                                    </a>
                                    <p>{{ $blog->formatDate() }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fa fa-archive empty-state__icon icon-grey" aria-hidden="true"></i>
                    <p class="empty-state__description mt-2">No Latest Article has been posted.</p>
                </div>
            @endif
            {{ $blogs->render() }}
        </div>
    </section>
@endsection()