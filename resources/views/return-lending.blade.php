@extends('layouts.mainlayout')

@section('title', 'Return Lending')

@section('content')

    <h1>Halaman Return Lending</h1>

    <div class="mt-3">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form action="/admin/lend/return" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Username</label>
            <select id="user_id" name="user_id" class="form-select form-select-single">

                <option value="" selected disabled>Choose Username</option>

                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">title</label>
            <select id="book_id" name="book_id" class="form-select form-select-single">

                <option value="" selected disabled>Choose Book Title</option>

                @foreach ($books as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>

        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-3">Save</button>
        </div>


    </form>


@endsection
