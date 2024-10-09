@extends('layouts.mainlayout')

@section('title', 'Edit Book')

@section('content')

    <h1 class="text-center mb-4">
        Are you sure you want to edit the book "{{ $book->title }}"?
    </h1>

    <div class="mt-3">
        <!-- Pesan Error -->
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
                <form action="/admin/books/edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')

                    @csrf

                    <div class="row">
                        <!-- Kolom Gambar -->
                        <div class="col-md-4 col-lg-3">
                            <div class="mb-3">
                                <label for="cover-preview" class="form-label">Current Cover Image</label>
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

                        <!-- Kolom Form -->
                        <div class="col-md-8 col-lg-9">
                            <div class="mb-3">
                                <label for="book_code" class="form-label">Book Code</label>
                                <input id="book_code" name="book_code" type="text" class="form-control"
                                    placeholder="Insert book code here" value="{{ $book->book_code }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    placeholder="Insert title here" value="{{ $book->title }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Cover</label>
                                <input id="image" name="image" type="file" class="form-control" />
                                <div id="coverHelpBlock" class="form-text">
                                    *Make sure the image size is not more than 1 MB
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="currentCategories" class="form-label">Current Categories</label>
                                <input class="form-control" type="text"
                                    placeholder="{{ $book->categories->pluck('name')->implode(', ') }}"
                                    aria-label="Disabled input example" disabled />
                            </div>

                            <div class="mb-3">
                                <label for="categories" class="form-label">Categories</label>
                                <select id="categories" name="categories[]" class="form-select form-select-multiple"
                                    multiple="multiple" aria-label="Select multiple categories">
                                    @forelse ($categories as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @empty
                                        <option disabled>
                                            No categories available
                                        </option>
                                    @endforelse
                                </select>
                            </div>

                            <div id="bookEditHelpBlock" class="form-text">
                                *Please make sure the book details are correct before editing it.
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-pencil-square"></i> Update
                        </button>
                        <a href="/admin/books" role="button" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
