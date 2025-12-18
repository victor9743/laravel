<?php

use App\Http\Controllers\products_controller;
use Illuminate\Support\Facades\Route;

Route::get('/products', [products_controller::class, 'index'])->name('products_index');
Route::get('/products/new', [products_controller::class, 'new'])->name('products_new');