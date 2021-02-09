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

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Name: </label>
        <input value="{{ $employee->name }}" type="text" name="name">

        <br>

        <label for="description">Lastname: </label>
        <input value="{{ $employee->lastname }}" type="text" name="lastname">

        <br>

        <label for="priority">Date of birth: </label>
        <input value="{{ $employee->dateOfBirth }}" type="date" name="dateOfBirth">


        <br>
        <input type="submit" value="UPDATE">

    </form>

@endsection
