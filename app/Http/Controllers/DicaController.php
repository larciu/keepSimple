<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DicaController extends Controller
{
    protected $perPage = 15;
    public function index()
    {
        $dicas = Dica::orderByDesc('created_at')->paginate($this->perPage);
        return view('welcome', compact('dicas'));
    }

    public function indexAuth()
    {
        $user_id = Session::get('id');
        $dicas = Dica::orderByDesc('created_at')->where('user_id', $user_id)
            ->paginate($this->perPage);
        return view('clue.index-clue', compact('dicas'));
    }

    public function filter(Request $request)
    {
        $dicas = Dica::orderByDesc('created_at')
            ->whereHas('veiculo', function ($query) use ($request) {
                $query->where($request['coluna'], 'like', '%' . $request['pesquisar'] . '%');
            })
            ->paginate($this->perPage);

        return view('welcome', compact('dicas'));
    }

    public function signUpGet()
    {
        $veiculos = Veiculo::all();
        return view('clue.signup-clue', compact('veiculos'));
    }

    public function signUpPost(Request $request)
    {
        $validation = $this->validationClue($request->all());

        if ($validation->fails()) {
            throw ValidationException::withMessages($validation->errors()->messages());
        }

        Dica::create([
            'veiculo_id' => $request['veiculo_id'],
            'descricao' => $request['descricao'],
            'user_id' => Session::get('id'),
        ]);

        return redirect('/');
    }

    public function editUpGet($id)
    {
        $dica = Dica::find($id);
        $veiculos = Veiculo::where('id', '<>', $dica->veiculo->id)->get();
        return view('clue.edit-clue', compact('veiculos', 'dica'));
    }

    public function editUpUpdate(Request $request, $id)
    {
        $validation = $this->validationClue($request->all());

        if ($validation->fails()) {
            throw ValidationException::withMessages($validation->errors()->messages());
        }

        Dica::where('id', $id)->update([
            'veiculo_id' => $request['veiculo_id'],
            'descricao' => $request['descricao'],
            'user_id' => Session::get('id'),
        ]);

        return redirect('/');
    }

    public function deleteClue($id)
    {
        Dica::where('id', $id)
            ->delete();
    }

    private function validationClue($data)
    {
        return Validator::make($data, [
            'veiculo_id' => 'required',
            'descricao' => 'required|max:5000',
        ], [
            'veiculo_id.required' => 'Campo obrigatório',
            'descricao.required' => 'Campo obrigatório',
            'descricao.max' => 'Limite de caracteres atigindo',
        ]);
    }
}
