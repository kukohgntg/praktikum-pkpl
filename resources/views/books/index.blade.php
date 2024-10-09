@extends('layouts.mainlayout')

@section('title', 'Book List')

@section('content')

    <h1 class="text-center mb-4">Book List</h1>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="card mt-3 shadow-lg border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Book Data Table</h5>
            <div>
                <a href="/admin/books/deleted" class="btn btn-primary me-2">Deleted Books</a>
                <a href="/admin/books/add" class="btn btn-primary">Add Book</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="dataTables">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->name }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>
                            <td>
                                <span
                                    class="badge {{ $item->status === 'in stock' ? 'bg-success' : 'bg-danger' }}">{{ $item->status }}</span>
                            </td>
                            <td>
                                <a href="/admin/books/edit/{{ $item->slug }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="/admin/books/delete/{{ $item->slug }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
