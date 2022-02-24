<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VeiculoController extends Controller
{
    public function signUpGet()
    {
        return view('vehicle.signup-vehicle');
    }

    public function signUpPost(Request $request)
    {
        $validation = $this->validationUser($request->all());

        if ($validation->fails()) {
            throw ValidationException::withMessages($validation->errors()->messages());
        }

        Veiculo::create([
            'marca' => $request['marca'],
            'modelo' => $request['modelo'],
            'tipo' => $request['tipo'],
            'versao' => $request['versao'],
        ]);

        return redirect('/');
    }

    private function validationUser($data)
    {
        return Validator::make($data, [
            'marca' => 'required|max:255',
            'tipo' => 'required|max:255',
            'modelo' => 'required|max:255',
        ], [
            'marca.required' => 'Campo obrigatório',
            'marca.max' => 'Limite de caracteres atigindo',
            'tipo.required' => 'Campo obrigatório',
            'tipo.max' => 'Limite de caracteres atigindo',
            'modelo.required' => 'Campo obrigatório',
            'modelo.max' => 'Limite de caracteres atigindo',
        ]);
    }
}
