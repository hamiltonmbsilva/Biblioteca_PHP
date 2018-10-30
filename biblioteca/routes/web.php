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

            Route::get('/fotos/{id}','FotoController@index')->name('user.foto');
            Route::post('/fotos/{id}','FotoController@save')->name('user.foto.save');

        });



       Route::prefix('livros')->group(function () {

            Route::get('/', 'LivroController@index')->name('livro.index');
            Route::get('new', 'LivroController@new')->name('livro.new');
            Route::post('store', 'LivroController@store')->name('livro.store');
            Route::get('edit/{livro}', 'LivroController@edit')->name('livro.edit');
            Route::post('update/{id}', 'LivroController@update')->name('livro.update');
            Route::get('remove/{id}', 'LivroController@delete')->name('livro.remove');

            Route::get('/capas/{id}','FotoLivroController@index')->name('livro.capa');
            Route::post('/capas/{id}','FotoLivroController@save')->name('livro.capa.save');

            Route::get('/pdfs/{id}','ArquivoPDFController@index')->name('livro.pdf');
            Route::post('/pdfs/{id}','ArquivoPDFController@save')->name('livro.pdf.save');

        });

        Route::prefix('categorias')->group(function () {

            Route::get('/', 'CategoriaController@index')->name('categoria.index');
            Route::get('new', 'CategoriaController@new')->name('categoria.new');
            Route::post('store', 'CategoriaController@store')->name('categoria.store');
            Route::get('edit/{categoria}', 'CategoriaController@edit')->name('categoria.edit');
            Route::post('update/{id}', 'CategoriaController@update')->name('categoria.update');
            Route::get('remove/{id}', 'CategoriaController@delete')->name('categoria.remove');

        });

        Route::prefix('exemplares')->group(function () {

            Route::get('/', 'ExemplareController@index')->name('exemplar.index');
            Route::get('new', 'ExemplareController@new')->name('exemplar.new');
            Route::post('store', 'ExemplareController@store')->name('exemplar.store');
            Route::get('edit/{exemplar}', 'ExemplareController@edit')->name('exemplar.edit');
            Route::post('update/{id}', 'ExemplareController@update')->name('exemplar.update');
            Route::get('remove/{id}', 'ExemplareController@delete')->name('exemplar.remove');

        });

        Route::prefix('reservas')->group(function () {

            Route::get('/', 'ReservaController@index')->name('reserva.index');
            Route::get('new', 'ReservaController@new')->name('reserva.new');
            Route::post('store', 'ReservaController@store')->name('reserva.store');
            Route::get('edit/{reserva}', 'ReservaController@edit')->name('reserva.edit');
            Route::get('exibir/{reserva}', 'ReservaController@exibir')->name('reserva.exibir');
            Route::post('update/{id}', 'ReservaController@update')->name('reserva.update');
            Route::get('remove/{id}', 'ReservaController@delete')->name('reserva.remove');

        });

        Route::prefix('enderecos')->group(function () {

            Route::get('/', 'EnderecoController@index')->name('endereco.index');
            Route::get('new', 'EnderecoController@new')->name('endereco.new');
            Route::post('store', 'EnderecoController@store')->name('endereco.store');
            Route::get('edit/{endereco}', 'EnderecoController@edit')->name('endereco.edit');
            Route::post('update/{id}', 'EnderecoController@update')->name('endereco.update');
            Route::get('remove/{id}', 'EnderecoController@delete')->name('endereco.remove');

        });

    });
});

Route::get('rel', function (){

    $livro = \App\Livro::find(1)->titulo;
    //print $livro->titulo;
    print '<br>';

//    foreach ($livro->exemplares as $e){
//
//        print 'Itens: ' . $e->codigo;
//        print 'Itens: ' . $e->ano;
//    }

    dd($livro->post->exemplare );
});


