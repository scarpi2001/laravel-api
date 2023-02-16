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

//movie edit 
Route :: get('/movie/edit/{movie}', [MainController :: class, 'movieEdit'])
    -> name('movie.edit');
Route :: post('/movie/edit/{movie}', [MainController :: class, 'movieUpdate'])
    -> name('movie.update');

//movie delete
Route :: get('/movie/delete/{movie}', [MainController :: class, 'movieDelete'])
    ->name('movie.delete');

    
//MOVIE API
use App\Http\Controllers\ApiController;

Route :: get('/api/v1/movie/all', [ApiController :: class, 'movieAll']);