@extends('layouts.mainlayout')
@section('title', 'Deleted Books')
@section('content')
    <h1>Deleted Books</h1>

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
            <h5 class="card-title mb-0">DataTable Book</h5> <!-- mb-0 untuk menghapus margin bawah pada h5 -->
            <a href="/books" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="datatablesSimple">
                <thead>
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
                                <a href="/restored-book/{{ $item->slug }}">Restore</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
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
