@extends('layouts.mainlayout')
@section('title', 'Edit Category')
@section('content')
<h1>Edit Category</h1>
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
    <form action="/edit-category/{{ $category->slug }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <label for="name" class="form-label">Category Name</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ $category->name }}" />
        <div id="categoryNameHelpBlock" class="form-text">
            *Pastikan nama kategori tidak sama
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </div>
    </form>
</div>

@endsection