@extends('layouts.mainlayout')

@section('title', 'Categories')

@section('content')

    <h1 class="text-center mb-4">Category Management</h1>

    <!-- Success Alert -->
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Card for Categories Table -->
    <div class="card mt-3 shadow-lg border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Category DataTable</h5>
            <div>
                <a href="/admin/categories/deleted" class="btn btn-outline-primary me-2">
                    <i class="bi bi-folder-x"></i> Deleted Categories
                </a>
                <a href="/admin/categories/add" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Category
                </a>
            </div>
        </div>

        <!-- Responsive Table -->
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle" id="dataTables">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="/admin/categories/edit/{{ $item->slug }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="/admin/categories/delete/{{ $item->slug }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
