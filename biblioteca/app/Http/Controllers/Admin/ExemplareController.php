<?php

namespace App\Http\Controllers\Admin;

use App\Exemplares;
use App\Http\Requests\ExemplarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExemplareController extends Controller
{
    public function index(){

        $exemplar = Exemplares::all();
        return view('admin.exemplares.index', compact('exemplar'));
    }

    public function new(){
        return view('admin.exemplares.store');
    }

    //função para gravar um restaurante
    public function store(ExemplarRequest $request){


        $exemplarData = $request->all();

        $request->validated();


        $exemplar = new Exemplares();

        $exemplar->create($exemplarData);

        flash('Exemplar cadastrado com sucesso!')->success();
        return redirect()->route('exemplar.index');
    }

    //função para editar um restaurante
    public  function edit(Exemplares $exemplar){

        return view('admin.exemplares.edit', compact('exemplar'));
    }

    public function update(ExemplarRequest $request, $id){

        $exemplarData = $request->all();

        $request->validated();

        $exemplar = Exemplares::findOrFail($id);
        $exemplar->update($exemplarData);


        flash('Exemplar atualizado com sucesso!')->success();
        return redirect()->route('exemplar.index', ['exemplar' => $id]);
    }

    public function delete($id){

        $exemplar = Exemplares::findOrFail($id);
        $exemplar->delete();

        print 'Exemplar removido com sucesso!';

        flash('Exemplar removido com sucesso!')->success();
        return redirect()->route('exemplar.index');
    }
}
