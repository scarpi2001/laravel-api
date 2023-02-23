<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

class ApiController extends Controller
{
    public function movieAll() {

        $movies = Movie :: with('genre', 'tags') -> get();
        $genres = Genre :: all();
        $tags = Tag :: all();

        return response() -> json([
            'success' => true,
            'response' => [
                'movies' => $movies,
                'genres' => $genres,
                'tags' => $tags,
            ]
        ]);
    }

    public function movieStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|min:3',
            'release_year' => 'required|integer|min:1800',
            'cash_out' => 'required|integer|min:0',
            'genre_id' => 'required|integer|min:1',
            'tags_id' => 'nullable|array'
        ]);

        $genre = Genre :: find($data['genre_id']);
        $movie = Movie :: make($data);

        $movie -> genre() -> associate($genre);
        $movie -> save();

        $tags = Tag :: find($data['tags_id']);
        $movie -> tags() -> sync($tags);

        return response() -> json([
            'success' => true,
            'response' => $movie,
        ]);

    }
}
