<?php

namespace App\Http\Controllers\Admin;

use App\categoria;
use App\Http\Requests\CategoriaRequest;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index(){
        $livro = Livro::all(['id', 'titulo']);
        $categoria = Categoria::paginate(5);
        return view('admin.categorias.index', compact('categoria','livro'));
    }

    public function new(){
        $livro = Livro::all(['id', 'titulo']);
        return view('admin.categorias.store', compact('livro'));
    }

    //função para gravar um restaurante
    public function store(CategoriaRequest $request){

        $categoriaData = $request->all();

        $request->validated();

        $categoria = new Categoria();
        $categoria->create($categoriaData);

//        $livro = Livro::find($categoriaData['categorias_id']);
//
//        $livro->categoria()->create($categoriaData);

        flash('Categoria cadastrada com sucesso!')->success();
        return redirect()->route('categoria.index');
    }

    //função para editar um restaurante
    public  function edit(Categoria $categoria){
        $livro = Livro::all(['id', 'titulo']);
        return view('admin.categorias.edit', compact('categoria','livro'));
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
