@extends('layouts.main-layout')
@section('content')

    <div class="tasks-container">
        <a href="{{ route('typologies.create') }}">CREATE TYPOLOGY</a>
        <ul>
            @foreach ($typologies as $typ)
                <li>
                    <a href="{{ route('typologies.show', $typ->id) }}">

                        {{ $typ->name }}

                    </a>
                    <div class="forms-container">

                        <form class="edit-typologies" action="{{ route('typologies.edit', $typ->id) }}" method="POST">
                            @method('GET')
                            @csrf
                            <input type="submit" value="EDIT">
                        </form>
                        <form class="delete-typologies" action="" method="POST">
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
