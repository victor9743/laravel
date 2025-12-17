<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;

// auth routes
Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get("/login", [AuthController::class, "login"]);
    Route::post("/login", [AuthController::class, "login_submit"]);
});

Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get("/", [MainController::class, 'index'])->name('home');
    Route::get("/new", [MainController::class, 'new'])->name('new');
    Route::post("/save", [MainController::class, 'save'])->name('save');
    Route::get("/edit/{id}", [MainController::class, 'edit'])->name('edit');
    Route::put("/update", [MainController::class, 'update'])->name('update');
    Route::delete("/delete/{id}", [MainController::class, 'delete'])->name('delete');
    Route::get("/logout", [AuthController::class, "logout"])->name('logout');
});
