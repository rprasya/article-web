@extends('layouts.main')

@section('header')
    <h1 class="h3 mb-2 text-gray-800">Update Article</h1>
@endsection

@section('content')
    <div class="card"></div>
    <form action="" method="POST">
        <div class="card">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" autocomplete="off"
                        value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control" autocomplete="off"
                        value="{{ old('author') }}">
                </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Sports</option>
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('article') }}" class="btn btn-sm btn-outline-danger mr-2">Cancel</a>
                <button type="submit" class="btn btn-sm btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
