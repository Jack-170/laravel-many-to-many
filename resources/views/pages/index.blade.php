@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

<h1 class="text-danger fw-bolder">Projects:</h1>

<a class="btn btn-primary my-4" href="{{ route('project.create') }}">Create new Project</a>

<div class="container">
    <ol class="list-group list-group-numbered">
        @foreach ($projects as $project)
            <li class="list-group-item">
                <a href="{{ route('project.show', $project->id) }}" class="text-danger">{{$project->title }}</a>
            </li>
        @endforeach
    </ol>
</div>

@endsection
