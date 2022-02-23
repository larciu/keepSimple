<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index () {
        return view('login');
    }

    public function login (Request $request){
        $user = User::where('login', $request['login'])
                    ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'login' => 'Usuário não encontrado'
            ]);
        }

        if (!Hash::check($request['password'], $user->password)){
            throw ValidationException::withMessages([
                'password' => 'Senha inválida'
            ]);
        }
    }
}
