@extends('layouts.main')

@section('header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">Category</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                // confirmButtonText: 'Login'
            })
        </script>
    @endif
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4>List Category</h4>
        <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <table class="table table-hover">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
            <tbody>
                <tr class="text-center">
                    <td class="align-middle">
                        {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->index + 1 }}</td>
                    <td class="align-middle">{{ $category->name }}</td>
                    <td class="align-middle">{{ $category->slug }}</td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                class="btn btn-sm btn-warning mr-2">Update</a>
                            {{-- <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah anda yakin untuk menghapus category ini?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}">Delete</button>
                        </div>
                    </td>
                </tr>
                @include('pages.category.delete-confirmation')
            </tbody>
        @endforeach
    </table>
    <div>{{ $categories->links() }}</div>
@endsection
