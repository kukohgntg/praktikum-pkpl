@extends('layouts.mainlayout')

@section('title', 'Edit Book')

@section('content')

<h1>Edit Book</h1>
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

    <div class="row">
        <!-- Card untuk gambar -->
        <div class="col-md-2">
            <div class="card text-center" style="width: 100%;">
                <div class="card-header">
                    Current Image
                    {{-- <h5 class="card-title">Current Image</h5> --}}
                </div>
                @if ($book->cover != '')
                <img class="card-img-bottom" src="{{ asset('storage/cover/' . $book->cover) }}" alt="">
                @else
                <img class="card-img-bottom" src="{{ asset('images/cover-not-available.png') }}" alt="">
                @endif
            </div>
        </div>

        <!-- Form untuk edit buku -->
        <div class="col-md-10">
            <form action="/editing-book/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="mb-3">
                    <label for="book_code" class="form-label">Book Code</label>
                    <input id="book_code" name="book_code" type="text" class="form-control"
                        placeholder="Insert book code here" value="{{ $book->book_code }}" />
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input id="title" name="title" type="text" class="form-control"
                        placeholder="Insert title here" value="{{ $book->title }}" />
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Cover</label>
                    <input id="image" name="image" type="file" class="form-control"
                        placeholder="Insert cover here" />
                    <div id="coverHelpBlock" class="form-text">
                        *Pastikan ukuran gambar tidak lebih dari 1 MB
                    </div>
                </div>

                <div class="mb-3">
                    <label for="currentCategories" class="form-label">Current Categories</label>
                    <input class="form-control" type="text"
                        placeholder="{{ $book->categories->pluck('name')->implode(', ') }}"
                        aria-label="Disabled input example" disabled>
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label">Categories</label>
                    <select id="categories" name="categories[]" class="form-select "
                        multiple="multiple" aria-label="Multiple select example">
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection