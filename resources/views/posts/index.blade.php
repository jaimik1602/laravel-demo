@extends('layouts.app')
@section('title')
    Posts
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <form id="createPostForm" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="test" class="form-control" id="name" name="name" placeholder="Enter Name">
                    <label for="name">Name</label>
                </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3 mt-2">
                <input class="form-control" type="file" name="file" id="image">
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary mt-2">Create</button>
            <button type="reset" class="btn btn-warning mt-2">Reset</button>
        </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody id="posts">

        </tbody>
    </table>
@endsection
