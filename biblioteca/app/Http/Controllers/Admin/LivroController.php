<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LivroRequest;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivroController extends Controller
{
    public function index(){

        $livro = Livro::all();
        return view('admin.livros.index', compact('livro'));
    }

    public function new(){
        return view('admin.livros.store');
    }

    //função para gravar um restaurante
    public function store(LivroRequest $request){

        $livroData = $request->all();

        $request->validated();

        $livro = new Livro();
        $livro->create($livroData);

        flash('Livro cadastrado com sucesso!')->success();
        return redirect()->route('livro.index');
    }

    //função para editar um restaurante
    public  function edit(Livro $livro){

        return view('admin.livros.edit', compact('livro'));
    }

    public function update(LivroRequest $request, $id){

        $livroData = $request->all();

        $request->validated();

        $livro = Livro::findOrFail($id);
        $livro->update($livroData);


        flash('Livro atualizado com sucesso!')->success();
        return redirect()->route('livro.index', ['livro' => $id]);
    }

    public function delete($id){

        $livro = Livro::findOrFail($id);
        $livro->delete();

        print 'Livro removido com sucesso!';

        flash('Livro removido com sucesso!')->success();
        return redirect()->route('livro.index');
    }

}
