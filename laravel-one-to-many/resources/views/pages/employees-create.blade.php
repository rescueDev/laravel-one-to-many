@extends('layouts.main-layout')
@section('content')

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="title">Name: </label>
        <input type="text" name="name">

        <br>

        <label for="description">Lastname: </label>
        <input type="text" name="lastname">

        <br>

        <label for="priority">Date of birth: </label>
        <input type="date" name="dateOfBirth">


        <br>
        <input type="submit" value="SAVE">

    </form>

@endsection
