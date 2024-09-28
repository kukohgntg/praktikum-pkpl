@extends('layouts.mainlayout')
@section('title', 'Add Category')
@section('content')
<h1>Add New Category</h1>
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
    <form action="adding-category" method="POST">
        @csrf
        <label for="name" class="form-label">Category Name</label>
        <input id="name" name="name" type="text" class="form-control" placeholder="Insert Category Name Here" />
        <div id="categoryNameHelpBlock" class="form-text">
            *Pastikan nama kategori belum ada
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-3">Save</button>
        </div>
    </form>
</div>

@endsection