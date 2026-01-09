<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        $data = [
            'value4' => "valor 4"
        ];

        return view('home')->with($data);
    }

    public function showClients(): View
    {
        $clients = [
            ["id" => 1, "name" => "CLiente 1", "phone" => "12345dfdf78"],
            ["id" => 2,"name" => "CLiente 2", "phone" => "123456sdf72"],
            ["id" => 3,"name" => "CLiente 3", "phone" => "12345dfs674"],
            ["id" => 4,"name" => "CLiente 4", "phone" => "12345sdf671"],
            ["id" => 5,"name" => "CLiente 5", "phone" => "123fsd45678"],
        ];
        return view("clients", compact('clients'));
    }
}
