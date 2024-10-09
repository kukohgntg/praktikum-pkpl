@extends('layouts.mainlayout')

@section('title', 'Delete Book')

@section('content')

    <h1 class="text-center mb-4">
        Are you sure you want to delete the book "{{ $book->title }}"?
    </h1>

    <div class="mt-3">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show shadow" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg border-light">
            <div class="card-body">
                <form action="/admin/books/delete-confirm/{{ $book->slug }}" method="GET">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 col-lg-3">
                            <div class="mb-3">
                                <label for="cover-preview" class="form-label">Cover Image Preview</label>
                                <div class="text-center border rounded p-2 bg-light">
                                    @if ($book->cover)
                                        <img class="img-fluid border rounded shadow"
                                            src="{{ asset('storage/cover/' . $book->cover) }}" alt="Cover Image" />
                                    @else
                                        <img class="img-fluid border rounded shadow"
                                            src="{{ asset('images/cover-not-available.png') }}" alt="No Cover Available" />
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-9">
                            <div class="mb-3">
                                <label for="book_code" class="form-label">Book Code</label>
                                <input id="book_code" name="book_code" type="text" class="form-control"
                                    placeholder="{{ $book->book_code }}" aria-label="{{ $book->book_code }}" disabled />
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Book Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    placeholder="{{ $book->title }}" aria-label="{{ $book->title }}" disabled />
                            </div>

                            <div class="mb-3">
                                <label for="Categories" class="form-label">Categories</label>
                                <input class="form-control" type="text"
                                    placeholder="{{ $book->categories->pluck('name')->implode(', ') }}"
                                    aria-label="Disabled input example" disabled />
                            </div>

                            <div id="bookDeleteHelpBlock" class="form-text">
                                *Please make sure the book details are correct before deleting it.
                            </div>
                        </div>

                        <!-- Tombol konfirmasi dan cancel -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-danger me-2">
                                <i class="bi bi-trash-fill"></i> Confirm Delete
                            </button>
                            <a href="/admin/books" role="button" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
