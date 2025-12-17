<?php

namespace App\Services;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Operations
{
    public static function check_decrypt($id)
    {
        // decrypt id from request
        try {
            $id = Crypt::decrypt($id);
            return $id;
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }
    }
}