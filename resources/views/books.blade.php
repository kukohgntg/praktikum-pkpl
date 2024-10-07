@extends('layouts.mainlayout')

@section('title', 'Book')


@section('content')
{{-- {{ $categories }} --}}

<h1>Book List</h1>

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
        <h5 class="card-title mb-0">Data Table Book</h5> <!-- mb-0 untuk menghapus margin bawah pada h5 -->
        <div>
            <a href="/admin/books/deleted" class="btn btn-primary">Restoe Book</a>
            <a href="/admin/books/add" class="btn btn-primary">Add Book</a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover" id="dataTables">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                        {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/admin/books/edit/{{ $item->slug }}">Edit</a>
                        <a href="/admin/books/delete/{{ $item->slug }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection