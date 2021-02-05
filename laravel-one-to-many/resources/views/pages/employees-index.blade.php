@extends('layouts.main-layout')
@section('content')
    <div class="container">
        <a href="{{ route('employees.create') }}">CREATE TASK</a>
        <ul>
            @foreach ($employees as $employee)
                <li>
                    <a href="{{ route('employees.show', $employee->id) }}">
                        {{ $employee->name }}
                        {{ $employee->lastname }}
                    </a>
                    <ul>
                        @foreach ($employee->tasks as $task)
                            <li>
                                {{ $task->title }}
                                ({{ $task->employee->name }})
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
