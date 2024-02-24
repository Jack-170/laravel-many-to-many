@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">Edit Project:</h1>



    <div class="container">

        <form class="my-5" action="{{ route('project.update', $project -> id) }}" method="POST">

            @csrf
            @method('PUT')

            <label class="my-2" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$project->title }}">

            <br>
            <label class="my-2" for="type_id">Type</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"@if ($project->type_id == $type->id) selected @endif>{{ $type->name }}</option>
                @endforeach
            </select>

            <br>

            <b>Select project's technologies:</b>
            <br>

            @foreach ($technologies as $technology)


                <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $technology->id}}" value="{{$technology->id}}"
                @if ($project->technologies->contains($technology->id))
                    checked
                @endif>
                <label for="{{ 'technology_id_' . $technology->id}}">
                    {{$technology->name}}
                </label>
                <br>
            @endforeach

            <br>

            <input class="btn btn-secondary my-2" type="submit" value="EDIT">


        </form>

    </div>



@endsection
