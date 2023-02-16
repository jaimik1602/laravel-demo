@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <h5 class="text-success">this is extended Users file</h5>
   

    @php
        echo 'this is core php';
        $number = 1;
    @endphp

    {{-- if else --}}
    @if ($number == 0)
        yes
    @else
        no
    @endif

    {{-- loops --}}
    @for ($i = 0; $i < 10; $i++)
        {{ $i }}
    @endfor
@endsection
