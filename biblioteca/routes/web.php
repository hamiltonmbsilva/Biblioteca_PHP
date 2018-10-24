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


        Route::prefix('users')->group(function (){

            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('new', 'UserController@new')->name('user.new');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::get('remove/{id}', 'UserController@delete')->name('user.remove');

        });



       Route::prefix('livros')->group(function () {

            Route::get('/', 'LivroController@index')->name('livro.index');
            Route::get('new', 'LivroController@new')->name('livro.new');
            Route::post('store', 'LivroController@store')->name('livro.store');
            Route::get('edit/{livro}', 'LivroController@edit')->name('livro.edit');
            Route::post('update/{id}', 'LivroController@update')->name('livro.update');
            Route::get('remove/{id}', 'LivroController@delete')->name('livro.remove');

        });

        Route::prefix('categorias')->group(function () {

            Route::get('/', 'CategoriaController@index')->name('categoria.index');
            Route::get('new', 'CategoriaController@new')->name('categoria.new');
            Route::post('store', 'CategoriaController@store')->name('categoria.store');
            Route::get('edit/{categoria}', 'CategoriaController@edit')->name('categoria.edit');
            Route::post('update/{id}', 'CategoriaController@update')->name('categoria.update');
            Route::get('remove/{id}', 'CategoriaController@delete')->name('categoria.remove');

        });



        Route::prefix('admin')->group(function () {
            Route::get('endereco', 'Admin\\EnderecoController@index');
        });

        Route::prefix('admin')->group(function () {
            Route::get('exemplar', 'Admin\\ExemplareController@index');
        });



        Route::prefix('admin')->group(function () {
            Route::get('reserva', 'Admin\\ReservaController@index');
        });

        Route::prefix('admin')->group(function () {
            Route::get('tipo', 'Admin\\TipoController@index');
        });

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


    });
});




