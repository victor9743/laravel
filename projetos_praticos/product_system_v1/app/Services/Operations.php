<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations 
{
    public static function check_decrypt($id)
    {
        try {
            $id = Crypt::decrypt($id);
            return $id;
        } catch (DecryptException $th) {
            return null;
        }
    }
}