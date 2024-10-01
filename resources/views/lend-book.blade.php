@extends('layouts.mainlayout')

@section('title', 'Lend Book')

@section('content')

    <h1>Halaman Lend Book</h1>

    <form action="lending-book" method="POST" class="mt-5">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Username</label>
            <select id="user_id" name="user_id" class="form-select ">

                <option value="" selected disabled>Choose Username</option>

                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">title</label>
            <select id="book_id" name="book_id" class="form-select ">

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
