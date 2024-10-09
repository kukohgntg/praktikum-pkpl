@extends('layouts.mainlayout')

@section('title', 'Inactive Users')

@section('content')

    <div class="text-center mb-4">
        <h1>Inactive Users List</h1>
    </div>

    <div class="card shadow-lg mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Inactive User Data Table</h5>
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
