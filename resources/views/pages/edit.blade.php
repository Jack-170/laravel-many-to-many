@extends('layouts.main-layout')
@section('head')
    <title>Edit Project</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">Edit Project:</h1>

    <div class="container">
        <form class="my-5" action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <label class="my-2" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}">
            <br>


            @if($project->image)
                <div>
                    <label for="current_image">Current Image:</label><br>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                </div>
                <br>
            @endif


            <label for="image">New Image:</label>
            <input type="file" name="image" id="image">
            <br>

            <label class="my-2" for="type_id">Type</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            <br>


            <b>Select project's technologies:</b>
            <br>
            @foreach ($technologies as $technology)
                <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $technology->id}}" value="{{$technology->id}}" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                <label for="{{ 'technology_id_' . $technology->id}}">
                    {{$technology->name}}
                </label>
                <br>
            @endforeach
            <br>

            <input class="btn btn-secondary my-2" type="submit" value="Update">
        </form>
    </div>

@endsection
