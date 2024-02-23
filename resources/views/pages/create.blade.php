@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')

    <h1 class="text-danger fw-bolder">New Project:</h1>



    <div class="container">

        <form class="my-5" action="{{ route('project.store') }}" method="POST">

            @csrf
            @method('POST')

            <label class="my-2" for="title">Title</label>
            <input type="text" name="title" id="title">

            <br>
            <label class="my-2" for="type_id">Type</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <br>

            <input class="btn btn-secondary my-2" type="submit" value="Create">


        </form>

    </div>



@endsection
