<?php

namespace App\Services;

class MainOperations
{
    public static function generateHash($number_chars = 32)
    {
        // retorna uma hash de 32 caracteres por padrão - Letras e números
        return bin2hex(random_bytes((int) $number_chars / 2));
    }
}