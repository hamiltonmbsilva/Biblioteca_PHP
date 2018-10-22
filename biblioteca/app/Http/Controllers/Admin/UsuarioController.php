<?php

namespace App\Http\Controllers\Admin;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
   public function index(){

       return __CLASS__;
   }

    public function new(){
        return view('admin.usuarios.store');
    }

    //função para gravar um restaurante
    public function store(Request $request){

        $usuarioData = $request->all();

        //$request->validated();

        $usuario = new Usuario();
        $usuario->create($usuarioData);

        flash('Restaurante criado com sucesso!')->success();
        return redirect()->route('usuario.index');
    }
}
