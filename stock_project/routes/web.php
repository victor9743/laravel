<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('dashboard');
});


Route::resources([
    'products' => ProductsController::class
]);