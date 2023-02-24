@extends('layouts.app')
@section('title')
    Users
@endsection

@section('content')
     <a href="{{ url('create-user') }}">Create User</a>
@endsection
