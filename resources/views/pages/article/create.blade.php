@extends('layouts.main')

@section('header')
    <h1 class="h3 mb-2 text-gray-800">Add Article</h1>
@endsection

@section('content')
    <div class="card"></div>
    <form action="{{ route('article.post') }}" method="POST">
        <div class="card">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title')
                        is-invalid
                    @enderror"
                        autocomplete="off" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10"
                        class="form-control @error('content')
                        is-invalid
                    @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author"
                        class="form-control @error('author')
                        is-invalid
                    @enderror"
                        autocomplete="off" value="{{ old('author') }}">
                    @error('author')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('article') }}" class="btn btn-sm btn-outline-danger mr-2">Cancel</a>
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection
