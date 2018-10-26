<?php

namespace App\Http\Controllers\Admin;

use App\Exemplares;
use App\Http\Requests\ExemplarRequest;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExemplareController extends Controller
{
    public function index(){
        $livro = Livro::all(['id', 'titulo']);
        $exemplar = Exemplares::all();

        return view('admin.exemplares.index', compact('exemplar','livro'));
    }

    public function new(){
        $livro = Livro::all(['id', 'titulo']);

        return view('admin.exemplares.store', compact('livro'));
    }

    //função para gravar um restaurante
    public function store(ExemplarRequest $request){


        $exemplarData = $request->all();

        $request->validated();


        $livro = Livro::find($exemplarData['livro_id']);

        $livro->exemplares()->create($exemplarData);

        flash('Exemplar cadastrado com sucesso!')->success();
        return redirect()->route('exemplar.index',compact('livro'));
    }

    //função para editar um restaurante
    public  function edit(Exemplares $exemplar){

        $livro = Livro::all(['id', 'titulo']);
        return view('admin.exemplares.edit', compact('exemplar','livro'));
    }

    public function update(ExemplarRequest $request, $id){

        $exemplarData = $request->all();

        $request->validated();

        $exemplar = Exemplares::findOrFail($id);
        $exemplar->update($exemplarData);

//        $exemplar = Exemplares::find($id);
//        $exemplar->livro()->associate($exemplarData['livros_id']);
//        $exemplar->update($exemplarData);


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
