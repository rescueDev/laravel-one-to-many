@extends('layouts.main-layout')
@section('content')
    <h3>{{ $employee->name }}</h3>
    <h3>{{ $employee->lastname }}</h3>
    <h3>{{ $employee->dateOfBirth }}</h3>
@endsection
