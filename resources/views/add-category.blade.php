@extends('layouts.mainlayout')

@section('title', 'Add Category')


@section('content')
    <h1>Add New Category</h1>
    <div>
        <label for="categoryName" class="form-label">Category Name</label>
        <input id="categoryName" name="categoryName" type="text" class="form-control" placeholder="Add Your Category Name Here">
        <div id="categoryNameHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special
            characters, or emoji.
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mb-3 ">Save</button>
        </div>

    </div>

@endsection
