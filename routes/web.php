<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\PesquisaController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[UsuarioController::class,'login'])->name('login.page');
Route::post('/auth',[UsuarioController::class,'auth'])->name('auth.user');

Route::get('search',[PesquisaController::class,'search']);

/*Route::get('/user',[UsuarioController::class,'user'])->name('user.page');
Route::post('/create',[UsuarioController::class,'create'])->name('create.user');*/
 