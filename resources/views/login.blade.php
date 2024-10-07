@extends('layouts.mainlayout')

@section('title', 'Login')

@section('content')

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <form class="border p-4 rounded shadow" style="width: 400px;" method="POST" action="/auth/authenticating">
            @csrf
            <h3 class="text-center">Login</h3>

            @if (session('status'))
                <div class="alert alert-danger">
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
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-3">
                <span>Don't have an account?
                    <a href="/auth/register">Register</a>
                </span>
            </div>
        </form>
    </div>

@endsection
