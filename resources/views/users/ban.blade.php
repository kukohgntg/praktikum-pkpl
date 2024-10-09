@extends('layouts.mainlayout')

@section('title', 'Ban User')

@section('content')

    <div class="text-center mb-4">
        <h1>Are you sure you want to ban this user "{{ $user->username }}"?</h1>
    </div>

    <div class="mt-3">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <!-- Form untuk banned user -->
            <form action="/admin/users/ban-confirm/{{ $user->slug }}" method="GET">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" class="form-control" value="{{ $user->username }}"
                        aria-label="{{ $user->username }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}"
                        aria-label="{{ $user->phone }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" name="address" type="text" class="form-control" value="{{ $user->address }}"
                        aria-label="{{ $user->address }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" name="status" type="text" class="form-control" value="{{ $user->status }}"
                        aria-label="{{ $user->status }}" disabled />
                </div>

                <div id="userNameHelpBlock" class="form-text">
                    *Please ensure user details before banning.
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger me-2">
                        <i class="bi bi-person-slash"></i> Confirm Banning
                    </button>
                    <a href="/admin/users" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
