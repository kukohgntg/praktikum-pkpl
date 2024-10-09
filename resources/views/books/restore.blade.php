@extends('layouts.mainlayout') 

@section('title', 'Restore Book')

@section('content')

    <h1 class="text-center mb-4">
        Are you sure you want to restore the book "{{ $book->title }}"?
    </h1>

    <div class="mt-3">
        <!-- Error Handling -->
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

        <!-- Card Layout -->
        <div class="card shadow-lg border-light">
            <div class="card-body">
                <form action="/admin/books/restore-confirm/{{ $book->slug }}" method="GET">
                    @csrf

                    <div class="row">
                        <!-- Book Cover Section -->
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

                        <!-- Book Details Section -->
                        <div class="col-md-8 col-lg-9">
                            <fieldset disabled>
                                <div class="mb-3">
                                    <label for="book_code" class="form-label">Book Code</label>
                                    <input id="book_code" name="book_code" type="text" class="form-control"
                                        value="{{ $book->book_code }}" disabled />
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Book Title</label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        value="{{ $book->title }}" disabled />
                                </div>

                                <div class="mb-3">
                                    <label for="currentCategories" class="form-label">Book Categories</label>
                                    <input class="form-control" type="text"
                                        value="{{ $book->categories->pluck('name')->implode(', ') }}" disabled />
                                </div>

                                <div id="bookRestoreHelpBlock" class="form-text">
                                    *Please make sure the book details are correct before returning it.
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="bi bi-arrow-counterclockwise"></i> Confirm
                            Restore
                        </button>
                        <a href="/admin/books/deleted" role="button" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
