<?php

namespace App\Http\Controllers\Admin;


use App\Emprestimo;
use App\Exemplares;
use App\Reserva;

use App\Http\Controllers\Controller;
use App\User;

use Barryvdh\DomPDF\Facade as PDF;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class RelatorioController extends Controller
{



    public function index()
    {
            $usuario = User::all();
            $reservas = Reserva::with('exemplares')->get();
            $emprestimos = Emprestimo::with('exemplares')->get();
            $paginaReserva = Reserva::paginate(5);
            $paginaEmprestimo = Emprestimo::paginate(5);




//        $d1 = dataFinalMysql(dataInicio); // format Y-m-d
//
//        $current = DB::table('reservas')
//            ->whereRaw('? between dataReserva', $d1)
//            ->first();


      return view('admin.relatorios.index', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo',
          'emprestimos', 'emprestimo'));

    }

    public function relatorio()
    {

        $usuario = User::all();
        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();

        $qtdReservas = Reserva::count()->get();
        dd($qtdReservas);

        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorio', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorio.pdf');
    }

    public function pesquisar(Request $request){

        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();


        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');

        $datas = dataFinalMysql($dataInicio);

        $emprestimo = DB::table('emprestimos')->whereRaw('? between dataEmprestimo ', $datas);

        dd($emprestimo);

        return view('admin.relatorios.index', compact( 'emprestimo'));


    }


}
