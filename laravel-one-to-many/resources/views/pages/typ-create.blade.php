@extends('layouts.main-layout')
@section('content')
    <form action="{{ route('typologies.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="title">Name: </label>
        <input type="text" name="name">

        <br>

        <label for="description">Description: </label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>

        <br>
        <br>


        @foreach ($tasks as $task)
            <input type="checkbox" name="tasks[]" value="{{ $task->id }}">
            {{ $task->title }}
            <br>
        @endforeach

        <br>

        <br>
        <input type="submit" value="SAVE">

    </form>
@endsection
