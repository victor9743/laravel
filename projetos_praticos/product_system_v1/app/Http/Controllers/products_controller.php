<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class products_controller extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function new()
    {
        return view('products.new');
    }
}
