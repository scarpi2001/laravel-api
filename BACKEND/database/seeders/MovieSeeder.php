<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Tag;
use App\Models\Movie;
use App\Models\Genre;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Movie :: factory() -> count(100) -> make() -> each(function($movie) {

            // FK
            $genre = Genre :: inRandomOrder() -> first();
            $movie -> genre() -> associate($genre);

            $movie -> save();

            // NaM
            $tags = Tag :: inRandomOrder() -> limit(rand(1, 5)) -> get();
            $movie -> tags() -> sync($tags);
        });
    }
}
