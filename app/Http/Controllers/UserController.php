<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function signUpGet () {
        return view('user.signup-user');
    }

    public function signUpPost (Request $request) {
        $validation = $this->validationUser($request->all());

        if ($validation->fails()){
             throw ValidationException::withMessages($validation->errors()->messages());
        }

        $user = User::create([
            'name' => $request['name'],
            'login' => $request['login'],
            'password' => bcrypt($request['password']),
        ]);

        Session::put('id', $user->id);
        Session::put('user', $user);

        return redirect('/');

    }

    private function validationUser ($data) {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'login' => 'required|unique:user|max:255',
            'password' => 'required|confirmed|max:255',
            'password_confirmation' => 'required|max:255',
        ], [
            'name.required' => 'Campo obrigatório',
            'name.max' => 'Limite de caracteres atigindo',
            'login.required' => 'Campo obrigatório',
            'login.max' => 'Limite de caracteres atigindo',
            'login.unique' => 'Login já cadastrado',
            'password.required' => 'Campo obrigatório',
            'password.confirmed' => 'Senhas não correspodem',
            'password.max' => 'Limite de caracteres atigindo',
            'password_confirmation.required' => 'Campo obrigatório',
            'password_confirmation.max' => 'Limite de caracteres atigindo',
        ]);
    }
}
