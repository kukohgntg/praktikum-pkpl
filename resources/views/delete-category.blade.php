@extends('layouts.mainlayout') @section('title', 'Delete Category')
@section('content')
<h1>Are you sure to delete {{ $category->name }} category</h1>
<div class="mt-3">
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/deleted-category/{{ $category->slug }}" method="GET">
        @csrf
        <label for="name" class="visually-hidden">Category Name</label>
        <input id="name" name="name" type="text" class="form-control" placeholder="{{ $category->name }}"
            aria-label="{{ $category->name }}" disabled />
        <div id="categoryNameHelpBlock" class="form-text">
            *Pastikan nama kategori terlebih dahulu
        </div>
        <div class="d-flex justify-content-end">
            <!-- Tombol Confirm Delete -->
            <button type="submit" class="btn btn-primary">
                Confirm Delete
            </button>
            <!-- Tombol Cancel dengan margin-start 3 -->
            <a href="" class="btn btn-secondary ms-3">Cancel</a>
        </div>
    </form>
</div>


@endsection
