<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use Illuminate\Http\Request;

class DicaController extends Controller
{
    public function index () {
        $dicas = Dica::orderBy('created_at')->paginate(2);

        return view('welcome', compact('dicas'));
    }
}
