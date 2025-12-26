<?php

use App\Http\Controllers\products_controller;
use Illuminate\Support\Facades\Route;

Route::get('/products', [products_controller::class, 'index'])->name('products_index');
Route::get('/products/new', [products_controller::class, 'new'])->name('products_new');
Route::post('/products/save', [products_controller::class, 'save'])->name('products_save');
Route::get('/products/show/{id}', [products_controller::class, 'show'])->name('products_show');
Route::delete('/products/delete', [products_controller::class, 'delete'])->name('products_delete');