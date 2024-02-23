@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

<h1 class="text-danger fw-bolder ">Types</h1>


<div class="container">
    <ul>
        @foreach ($types as $type)
            <li>
                <p class="text-danger">{{ $type->name }}</p>
            </li>
        @endforeach
    </ul>
</div>


@endsection
