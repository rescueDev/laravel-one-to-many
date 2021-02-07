@extends('layouts.main-layout')
@section('content')

    <div class="tasks-container">
        <ul>
            @foreach ($typologies as $typ)
                <li>
                    <a href="{{ route('typologies.show', $typ->id) }}">

                        {{ $typ->name }}

                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
