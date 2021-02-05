@extends('layouts.main-layout')
@section('content')
    <div class="container">
        <a href="{{ route('tasks.create') }}">CREATE TASK</a>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', $task->id) }}">
                        {{ $task->title }} --> {{ $task->employee->name }} {{ $task->employee->lastname }}

                    </a>
                    <a href="{{ route('tasks.edit', $task->id) }}">
                        EDIT
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
