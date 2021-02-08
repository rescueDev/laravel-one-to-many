@extends('layouts.main-layout')
@section('content')

    <h1>TIPOLOGY</h1>

    <h3>Name: {{ $typology->name }}</h3>
    <h3>Description: {{ $typology->description }}</h3>
    <br>
    <h1>Associated tasks:</h1>
    <ul>

        @foreach ($typology->tasks as $ts)
            <li>
                {{ $ts->title }}
            </li>
        @endforeach
    </ul>

@endsection
