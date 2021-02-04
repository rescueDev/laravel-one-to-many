@extends('layouts.main-layout')
@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="title">Title: </label>
        <input type="text" name="title">

        <br>

        <label for="description">Description: </label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>

        <br>

        <label for="priority">Priority: </label>
        <input type="number" name="priority">


        <label for="priority">Employee: </label>
        <select name="employee_id">
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">

                    {{ $employee->name }}

                </option>
            @endforeach

        </select>



        <br>
        <input type="submit" value="SAVE">

    </form>
@endsection
