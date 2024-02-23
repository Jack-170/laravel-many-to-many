@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">Projects:</h1>
    <div class="container">
        <ul>
            @foreach ($projects as $project)
            <li>
                <h3 class="d-inline">Title: {{$project->title }}</h4>
                <h5>Type:<span class="text-danger">{{ $project->type->name }}</span></h5>
            </li>
        @endforeach
        </ul>
    </div>


@endsection
