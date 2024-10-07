@extends('layouts.mainlayout')

@section('title', 'Ban User')

@section('content')
    <h1>Are you sure to ban {{ $user->username }}</h1>
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

        <!-- Form untuk hapus buku -->
        <div class="">
            <form action="/admin/users/ban-confirm/{{ $user->slug }}" method="GET">
                @csrf
                <label for="username" class="form-label">Username</label>
                <input id="username" name="username" type="text" class="form-control" placeholder="{{ $user->username }}"
                    aria-label="{{ $user->username }}" disabled />

                <label for="phone" class="form-label">Phone</label>
                <input id="phone" name="phone" type="text" class="form-control" placeholder="{{ $user->phone }}"
                    aria-label="{{ $user->phone }}" disabled />

                <label for="address" class="form-label">Address</label>
                <input id="address" name="address" type="text" class="form-control" placeholder="{{ $user->address }}"
                    aria-label="{{ $user->address }}" disabled />

                <label for="status" class="form-label">Status</label>
                <input id="status" name="status" type="text" class="form-control" placeholder="{{ $user->status }}"
                    aria-label="{{ $user->status }}" disabled />
                <div id="userNameHelpBlock" class="form-text">
                    *Pastikan nama terlebih dahulu
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Confirm Banning</button>
                    <a href="/admin/users" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

    </div>


@endsection
