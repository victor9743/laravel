<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainOperations;

class MainController extends Controller
{
    public function index(): string
    {
        return "Olá Mundo";
    }

    public function showHash($numchars = 32): void
    {
        echo "<p>Tamanho padrão: " . MainOperations::generateHash($numchars) . "</p>";
    }
}
