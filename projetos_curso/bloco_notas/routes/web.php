<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

Route::get("/login", [AuthController::class, "login"]);
Route::post("/login", [AuthController::class, "login_submit"]);
Route::get("/logout", [AuthController::class, "logout"]);