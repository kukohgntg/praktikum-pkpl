@extends('layouts.mainlayout')

@section('title', 'Edit Category')

@section('content')

    <h1 class="text-center mb-4">
        Are you sure you want to edit this category "{{ $category->name }}"?
    </h1>

    <div class="mt-3">
        <!-- Alert for validation errors -->
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

        <!-- Form Card -->
        <div class="card shadow-lg border-light">
            <div class="card-body">
                <!-- Form to Edit Category -->
                <form action="/admin/categories/edit/{{ $category->slug }}" method="POST">
                    @method('PUT')

                    @csrf
                    <!-- Category Name Input -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input id="name" name="name" type="text" class="form-control"
                            value="{{ $category->name }}" required />
                        <div id="categoryNameHelpBlock" class="form-text">
                            *Please make sure the category name is correct before editing it.
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-pencil-square"></i> Update
                        </button>
                        <a href="/admin/categories" role="button" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
