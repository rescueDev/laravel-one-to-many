@extends('layouts.main-layout')
@section('content')
    <div class="container">
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="{{ route('tasks.show', $task->id) }}">
                        {{ $task->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
