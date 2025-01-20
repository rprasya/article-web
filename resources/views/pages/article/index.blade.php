@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">Article</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-1">
        <h3>List Article</h3>
        <a href="{{ route('article.create') }}" class="btn btn-success">Add Article</a>
    </div>
    <table class="table table-hover">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>title</th>
                <th>content</th>
                <th>author</th>
                <th>category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle">1</td>
                <td class="align-middle">Space to the moon</td>
                <td class="align-middle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias rem facere molestiae? Saepe nulla
                    eum, sunt tempore blanditiis, veritatis temporibus suscipit praesentium excepturi asperiores, quas vero
                    fuga dolore ipsa eaque?</td>
                <td class="align-middle">NASA</td>
                <td class="align-middle">Galaxy</td>
                <td class="align-middle">
                    <div class="d-flex">
                        <a href="" class="btn btn-sm btn-warning mr-2">Update</a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
