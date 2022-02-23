<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use Illuminate\Http\Request;

class DicaController extends Controller
{
    protected $perPage = 15;
    public function index () {
        $dicas = Dica::orderByDesc('created_at')->paginate($this->perPage);

        return view('welcome', compact('dicas'));
    }

    public function filter(Request $request) {
        $dicas = Dica::orderByDesc('created_at')
        ->whereHas('veiculo', function($query) use($request){
            $query->where($request['coluna'], 'like', '%'.$request['pesquisar'].'%');
        })
        ->paginate($this->perPage);

        return view('welcome', compact('dicas'));
    }
}
