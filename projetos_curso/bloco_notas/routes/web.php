<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get("/main", [MainController::class, "index"]);