@extends('layouts.main-layout')
@section('content')

    <h1>TASK</h1>

    <h3>{{ $task->title }}</h3>
    <h3>{{ $task->description }}</h3>
    <h3>{{ $task->priority }}</h3>




    <h1>Task Typologies</h1>
    <ul>

        @foreach ($task->typologies as $typ)
            <li>
                <br>
                typology --> {{ $typ->name }}
                <br>

            </li>
        @endforeach
    </ul>

    <h1>Associated Employee</h1>

    <h4>{{ $task->employee->name }} {{ $task->employee->lastname }}</h4>


@endsection
