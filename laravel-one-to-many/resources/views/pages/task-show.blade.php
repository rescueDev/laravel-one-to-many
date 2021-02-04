@extends('layouts.main-layout')
@section('content')
    <h3>{{ $task->title }}</h3>
    <h3>{{ $task->description }}</h3>
    <h3>{{ $task->priority }}</h3>
@endsection
