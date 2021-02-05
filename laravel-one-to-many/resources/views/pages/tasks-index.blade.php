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
                    <form action="{{ route('tasks.edit', $task->id) }}" method="POST">
                        @method('GET')
                        @csrf
                        <input type="submit" value="EDIT">
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="DELETE">
                    </form>

                </li>
            @endforeach
        </ul>
    </div>
@endsection
