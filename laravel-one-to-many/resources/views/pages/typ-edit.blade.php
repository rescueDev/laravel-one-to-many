@extends('layouts.main-layout')
@section('content')
    <form action="{{ route('typologies.update', $typology->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="title">Name: </label>
        <input value="{{ $typology->name }}" type="text" name="title">

        <br>

        <label for="description">Description: </label>
        <textarea name="description" id="" cols="30" rows="10">{{ $typology->description }}</textarea>

        <br>


        <label for="priority">Tasks: </label>

        <br>
        @foreach ($tasks as $task)

            <input type="checkbox" name="tasks[]" value="{{ $task->id }}">
            {{ $task->title }}
            <br>
        @endforeach




        <br>
        <input type="submit" value="UPDATE">

    </form>
@endsection
