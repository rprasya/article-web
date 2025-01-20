@extends('layouts.main')

@section('header')
    <h1 class="h3 mb-2 text-gray-800">Add Category</h1>
@endsection

@section('content')
    <div class="card"></div>
    <form action="{{ route('category.post') }}" method="POST">
        <div class="card">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        autocomplete="off" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" id="slug"
                        class="form-control @error('slug')
                        is-invalid
                    @enderror"
                        autocomplete="off" value="{{ old('slug') }}">
                    @error('slug')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('category') }}" class="btn btn-sm btn-outline-danger mr-2">Cancel</a>
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection
