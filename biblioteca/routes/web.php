<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('template/', function () {
    return view('template');
});

Route::prefix('admin')->group(function () {
    Route::get('usuarios', 'Admin\\UsuarioController@index')->name('usuario.index');
    Route::get('usuarios/new', 'Admin\\UsuarioController@new')->name('usuario.new');
    Route::post('usuarios/store', 'Admin\\UsuarioController@store')->name('usuario.store');
});

Route::prefix('admin')->group(function () {
    Route::get('categoria', 'Admin\\CategoriaController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('endereco', 'Admin\\EnderecoController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('exemplar', 'Admin\\ExemplareController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('livro', 'Admin\\LivroController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('reserva', 'Admin\\ReservaController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('tipo', 'Admin\\TipoController@index');
});
