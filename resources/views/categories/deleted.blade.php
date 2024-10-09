@extends('layouts.mainlayout')

@section('title', 'Deleted Categories')

@section('content')

    <h1 class="text-center mb-4">Deleted Categories</h1>

    <div class="mt-3">
        <!-- Success alert -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Card for Deleted Categories Table -->
    <div class="card mt-3 shadow-lg border-light">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Deleted Category Data Table</h5>
            <a href="/admin/categories" class="btn btn-light">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="dataTables">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deleted_categories as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="/admin/categories/restore/{{ $item->slug }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-arrow-counterclockwise"></i> Restore
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
