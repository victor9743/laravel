<?php

namespace App\Services;

class MainOperations
{
    public static function generateHash($number_chars = 32)
    {
        // retorna uma hash de 32 caracteres por padrão - Letras e números
        return bin2hex(random_bytes((int) $number_chars / 2));
    }

    public static function mathOperation($x, $y, $operation): int|float|null
    {
        switch($operation) {
            case 'add':
                return $x + $y;
            break;
            case 'subtract':
                return $x - $y;
            break;
            case 'multiply':
                return $x * $y;
            break;
            case 'divide':
                return $x / $y;
            break;
            default:
                return null;
            break;

        }
    }
}