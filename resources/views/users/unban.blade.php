@extends('layouts.mainlayout')

@section('title', 'Restore Book')

@section('content')

    <div class="text-center mb-4">
        <h1>Are you sure you want to unban this user "{{ $user->username }}"?</h1>
    </div>

    <div class="card shadow mt-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/users/unban-confirm/{{ $user->slug }}" method="GET">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" class="form-control"
                        placeholder="{{ $user->username }}" aria-label="{{ $user->username }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" name="phone" type="text" class="form-control"
                        placeholder="{{ $user->phone }}" aria-label="{{ $user->phone }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" name="address" type="text" class="form-control"
                        placeholder="{{ $user->address }}" aria-label="{{ $user->address }}" disabled />
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input id="status" name="status" type="text" class="form-control"
                        placeholder="{{ $user->status }}" aria-label="{{ $user->status }}" disabled />
                </div>

                <div id="userNameHelpBlock" class="form-text">
                    *Please ensure user details before unbanning.
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-warning me-2">
                        <i class="bi bi-arrow-counterclockwise"></i> Confirm
                        Unbanning
                    </button>
                    <a href="/admin/users/banned" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
