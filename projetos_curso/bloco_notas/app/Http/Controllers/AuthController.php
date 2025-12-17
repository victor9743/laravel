<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // get user by username
        $user = User::where('username', $username)
                ->where('deleted_at', NULL)
                ->first();

        // check if username exists     
        if (!$user) {
            return  redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username ou Password Inválidos');
        }

        // check if password is correct
        if (!password_verify($password, $user->password)){
            return redirect()
            ->back()
            ->withInput()
            ->with('loginError', 'Username ou Password Inválidos');
        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // setting session user login
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username                                                                                                  
            ]
        ]);

        return redirect('/');
        
    }

    public function logout()
    {
        // Limpar dados da sesssão
        session()->forget('user');

        return redirect()->to('/login');
    }
}
