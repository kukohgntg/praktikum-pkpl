@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-center">{{ $user->username }} User Details</h1>
        <a href="/admin/users" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
    </div>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="card mt-3 shadow-lg">
        <div class="card-header">
            <h5 class="card-title mb-0">User Information</h5>
        </div>
        <div class="card-body">
            <form action="/admin/users/activate/{{ $user->slug }}" method="GET">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" class="form-control" value="{{ $user->username }}"
                        disabled />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}"
                        disabled />
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" name="address" type="text" class="form-control" value="{{ $user->address }}"
                        disabled />
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" name="status" type="text" class="form-control" value="{{ $user->status }}"
                        disabled />
                </div>

                @if ($user->status == 'inactive')
                    <div class="form-text mb-3">
                        *Please ensure user details before activating.
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="bi bi-check-circle"></i> Approve
                        </button>
                        <a href="/admin/users" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    @if ($user->status == 'active')
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h1 class="text-center">{{ $user->username }} Loan Records</h1>
        </div>

        <div class="card mt-3 shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Loan Record Data Table</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover" id="dataTables">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Title</th>
                            <th scope="col">Loan Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Actual Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $item)
                            <tr
                                class="{{ $item->actual_return_date == null ? '' : (strtotime($item->return_date) < strtotime($item->actual_return_date) ? 'table-danger' : 'table-success') }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->users->username }}</td>
                                <td>{{ $item->books->title }}</td>
                                <td>{{ $item->loan_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->actual_return_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Title</th>
                            <th scope="col">Loan Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Actual Return Date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endif @endsection
