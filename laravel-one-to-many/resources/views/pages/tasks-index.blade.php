@extends('layouts.main-layout')
@section('content')
    <div class="tasks-container">
        <a href="{{ route('tasks.create') }}">CREATE TASK</a>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', $task->id) }}">
                        {{ $task->title }} {{-- --> {{ $task->employee->name }} {{ $task->employee->lastname }} --}}

                    </a>
                    <div class="forms-container">

                        <form class="edit-task" action="{{ route('tasks.edit', $task->id) }}" method="POST">
                            @method('GET')
                            @csrf
                            <input type="submit" value="EDIT">
                        </form>
                        <form class="delete-task" action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="DELETE">
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
@endsection
