<?php

namespace App\Http\Controllers\Admin;

use App\Exemplares;
use App\Http\Requests\ReservaRequest;
use App\Livro;
use App\Reserva;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{
    public function index(){
        $user = User::all(['id', 'name']);
        $exemplar = Exemplares::all(['id', 'livros_id']);
        $livro = Livro::all(['id','titulo']);

        $reserva = Reserva::all();
        return view('admin.reservas.index', compact('reserva', 'user','exemplar', 'livro'));
    }

    public function new(){

        $user = User::all(['id', 'name']);
        $livro = Livro::all();
        $exemplar = Exemplares::all();

        return view('admin.reservas.store', compact('user','exemplar','livro'));
    }

    //função para gravar um restaurante
    public function store(ReservaRequest $request){

        $user = User::all(['id', 'name']);
        $exemplar =Exemplares::all();
        $reservaData = $request->all();
//
        $request->validated();


        $reserva = Reserva::create($request->all());

        $reserva->exemplares()->attach(request('exemplar'));
//       dd($reserva);


        flash('Reserva cadastrado com sucesso!')->success();
        return redirect()->route('reserva.index',compact('user','exemplar','livro'));
    }

    //função para editar um restaurante
    public  function edit(Reserva $reserva){
        $user = User::all(['id', 'name']);
        $exemplar = Exemplares::all(['id', 'livros_id']);
        $livro = Livro::all(['id','titulo']);

        return view('admin.reservas.edit', compact('reserva','user', 'exemplar','livro'));
    }

    public function update(ReservaRequest $request, $id){

        $reservaData = $request->all();
//        dd($reservaData);
        $request->validated();

        $reserva = Reserva::findOrFail($id);
        $reserva->update($reservaData);


        flash('Reserva atualizado com sucesso!')->success();
        return redirect()->route('reserva.index', ['reserva' => $id]);
    }

    public function delete($id){

        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        print 'Reserva removido com sucesso!';

        flash('Reserva removido com sucesso!')->success();
        return redirect()->route('reserva.index');
    }
}
