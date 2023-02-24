@extends('layouts.app')

@section('title')
    Create User
@endsection

@section('content')
    <form action="{{ url('create-user') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            <small class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email">
            <small class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            <small class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <button type="submit" class="btn btn-primary " aria-expanded="false">Submit</button>
    </form>
@endsection
