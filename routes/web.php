<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


//home
Route::get('/', [MainController :: class, 'home'])
    ->name('home');

//movie all
Route::get('/movie/all', [MainController :: class, 'movieAll'])
    ->name('movie.all');

//movie create
Route :: get('/movie/create', [MainController :: class, 'movieCreate'])
    -> name('movie.create');
Route :: post('/movie/create', [MainController :: class, 'movieStore'])
    -> name('movie.store');