@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">Projects:</h1>

    <a class="btn btn-primary my-4" href="{{ route('project.create') }}">Create new Project</a>

    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title: <span class="text-danger">{{$project->title }}</span></h5>
                        <p class="card-text">Type: <span class="text-danger">{{$project->type->name}}</span></p>
                        <p class="card-text">Technologies: <span class="text-danger">
                            @foreach ($project->technologies as $technology )
                            {{$technology -> name}}
                            @endforeach</span>
                        </p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
