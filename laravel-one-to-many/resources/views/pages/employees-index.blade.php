@extends('layouts.main-layout')
@section('content')
    <div class="employees-container">
        <div class="button-container">
            <a href="{{ route('employees.create') }}">CREATE EMPLOYEE</a>

        </div>
        <ul>
            @foreach ($employees as $employee)
                <li>
                    <a href="{{ route('employees.show', $employee->id) }}">
                        {{ $employee->name }}
                        {{ $employee->lastname }}
                    </a>
                    <div class="forms-container">

                        <form class="edit-employee" action="{{ route('employees.edit', $employee->id) }}" method="POST">
                            @method('GET')
                            @csrf
                            <input type="submit" value="EDIT">
                        </form>
                        <form class="delete-employee" action="{{ route('employees.destroy', $employee->id) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="DELETE">
                        </form>
                    </div>
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
