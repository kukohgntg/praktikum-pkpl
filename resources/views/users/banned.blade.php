@extends('layouts.mainlayout')

@section('title', 'Banned Users')

@section('content')

    <div class="text-center mb-4">
        <h1>Banned Users</h1>
    </div>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="card shadow mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">DataTable Banned Users</h5>
            <a href="/admin/users" class="btn btn-light">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
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
                    @foreach ($banned_users as $item)
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
                                <a href="/admin/users/unban/{{ $item->slug }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-arrow-counterclockwise"></i> Unban
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
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
