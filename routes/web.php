<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
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

Route::get('/', function(){
    return view('telaLogin');
})->name('login');





Route::post('/', [UsersController::class, 'realizarLogin'])->name('realizar_login');


Route::middleware("auth")->group(function(){
    Route::post('/cadastro', [UsersController::class, 'cadastrar'])->name('cadastrar_usuario');
    Route::get('/listar', [UsersController::class, 'listarUsuarios']);
    Route::get('/listar/edit/{id}', [UsersController::class, 'edit']);
    Route::put('/listar/update/{id}', [UsersController::class, 'update'])->name('atualizar_usuario');
    Route::post('/home', [UsersController::class, 'logout'])->name('fazerLogout');
    Route::delete('/listar/delete/{id}', [UsersController::class, 'destroy'])->name('deletar_usuario');    
    Route::get('home', function(){
        return view ('home');
    });
    
    Route::get('/cadastro', fn() => view('cadastro'));    
});

