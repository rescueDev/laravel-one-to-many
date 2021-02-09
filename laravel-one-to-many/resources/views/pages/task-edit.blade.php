@extends('layouts.main-layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="title">Title: </label>
        <input value="{{ $task->title }}" type="text" name="title">

        <br>

        <label for="description">Description: </label>
        <textarea name="description" id="" cols="30" rows="10">{{ $task->description }}</textarea>

        <br>

        <label for="priority">Priority: </label>
        <input value="{{ $task->priority }}" type="number" name="priority">


        <label for="priority">Employee: </label>
        <select name="employee_id">
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" @if ($task->employee->id == $employee->id) {
                                        
                                            selected } @endif>

                    {{ $employee->name }}


                </option>
            @endforeach

        </select>
        <br>
        @foreach ($typologies as $typ)

            <input type="checkbox" name="typologies[]" value="{{ $typ->id }}" @if ($task->typologies->contains($typ->id)) checked @endif>
            {{ $typ->name }}
            <br>
        @endforeach




        <br>
        <input type="submit" value="UPDATE">

    </form>
@endsection
