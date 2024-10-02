@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h1>Detail User</h1>
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/activating-user/{{ $user->slug }}" method="GET">

            <label for="username" class="form-label">Username</label>
            <input id="username" name="username" type="text" class="form-control" placeholder="{{ $user->username }}"
                aria-label="{{ $user->username }}" disabled />

            <label for="phone" class="form-label">Phone</label>
            <input id="phone" name="phone" type="text" class="form-control" placeholder="{{ $user->phone }}"
                aria-label="{{ $user->phone }}" disabled />

            <label for="address" class="form-label">Address</label>
            <input id="address" name="address" type="text" class="form-control" placeholder="{{ $user->address }}"
                aria-label="{{ $user->address }}" disabled />

            <label for="status" class="form-label">Status</label>
            <input id="status" name="status" type="text" class="form-control" placeholder="{{ $user->status }}"
                aria-label="{{ $user->status }}" disabled />
            <div id="userNameHelpBlock" class="form-text">
                *Pastikan nama terlebih dahulu
            </div>
            <div class="d-flex justify-content-end">
                @if ($user->status == 'inactive')
                    <!-- Tombol Approve -->
                    <button type="submit" class="btn btn-primary">
                        Approve
                    </button>
                @endif
                <!-- Tombol Cancel dengan margin-start 3 -->
                <a href="" class="btn btn-secondary ms-3">Cancel</a>
            </div>
        </form>
    </div>

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- d-flex untuk membuat elemen berada dalam satu baris, justify-content-between untuk memberi jarak antara elemen kiri dan kanan -->
            <h5 class="card-title mb-0">Data Table Loan Records</h5> <!-- mb-0 untuk menghapus margin bawah pada h5 -->

        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover" id="datatablesSimple">
                <thead>
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

                <tfoot>
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


@endsection
