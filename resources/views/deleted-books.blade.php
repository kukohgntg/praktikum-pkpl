@extends('layouts.mainlayout') 

@section('title', 'Deleted Books List')

@section('content')

    <h1 class="text-center mb-4">Deleted Books List</h1>

    <!-- Success message -->
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Data Table -->
    <div class="card shadow-lg border-light mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Deleted Books Data Table</h5>
            <a href="/admin/books" class="btn btn-light">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover" id="dataTables">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Book Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deleted_books as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="/admin/books/restore/{{ $item->slug }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-arrow-counterclockwise"></i> Restore
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Book Code</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
