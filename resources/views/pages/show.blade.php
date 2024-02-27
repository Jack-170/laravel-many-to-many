@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

<h1 class="text-danger fw-bolder pb-5">Project Details:</h1>

<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('storage/' . $project->image)}}" alt="Project Image" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Title: <span class="text-danger">{{$project->title }}</span></h5>
          <p class="card-text">Technologies: <span class="text-danger">
            @foreach ($project->technologies as $technology )
            {{$technology -> name}}
            @endforeach</span>
          </p>
          <p class="card-text">Type: <span class="text-danger">{{$project->type->name}}</span></p>
          <a class="btn btn-primary btn-sm" href="{{ route('project.edit', $project->id) }}">EDIT</a>
        </div>
    </div>

</div>



@endsection
