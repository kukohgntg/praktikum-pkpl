@extends('layouts.mainlayout')

@section('title', 'Restore Category')

@section('content')

    <!-- Text confirmation -->
    <h3 class="text-center mb-4">
        Are you sure you want to restore the category "{{ $category->name }}"?
    </h3>

    <div class="mt-3">
        <!-- Alert for errors -->
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
    </div>

    <div class="card mt-3 shadow-lg border-light">
        <div class="card-body">
            <!-- Disabled input for category name -->
            <form action="/admin/categories/restore-confirm/{{ $category->slug }}" method="GET">
                @csrf
                <fieldset disabled>
                    <label for="name" class="form-label">Category Name</label>
                    <input id="name" name="name" type="text" class="form-control bg-light mb-3"
                        value="{{ $category->name }}" disabled>
                    <div id="categoryNameHelpBlock" class="form-text text-muted">
                        *Please ensure the category name is correct before restoring it.
                    </div>
                </fieldset>

                <!-- Buttons to confirm or cancel -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Confirm Restore
                    </button>
                    <a href="/admin/categories/deleted" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
