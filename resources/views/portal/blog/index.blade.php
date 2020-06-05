@extends('portal.layouts.main')
@section('title', 'Blogs')
@section('header-breadcrumb')
    <li class="active">Blogs</li>
@endsection()
@section('content-header-right')
    <a href="{{ route('new.blog') }}" class="btn btn-brand-primary">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Post
    </a>
@endsection()
@section('content-body')
    <div class="card card-table">
        @if(sizeof($blogs) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="field-name"><span>S/N</span></th>
                        <th class="field-name"><span>Author</span></th>
                        <th class="field-name"><span>Title</span></th>
                        <th class="field-name"><span>Content</span></th>
                        <th class="field-name"><span>Created At</span></th>
                        <th class="field-name"><span>Action</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $key => $blog)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $blog->admin->getFullName() }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{!! mb_strimwidth($blog->body, 0, 100, "...") !!}</td>
                            <td>{{ $blog->formatDate() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('edit.post', $blog->id) }}">
                                            Edit Post
                                        </a>
                                        <a class="dropdown-item" href="{{ route('view.post', $blog->id) }}">
                                            View Post
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fa fa-archive empty-state__icon icon-grey" aria-hidden="true"></i>
                <p class="empty-state__description mt-2">No Blog post has been made yet.</p>
            </div>
        @endif
        {{ $blogs->render() }}
    </div>
@endsection()