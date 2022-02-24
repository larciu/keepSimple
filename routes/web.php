<?php

use App\Http\Controllers\DicaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'unauthenticated', 'prefix' => ''], function () {
    Route::get('/', [DicaController::class, 'index']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/sair', [LoginController::class, 'sair']);
    Route::get('/filter', [DicaController::class, 'filter']);
    Route::get('/cadastro-usuario', [UserController::class, 'signUpGet']);
    Route::post('/cadastro-usuario', [UserController::class, 'signUpPost']);
});



Route::group(['middleware' => 'authenticated', 'prefix' => ''], function () {
    Route::get('/home', [DicaController::class, 'indexAuth']);
    Route::get('/cadastro-veiculo', [VeiculoController::class, 'signUpGet']);
    Route::post('/cadastro-veiculo', [VeiculoController::class, 'signUpPost']);
    Route::get('/cadastro-dica', [DicaController::class, 'signUpGet']);
    Route::post('/cadastro-dica', [DicaController::class, 'signUpPost']);
    Route::get('/editar-dica/{edit}', [DicaController::class, 'editUpGet']);
    Route::put('/editar-dica/{edit}', [DicaController::class, 'editUpUpdate']);
    Route::delete('/deletar-dica/{edit}', [DicaController::class, 'deleteClue']);
});
