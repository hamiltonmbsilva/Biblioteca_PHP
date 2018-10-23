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
    return view('auth/login');
});

Route::get('template/', function () {
    return view('template');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function (){

    Route::prefix('admin')->namespace('Admin')->group(function (){

//        Route::prefix('restaurants')->group(function (){
//
//            Route::get('/', 'RestaurantController@index')->name('restaurant.index');
//            Route::get('new', 'RestaurantController@new')->name('restaurant.new');
//            Route::post('store', 'RestaurantController@store')->name('restaurant.store');
//            Route::get('edit/{restaurant}', 'RestaurantController@edit')->name('restaurant.edit');
//            Route::post('update/{id}', 'RestaurantController@update')->name('restaurant.update');
//            Route::get('remove/{id}', 'RestaurantController@delete')->name('restaurant.remove');
//
//        });

        Route::prefix('users')->group(function (){

            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('new', 'UserController@new')->name('user.new');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::get('remove/{id}', 'UserController@delete')->name('user.remove');

        });

//        Route::prefix('admin')->group(function () {
//            Route::get('usuarios', 'Admin\\UsuarioController@index')->name('usuario.index');
//            Route::get('usuarios/new', 'Admin\\UsuarioController@new')->name('usuario.new');
//            Route::post('usuarios/store', 'Admin\\UsuarioController@store')->name('usuario.store');
//        });

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

    });
});




