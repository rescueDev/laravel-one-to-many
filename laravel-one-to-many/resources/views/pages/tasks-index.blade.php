@extends('layouts.main-layout')
@section('content')
    <div class="container">
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <a href="">
                        {{ $task->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
