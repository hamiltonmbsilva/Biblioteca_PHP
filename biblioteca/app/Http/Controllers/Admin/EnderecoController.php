<?php

namespace App\Http\Controllers\Admin;

use App\Endereco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnderecoController extends Controller
{
    public function index(){

        $endereco = Endereco::all();
        return view('admin.enderecos.index', compact('endereco'));
    }

    public function new(){
        return view('admin.enderecos.store');
    }

    //função para gravar um restaurante
    public function store(EnderecoRequest $request){


        $enderecoData = $request->all();

        $request->validated();

        $endereco = new Endereco();
        $endereco->create($enderecoData);

        flash('Endereco cadastrado com sucesso!')->success();
        return redirect()->route('endereco.index');
    }

    //função para editar um restaurante
    public  function edit(Endereco $endereco){

        return view('admin.enderecos.edit', compact('endereco'));
    }

    public function update(EnderecoRequest $request, $id){

        $enderecoData = $request->all();

        $request->validated();

        $endereco = Endereco::findOrFail($id);
        $endereco->update($enderecoData);


        flash('Endereco atualizado com sucesso!')->success();
        return redirect()->route('endereco.index', ['endereco' => $id]);
    }

    public function delete($id){

        $endereco = Endereco::findOrFail($id);
        $endereco->delete();

        print 'Endereco removido com sucesso!';

        flash('Endereco removido com sucesso!')->success();
        return redirect()->route('endereco.index');
    }
}
