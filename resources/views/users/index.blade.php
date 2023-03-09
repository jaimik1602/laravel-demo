@extends('layouts.app')
@section('title')
    Users
@endsection

@section('content')
    <a href="{{ url('create-user') }}" class="btn btn-primary">Create User</a>
    <button id="fetchData">Fetch Data</button>
    <div class="records"></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td> {{ $user->id }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td> <img src="{{$user->image}}" style="height: 40px; width: 70px;" alt=""></td>
                    <td> <a href="{{ url('edit-user', ['id' => $user->id]) }}" class="btn btn-success">Edit</a> </td>
                    <td> <a href="{{ url('delete-user', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
