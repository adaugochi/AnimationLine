@extends('portal.layouts.main')
@section('title', 'New Blog')
@section('header-breadcrumb')
    <li class="active"><a href="{{ route('admin.blogs') }}">Blogs</a></li>
    <li class="active">New</li>
@endsection()
@section('content-body')
    <div class="card">
        <form method="post" class="validateForm" action="">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="card-form__label">
                        Post Title<span class="text-danger">*</span>
                    </label>
                    <input class="form-control card-form__input" name="title">
                </div>
                <div class="form-group col-md-6 post-image">
                    <label for="post-image" class="card-form__label">
                        Post Image<span class="text-danger">*</span>
                    </label>
                    <div>
                        <span class="file-placeholder">Choose File</span>
                        <span class="file-selected">No File Chosen</span>
                    </div>
                    <input type="file" id="post-image" name="image" accept="['.png, .jpg, .jpeg, .svg, .gif, .webp']"
                           class="file-input form-control-file @error('image') is-invalid @enderror">
                    @include('elements.error', ['fieldName' => 'image'])
                </div>
                <div class="form-group col-12">
                    <label class="card-form__label">
                        Post Content<span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" id="editor" name="body"></textarea>
                </div>
            </div>
            <button class="btn btn-brand-primary px-5 py-12 mt-2">
                Submit
            </button>
        </form>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection()