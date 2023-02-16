@extends('layouts.main-layout')

@section('content')

    <h1>EDIT MOVIE</h1>
    <form method="POST" action="{{ route('movie.update', $movie) }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $movie -> name }}">
        <br>
        <label for="release_year">Year</label>
        <input type="number" name="release_year" value="{{ $movie -> release_year }}">
        <br>
        <label for="cash_out">Cash out</label>
        <input type="number" name="cash_out" value="{{ $movie -> cash_out }}">
        <br>
        <label for="genre_id">Genre</label>
        <select name="genre_id">
            @foreach ($genres as $genre)
                <option value="{{ $genre -> id }}"
                    @selected ($movie -> genre -> id == $genre -> id)
                >
                    {{ $genre -> name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>Tag</label>
        <br>
        @foreach ($tags as $tag)
            <input 
                type="checkbox" 
                name="tags_id[]" 
                value="{{ $tag -> id }}" 
                id="{{ $tag -> id }}"
                    @foreach ($movie -> tags as $movieTag)
                        @checked ($movieTag -> id == $tag -> id)
                    @endforeach
                >
            <label for="{{ $tag -> id }}">{{ $tag -> name }}</label>
            <br>
        @endforeach
        <input type="submit" value="UPDATE MOVIE ID: {{ $movie -> id }}">
    </form>

@endsection