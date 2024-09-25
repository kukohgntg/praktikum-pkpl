@extends('layouts.mainlayout')

@section('title', 'Categories')


@section('content')
    {{-- {{ $categories }} --}}

    <h1>Halaman Categories</h1>

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- d-flex untuk membuat elemen berada dalam satu baris, justify-content-between untuk memberi jarak antara elemen kiri dan kanan -->
            <h5 class="card-title mb-0">DataTable Category</h5> <!-- mb-0 untuk menghapus margin bawah pada h5 -->
            <a href="add-category" class="btn btn-primary">Add Category</a>
        </div>
        <div class="card-body">
            <table class="table table-hover" id="datatablesSimple">
                <thead>
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
                                <a href="">Edit</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
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
