@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">New Project:</h1>



    <div class="container">

        <form class="my-5" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <label class="my-2" for="title">Title</label>
            <input type="text" name="title" id="title">

            <br>

            <label for="Image">Image</label>
            <input type="file" name="image" id="image">

            <br>
            <label class="my-2" for="type_id">Type</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <br>

            <b>Select project's technologies:</b>
            <br>

            @foreach ($technologies as $technology)


                <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $technology->id}}" value="{{$technology->id}}">
                <label for="{{ 'technology_id_' . $technology->id}}">
                    {{$technology->name}}
                </label>
                <br>
            @endforeach

            <br>

            <input class="btn btn-secondary my-2" type="submit" value="Create">


        </form>

    </div>



@endsection
