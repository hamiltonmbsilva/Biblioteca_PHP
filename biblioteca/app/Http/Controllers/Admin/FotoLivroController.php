<?php

namespace App\Http\Controllers\Admin;

use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FotoLivroController extends Controller
{
    public function index($id){

        $livro_id = $id;
        return view('admin.capas.index', compact('livro_id'));
    }

    public function save(Request $request, $id){

//        dd($request->file('capas'));

        foreach ($request->file('capas') as $capa){

            $newName = sha1($capa->getClientOriginalName()). uniqid(). '.' . $capa->getClientOriginalExtension();
            $capa->move(public_path('imagem'), $newName);

            $livro = Livro::find($id);
            $livro->capas()->create([
                'capa' => $newName
            ]);
            flash()->success('Foto cadastrado com sucesso');
            return redirect()->route('livro.index',['id'=>$id]);

        }

    }
}
