@extends('layouts.main-layout')

@section('content')

    <h1>Movies</h1>
    <a href="{{ route('movie.create') }}">CREATE NEW MOVIE</a>
    @foreach ($genres as $genre)
        <h3>
            GENRE: {{ $genre -> name }}
            <ul>
                @foreach ($genre -> movies as $movie)
                    <li>
                        MOVIE: {{ $movie -> name }}
                        - <a href="{{ route('movie.edit', $movie) }}">EDIT</a>
                        - <a href="{{ route('movie.delete', $movie) }}">DELETE</a>
                        <ul>
                            @foreach ($movie -> tags as $tag)
                                <li>Movie Tags: {{ $tag -> name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </h3>        
    @endforeach

@endsection