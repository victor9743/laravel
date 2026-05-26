<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ao passar o ponto de interrogação, o valor do parametro de torna opcional
Route::get('/show-hash/{numchars?}', [MainController::class, 'showHash']);