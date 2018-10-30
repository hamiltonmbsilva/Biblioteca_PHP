<?php

namespace App\Http\Controllers\Admin;

use App\ArquivoPDF;
use App\categoria;
use App\Http\Requests\LivroRequest;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivroController extends Controller
{
    public function index(){
        $categoria = Categoria::all(['id', 'nome']);
        $id = Livro::with('id');
        $livro = Livro::paginate(5);
        return view('admin.livros.index', compact('livro','categoria', 'id'));
    }

    public function new(){
        $categoria = Categoria::all(['id', 'nome']);
       // $pdf = ArquivoPDF::with('id');;
        $livro_id = Livro::all(['id']);
        //dd($livro_id);
        return view('admin.livros.store',compact('categoria', 'livro_id','pdf'));
    }

    //função para gravar um restaurante
    public function store(LivroRequest $request){

        $path = $request->file('arquivo')->store('Arquivos','public');

        $livroData = $request->all();

        $request->validated();

         //Define o valor default para a variável que contém o nome da imagem
       //$nameFile = null;

        $categoria = Categoria::find($livroData['categorias_id']);
        $livro = $categoria->livros()->create($livroData);

        //dd($livro);

        $post = new ArquivoPDF();
        $post->pdf = $path;

        //$post->create($request->all($livro->id));
        $post->livros_id= $livro->id;

        //dd($post);
        $post->save();
        flash('Livro cadastrado com sucesso!')->success();
        return redirect()->route('livro.index',compact('categoria'));
    }

    //função para editar um restaurante
    public  function edit(Livro $livro){
        $categoria = Categoria::all(['id', 'nome']);
        return view('admin.livros.edit', compact('livro','categoria'));
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
