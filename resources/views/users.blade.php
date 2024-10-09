@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')

    <h1 class="text-center mb-4">Users List</h1>

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
            <h5 class="card-title mb-0">Users Data Table</h5>
            <div>
                <a href="/admin/users/banned" class="btn btn-warning me-2">
                    <i class="bi bi-person-slash"></i> Banned Users
                </a>
                <a href="/admin/users/inactive" class="btn btn-primary">
                    <i class="bi bi-person-lock"></i> Inactive Users
                </a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="dataTables">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->username }}</td>
                            <td>
                                @if ($item->phone)
                                    {{ $item->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="/admin/users/detail/{{ $item->slug }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="/admin/users/ban/{{ $item->slug }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-person-slash"></i> Ban User
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
