<?php

namespace App\Http\Controllers\Admin;

use App\categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index(){

        $categoria = Categoria::all();
        return view('admin.categorias.index', compact('categoria'));
    }

    public function new(){
        return view('admin.categorias.store');
    }

    //função para gravar um restaurante
    public function store(CategoriaRequest $request){

        $categoriaData = $request->all();

        $request->validated();

        $categoria = new Categoria();
        $categoria->create($categoriaData);

        flash('Categoria cadastrada com sucesso!')->success();
        return redirect()->route('categoria.index');
    }

    //função para editar um restaurante
    public  function edit(Categoria $categoria){

        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request, $id){

        $categoriaData = $request->all();

        $request->validated();

        $categoria = Categoria::findOrFail($id);
        $categoria->update($categoriaData);


        flash('Categoria atualizado com sucesso!')->success();
        return redirect()->route('categoria.index', ['categoria' => $id]);
    }

    public function delete($id){

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        print 'Categoria removido com sucesso!';

        flash('Categoria removido com sucesso!')->success();
        return redirect()->route('categoria.index');
    }
}
