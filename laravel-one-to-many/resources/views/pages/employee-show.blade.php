@extends('layouts.main-layout')
@section('content')
    <h1>Employee</h1>
    <br>
    <h4>{{ $employee->name }}</h4>
    <h4>{{ $employee->lastname }}</h4>
    <h4>{{ $employee->dateOfBirth }}</h4>
    <br>
    <h1>Tasks</h1>
    <br>
    <ul>

        @foreach ($employee->tasks as $ts)
            <li>
                <br>
                TASK: {{ $ts->title }}
            </li>

            <ul>

                @foreach ($ts->typologies as $typ)
                    <li>
                        typology: {{ $typ->name }}
                    </li>
                @endforeach
            </ul>
            <br>
        @endforeach
    </ul>
@endsection
