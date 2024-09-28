@extends('layouts.mainlayout')
@section('title', 'Delete Book')

@section('content')
    <h1>Are you sure to delete {{ $book->title }} book</h1>
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

            <!-- Form untuk hapus buku -->
            <div class="col-md-10">
                <form action="/deleting-book/{{ $book->slug }}" method="GET">
                    @csrf

                    <div class="mb-3">
                        <label for="book_code" class="form-label">Book Id</label>
                        <input id="book_code" name="book_code" type="text" class="form-control"
                            placeholder="{{ $book->book_code }}" aria-label="{{ $book->book_code }}" disabled />
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Book Title</label>
                        <input id="title" name="title" type="text" class="form-control"
                            placeholder="{{ $book->title }}" aria-label="{{ $book->title }}" disabled />
                        <div id="bookNameHelpBlock" class="form-text">
                            *Pastikan buku terlebih dahulu
                        </div>
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
        </div>

    </div>


@endsection
