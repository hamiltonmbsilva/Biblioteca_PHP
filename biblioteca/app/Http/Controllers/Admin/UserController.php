<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\UserRequest;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function new(){

        return view('admin.users.store');
    }



    //função para gravar um restaurante
    public function store(UserRequest $request){
       dd('Testet de entrada');
       $userData = $request->all();

       $request->validated();
        $userData['password'] = bcrypt($userData['password']);
        $user = new User();

        $user->create($userData);

//        User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);


        flash('Usuario criado com sucesso!')->success();
        return redirect()->route('user.index');
    }

    //função para editar um restaurante
    public  function edit(User $user){

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id){

        $userData = $request->all();

        $request->validated();

        if ($userData['password']){

            $userData['password'] = bcrypt($userData['password']);
        }

        $user = User::findOrFail($id);
        $user->update($userData);


        flash('Usuario atualizado com sucesso!')->success();
        return redirect()->route('user.edit', ['user' => $id]);
    }

    public function delete($id){

        $user = User::findOrFail($id);
        $user->delete();


        flash('Usuario removido com sucesso!')->success();
        return redirect()->route('user.index');
    }

}
