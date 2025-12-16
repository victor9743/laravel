<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function login_submit(Request $request)
    {
        // form_validation
        $request->validate(
            // rules
            [
                'username' => ['required', 'email'],
                'password' => ['required', 'min:6', 'max:16']
            ],
            // errors messages
            [
                'username.required' => "O campo username é obrigatório",
                'username.email' => "O username deve ser um email",
                'password.required' => "O campo password é obrigatório",
                'password.min' => "O campo password deve ter no minímo :min caracteres",
                'password.max' => "O campo password deve ter no máximo :max caracteres"

            ]
        );


        $username = $request->username;
        $password = $request->password;


        // test database connection
        try {
            DB::connection()->getPdo();

            echo 'connection ok';
        } catch (\PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }

    public function logout()
    {
        echo "Logout";
    }
}
