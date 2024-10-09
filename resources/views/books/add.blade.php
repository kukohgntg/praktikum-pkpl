@extends('layouts.mainlayout')

@section('title', 'Add Book')

@section('content')

    <h1 class="text-center mb-4">Add New Book</h1>

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
                <form action="/admin/books/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Cover Image Input -->
                        <div class="col-md-4 col-lg-3">
                            <!-- The entire div for image preview is hidden initially -->
                            <div id="cover-preview-div" class="mb-3" style="display: none">
                                <label for="cover-preview" class="form-label">Cover Image Preview</label>
                                <div class="border rounded p-2 bg-light">
                                    <img id="cover-preview" class="img-fluid border rounded shadow" src="#"
                                        alt="Book Cover Preview" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Cover</label>
                                <input id="image" name="image" type="file" class="form-control"
                                    onchange="previewImage(event)" />
                                <div id="coverHelpBlock" class="form-text">
                                    *Make sure the image size is not more than 1 MB
                                </div>
                            </div>
                        </div>

                        <!-- Form Data Input -->
                        <div class="col-md-8 col-lg-9">
                            <div class="mb-3">
                                <label for="book_code" class="form-label">Book Code</label>
                                <input id="book_code" name="book_code" type="text" class="form-control"
                                    placeholder="Insert Book Code Here" value="{{ old('book_code') }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    placeholder="Insert Book Title Here" value="{{ old('title') }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="categories" class="form-label">Category</label>
                                <select id="categories" name="categories[]" class="form-select form-select-multiple"
                                    multiple="multiple" aria-label="Multiple select example">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div id="bookEditHelpBlock" class="form-text">
                                *Please make sure the book details are correct before adding it.
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-save"></i> Save
                        </button>
                        <a href="/admin/books" role="button" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            const [file] = event.target.files;
            const previewDiv = document.getElementById("cover-preview-div");
            const previewImage = document.getElementById("cover-preview");
            if (file) {
                // Show the preview div
                previewDiv.style.display = "block";
                previewImage.src = URL.createObjectURL(file);
            } else {
                // Hide the preview div if no file is selected
                previewDiv.style.display = "none";
            }
        }
    </script>

@endsection
