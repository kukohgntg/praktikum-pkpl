@extends('layouts.mainlayout')

@section('title', 'Lend Book')

@section('content')

    <h1>Halaman Lend Book</h1>

    <form action="" class="mt-5">
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <select id="username" name="username" class="form-select ">

                <option value="" selected disabled>Choose username</option>

                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <select id="title" name="title" class="form-select ">

                <option value="" selected disabled>Choose title</option>

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
