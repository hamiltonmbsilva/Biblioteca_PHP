<?php

namespace App\Http\Controllers\Admin;


use App\Emprestimo;
use App\Exemplares;
use App\Livro;
use App\Reserva;

use App\Http\Controllers\Controller;
use App\User;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class RelatorioController extends Controller
{

    private $totalPage = 5;


    public function index()
    {
            $usuario = User::all();
            $reservas = Reserva::with('exemplares')->get();
            $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);
            $paginaReserva = Reserva::paginate(5);
            $paginaEmprestimo = Emprestimo::paginate(5);


      return view('admin.relatorios.index', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo',
          'emprestimos'));

    }

    public function relatorio()
    {

        $usuario = User::all();
        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();



        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorio', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorio.pdf');
    }

    public function livro(Request $request){

//tela de emprestimos

        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');

        $emprestimo = DB::table('emprestimos')->where('dataEmprestimo ','=',$dataInicio);
//            ->where('dataEmprestimo','<', $dataFinal);

        $livro = Livro::all();
        $exemplar = Exemplares::all();

        $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);



//

        return view('admin.relatorios.livro', compact( 'emprestimo', 'emprestimos','livro', 'exemplar'));


    }

    public function pdfLivro()
    {

//        $usuario = User::all();
        $livro = Livro::all();
        $exemplar = Exemplares::all();
//        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();



        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorioLivro', compact('livro', 'exemplar','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorioLivro.pdf');
    }




    public function pesquisar(Request $request){

        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');
        $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);
        $usuario = User::all();

//    $emprestimo = DB::table('emprestimos')->whereBetween('dataEmprestimo ',[
//          $dataInicio , $dataFinal]);
        $emprestimo = DB::table('emprestimos')->where('dataEmprestimo ','>=',$dataInicio);
//            ->where('dataEmprestimo','<=', $dataFinal);

//dd($emprestimo);

        return view('admin.relatorios.index', compact( 'emprestimo','reservas', 'emprestimos'
        ,'usuario', 'paginaEmprestimo','dataForm'));


    }

    public function reservado(Request $request){


//        $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);
        $reservas = Reserva::with('exemplares')->paginate($this->totalPage);
        $usuario = User::all();

        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');

        $emprestimo = DB::table('emprestimos')->whereBetween('dataEmprestimo ',[$dataFinal,$dataInicio]);

        return view('admin.relatorios.reservado', compact( 'emprestimo','reservas'
            ,'usuario', 'dataForm'));


    }

    public function pdfReservado()
    {

        $usuario = User::all();
        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();



        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorioReservado', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorio.pdf');
    }


    public function usuario(Request $request){

//        $dataForm = $request->except('_token');
//        $emprestimo->search($dataForm, $this->totalPage);
//
//        dd($emprestimo);


//        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);
        $usuario = User::all();
//
//
        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');
//
//

//
        $emprestimo = DB::table('emprestimos')->whereBetween('dataEmprestimo ',[$dataFinal,$dataInicio]);
//
//        dd($emprestimo);
//        //$paginaEmprestimo = Emprestimo::paginate(5);

        return view('admin.relatorios.usuario', compact( 'emprestimo','reservas', 'emprestimos'
            ,'usuario', 'paginaEmprestimo','dataForm'));


    }

    public function pdfUsuario()
    {

        $usuario = User::all();
        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();



        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorioUsuario', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorioUsuario.pdf');
    }

    public function devolucao(Request $request){

//        $dataForm = $request->except('_token');
//        $emprestimo->search($dataForm, $this->totalPage);
//
//        dd($emprestimo);


//        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->paginate($this->totalPage);
        $usuario = User::all();
//
//
        $dataInicio = $request->get('dataInicio');
        $dataFinal = $request->get('dataFinal');
//
//

//
        $emprestimo = DB::table('emprestimos')->whereBetween('dataEmprestimo ',[$dataFinal,$dataInicio]);
//
//        dd($emprestimo);
//        //$paginaEmprestimo = Emprestimo::paginate(5);

        return view('admin.relatorios.devolucao', compact( 'emprestimo','reservas', 'emprestimos'
            ,'usuario', 'paginaEmprestimo','dataForm'));


    }

    public function relatorioDevolucao()
    {

        $usuario = User::all();
        $reservas = Reserva::with('exemplares')->get();
        $emprestimos = Emprestimo::with('exemplares')->get();



        $model = Reserva::all() ;

        $pdf = PDF::loadView('admin.relatorios.relatorioDevolucao', compact('reservas', 'usuario','paginaReserva','paginaEmprestimo','emprestimos')
        );
        //$view = View::make('PDF')
        return $pdf->download('relatorio.pdf');
    }


}
