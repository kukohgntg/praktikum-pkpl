@extends('layouts.mainlayout')

@section('title', 'Add Category')


@section('content')
    <h1>Add New Category</h1>
    <div>
        <form action="save-category" method="POST">
            @csrf
            <label for="categoryName" class="form-label">Category Name</label>
            <input id="categoryName" name="name" type="text" class="form-control" placeholder="Insert Category Name Here">
            <div id="categoryNameHelpBlock" class="form-text">
                Pastikan nama kategori belum ada
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-3 ">Save</button>
            </div>
        </form>
    </div>

@endsection
