@extends('layouts.mainlayout')

@section('title', 'Restore Book')

@section('content')
<h1>Are you sure to restore book</h1>
{{-- <h1>Are you sure to delete {{ $book->name }} book</h1> --}}
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
    <form action="/restoring-book/{{ $book->slug }}" method="GET">
        @csrf
        <label for="title" class="visually-hidden">Book Title</label>
        <input id="title" name="title" type="text" class="form-control" placeholder="{{ $book->title }}"
            aria-label="{{ $book->slug }}" disabled />
        <div id="bookTitleHelpBlock" class="form-text">
            *Pastikan buku terlebih dahulu
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">
                Confirm Restore
            </button>
            <a href="/deleted-books" role="button" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>


@endsection