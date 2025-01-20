@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">Article</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4>List Article</h4>
        <a href="{{ route('article.create') }}" class="btn btn-success">Add Article</a>
    </div>
    <table class="table table-hover">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($articles as $article)
            <tbody>
                <tr class="">
                    <td class="align-middle text-center">{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $article->title }}</td>
                    <td class="align-middle">{{ $article->content }}</td>
                    <td class="align-middle">{{ $article->author }}</td>
                    <td class="align-middle">{{ $article->category->name }}</td>
                    <td class="align-middle">
                        <div class="d-flex">
                            <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                class="btn btn-sm btn-warning mr-2">Update</a>
                            <form action="{{ route('article.delete', ['id' => $article->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus article ini?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <div>{{ $articles->links() }}</div>
@endsection
