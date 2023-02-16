@extends('layouts.main-layout')

@section('content')

    <h1>Movies</h1>
    <a href="{{ route('movie.create') }}">CREATE NEW MOVIE</a>
    <ul>
        @foreach ($movies as $movie)
            <li>
                {{ $movie -> name }}
                - <a href="{{ route('movie.edit', $movie) }}">EDIT</a>
                - <a href="{{ route('movie.delete', $movie) }}">DELETE</a>
                <ul>
                    @foreach ($movie -> tags as $tag)
                        <li>{{ $tag -> name }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

@endsection