@extends('layouts.mainlayout')
@section('title', 'Add Book')
@section('content')
<h1>Add New Book</h1>
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
    <form action="/admin/books/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="book_code" class="form-label">book_code</label>
            <input id="book_code" name="book_code" type="text" class="form-control" placeholder="Insert book_code Here"
                value="{{ old('book_code') }}" />
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input id="title" name="title" type="text" class="form-control" placeholder="Insert title Here"
                value="{{ old('title') }}" />
        </div>

        <div class="mb-3">
            {{-- cover==image --}}
            <label for="image" class="form-label">cover</label>
            <input id="image" name="image" type="file" class="form-control" placeholder="Insert cover Here" />
            <div id="coverHelpBlock" class="form-text">
                *Pastikan ukuran gambar tidak lebih dari 1 mb
            </div>
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">kategori</label>
            <select id="categories" name="categories[]" class="form-select form-select-multiple"
                multiple="multiple" aria-label="Multiple select example">
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Save</button>
            <a href="/admin/books" role="button" class="btn btn-secondary">Cancel</a>
        </div>


    </form>
</div>

@endsection