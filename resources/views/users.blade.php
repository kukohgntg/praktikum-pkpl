@extends('layouts.mainlayout')

@section('title', 'Users')


@section('content')
<h1>Users List</h1>

<div class="mt-3">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- d-flex untuk membuat elemen berada dalam satu baris, justify-content-between untuk memberi jarak antara elemen kiri dan kanan -->
        <h5 class="card-title mb-0">DataTable Category</h5> <!-- mb-0 untuk menghapus margin bawah pada h5 -->
        <!-- <div>
                <a href="banned-users" class="btn btn-primary">Banned Users List</a>
                {{-- <a href="add-category" class="btn btn-primary">Aprove User List</a> --}}
            </div> -->
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover" id="dataTables">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col" colspan="3">Action</th>
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
                        <a href="/detail-user/{{ $item->slug }}">Detail</a>
                    </td>
                    <td>
                        <a href="/edit-user/{{ $item->slug }}">Edit</a>
                    </td>
                    <td>
                        <a href="/ban-user/{{ $item->slug }}">Ban User</a>
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
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection