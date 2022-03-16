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

Route::get('home', function(){
    return view ('home');
})->middleware('auth');

Route::get('/cadastro', function(){
    return view('cadastro');
});

// Route::get('/listar', function(){
//     return view('listarUsuario');
// })->name('listar');



// Route::post('/cadastro', [UsersController:class, 'cadastrar'])->name('cadastrar_usuario');
Route::post('/cadastro', [UsersController::class, 'cadastrar'])->name('cadastrar_usuario');
Route::post('/', [UsersController::class, 'realizarLogin'])->name('realizar_login');
Route::get('/listar', [UsersController::class, 'listarUsuarios']);
Route::get('/listar/edit/{id}', [UsersController::class, 'edit']);
Route::put('/listar/update/{id}', [UsersController::class, 'update'])->name('atualizar_usuario');

Route::delete('/listar/delete/{id}', UsersController::class, '__invoke')->name('deletar_usuario');

