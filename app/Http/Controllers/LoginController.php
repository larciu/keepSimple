<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index () {
        return view('login');
    }

    public function login (Request $request){
        $validation = $this->validationLogin($request->all());

        if ($validation->fails()){
            throw ValidationException::withMessages($validation->errors()->messages());
        }

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

        Session::put('user', $user);
        Session::put('id', $user->id);

        return redirect('/');
    }

    private function validationLogin ($data) {
        return Validator::make($data, [
            'login' => 'required',
            'password' => 'required'
        ],[
            'login.required' => 'Campo obrigatório',
            'password.required' => 'Campo obrigatório'
        ]);
    }
}
