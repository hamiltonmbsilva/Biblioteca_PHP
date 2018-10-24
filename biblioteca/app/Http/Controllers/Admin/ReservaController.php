<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservaRequest;
use App\Reserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservaController extends Controller
{
    public function index(){

        $reserva = Reserva::all();
        return view('admin.reservas.index', compact('reserva'));
    }

    public function new(){
        return view('admin.reservas.store');
    }

    //função para gravar um restaurante
    public function store(ReservaRequest $request){


        $reservaData = $request->all();

        $request->validated();

        $reserva = new Reserva();
        $reserva->create($reservaData);

        flash('Reserva cadastrado com sucesso!')->success();
        return redirect()->route('reserva.index');
    }

    //função para editar um restaurante
    public  function edit(Reserva $reserva){
//        dd($reserva);

        return view('admin.reservas.edit', compact('reserva'));
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
