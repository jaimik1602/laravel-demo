@extends('layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
    <form action="{{ url('update-user', ['id' => $user->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            <small class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            <small class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <button type="submit" class="btn btn-primary" aria-expanded="false">Update</button>
        <a href="{{ url('users') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
