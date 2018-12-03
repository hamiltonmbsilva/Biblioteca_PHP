<?php

namespace App\Http\Controllers\Admin;

use App\Emprestimo;
use App\Exemplares;
use App\Http\Requests\EmprestimoRequest;
use App\Livro;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class EmprestimoController extends Controller
{
    public function index(){
        $user = User::all(['id', 'name']);
        $exemplar = Exemplares::all(['id', 'livros_id']);
        $livro = Livro::all(['id','titulo']);
        $usuario = User::all();
        $emprestimos = Emprestimo::with('exemplares')->get();

        $qtd =DB::table('emprestimos')->count();
        $qtd1 =DB::table('emprestimos')->groupBy('users_id')->where('users_id','2')->count();
//        dd($qtd1);




        //dd(Auth::user()->emprestimos()->count());

        $pagina = Emprestimo::paginate(5);
        $emprestimo = Auth::user()->emprestimos;
//        dd($emprestimo);

        return view('admin.emprestimos.index', compact('emprestimo', 'user','exemplar', 'livro',
            'pagina','emprestimos','usuario'));
    }

    public function new(){

        $user = User::all(['id', 'name']);
        $livro = Livro::all();
        $exemplar = Exemplares::all();


        return view('admin.emprestimos.store', compact('user','exemplar','livro'));
    }

    //função para gravar um restaurante
    public function store(EmprestimoRequest $request){

        $user = User::all(['id', 'name']);
        $exemplar =Exemplares::all();
        $emprestimoData = $request->all();
        $teste = request('dataEmprestimo');
        $d = new Carbon($teste);
       dd($d->addDay(1)->format("d/m/y"));

        $request->validated();

        $emprestimo = Emprestimo::create($request->all());

        dd($request->all());

        $emprestimo->exemplares()->attach(request('exemplar'));
//       dd($emprestimo);


        flash('Emprestimo cadastrado com sucesso!')->success();
        return redirect()->route('emprestimo.index',compact('user','exemplar','livro'));
    }

    //função para editar um restaurante
    public  function edit(Emprestimo $emprestimo){
        $user = User::all(['id', 'name']);
        $exemplar = Exemplares::all(['id', 'livros_id']);
        $livro = Livro::all(['id','titulo']);

        $usuario = User::all();
        $emprestimos = Emprestimo::with('exemplares')->get();

        return view('admin.emprestimos.edit', compact('emprestimo','user', 'exemplar','livro',
            'usuario', 'emprestimos'));
    }

    public  function exibir(Emprestimo $emprestimo){
        $user = User::all(['id', 'name']);
        $exemplar = Exemplares::all(['id', 'livros_id']);
        $livro = Livro::all(['id','titulo']);
        $emprestimos = Emprestimo::with('exemplares')->get();

        return view('admin.emprestimos.consulta', compact('emprestimo','user', 'exemplar','livro','emprestimos'));
    }

    public function update(EmprestimoRequest $request, $id){

        $emprestimoData = $request->all();
//        dd($emprestimoData);
        $request->validated();

        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->update($emprestimoData);


        flash('Emprestimo atualizado com sucesso!')->success();
        return redirect()->route('emprestimo.index', ['emprestimo' => $id]);
    }

    public function delete($id){

        $emprestimo = Emprestimo::findOrFail($id);
        $emprestimo->delete();

        print 'Emprestimo removido com sucesso!';

        flash('Emprestimo removido com sucesso!')->success();
        return redirect()->route('emprestimo.index');
    }
}
