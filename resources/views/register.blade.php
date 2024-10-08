@extends('layouts.mainlayout')

@section('title', 'Register')

@section('content')

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <form class="border p-4 rounded shadow" style="width: 400px;" method="POST" action="/auth/registering">
            @csrf
            <h3 class="text-center">Register</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
            <div class="text-center mt-3">
                <span>Already have an account?
                    <a href="/auth/login">Login</a>
                </span>
            </div>
        </form>
    </div>

@endsection
