<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FotoController extends Controller
{
   public function index($id){

       $user_id = $id;
       return view('admin.fotos.index', compact('user_id'));
   }

    public function save(Request $request, $id){

       //dd($request->file('fotos'));

       foreach ($request->file('fotos') as $foto){

           $newName = sha1($foto->getClientOriginalName()). uniqid(). '.' . $foto->getClientOriginalExtension();
           $foto->move(public_path('imagem'), $newName);

           $user = User::find($id);
           $user->fotos()->create([
               'foto' => $newName
           ]);
            flash()->success('Foto cadastrado com sucesso');
           return redirect()->route('user.index',['id'=>$id]);

       }

    }

}
