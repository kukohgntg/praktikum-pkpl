@extends('layouts.mainlayout')

@section('title', 'Categories')


@section('content')
    <h1>Halaman Categories</h1>
    {{-- {{ $categories }} --}}

    <div class="card mt-3">
        <div class="card-header">
            DataTable Example
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
                                <a href="">Dellete</a>
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
