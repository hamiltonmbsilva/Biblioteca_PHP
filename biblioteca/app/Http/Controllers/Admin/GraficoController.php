<?php

namespace App\Http\Controllers\Admin;

use App\Emprestimo;
use App\Reserva;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;

class GraficoController extends Controller
{
    private $totalPage = 5;


    public function emprestado()
    {
        $grafico = Emprestimo::count();
        $lava = new Lavacharts();
        $reservaPorMes = $lava->DataTable();
        $reservaPorMes->addStringColumn('livro')->addNumberColumn('Numero de livros');

        $reservaPorMes->addRow(['Emprestimo' , $grafico]);

//        for ($i=1; $i <= $grafico; $i++){
//
//        }

        $lava->ColumnChart('livro', $reservaPorMes, [
            'title' => 'Grafico emprestimos',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line']
                ]
    ]);
        //dd($lava);




        return view('admin.graficos.index',['lava' => $lava]);

    }

    public function pdfEmprestimo(){
        $grafico = Emprestimo::count();
        $lava = new Lavacharts();
        $reservaPorMes = $lava->DataTable();
        $reservaPorMes->addStringColumn('livro')->addNumberColumn('Numero de livros');

        $reservaPorMes->addRow(['Emprestimo' , $grafico]);



        $lava->ColumnChart('livro', $reservaPorMes);



        $pdf = PDF::loadView('admin.graficos.graficoEmprestimo', compact('grafico','lava'));



//        return $pdf->download('graficoEmprestimo.pdf');
        return $pdf->stream('graficoEmprestimo.pdf');
    }

    public function reservado()
    {
        $grafico = Reserva::count();
        $lava = new Lavacharts();
        $reservaPorMes = $lava->DataTable();
        $reservaPorMes->addStringColumn('livro')->addNumberColumn('Numero de livros');

        $reservaPorMes->addRow(['Reserva' , $grafico]);


        $lava->ColumnChart('livro', $reservaPorMes, [
            'title' => 'Grafico emprestimos',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line']
            ]
        ]);

        return view('admin.graficos.reserva',['lava' => $lava]);

    }

    public function reservadoCategoria()
    {
        $grafico = Reserva::count();

        $reservas = Reserva::with('exemplares')->paginate($this->totalPage);

//        dd($reservas);

        $lava = new Lavacharts();
        $reservaPorMes = $lava->DataTable();
        $reservaPorMes->addStringColumn('categoria')->addNumberColumn('Numero de reserva')
           ;

        $reservaPorMes->addRow(['Reserva' , $grafico]);



        $lava->ColumnChart('livro', $reservaPorMes, [
            'title' => 'Grafico emprestimos',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line']
            ]
        ]);

        return view('admin.graficos.reserva',['lava' => $lava]);

    }

    public function total()
    {
        $grafico = Reserva::count();
        $grafico1 = Emprestimo::count();
        $lava = new Lavacharts();
        $reservaPorMes = $lava->DataTable();
        $reservaPorMes->addStringColumn('livro')->addNumberColumn('Numero de reserva')
        ->addNumberColumn('Numero de Emprestimos');

        $reservaPorMes->addRow(['Reserva' , $grafico]);
        $reservaPorMes->addRow(['Emprestimo' , $grafico1]);


        $lava->ColumnChart('livro', $reservaPorMes, [
            'title' => 'Grafico emprestimos',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ],
            'seriesType' => 'bars',
            'series' => [
                2 => ['type' => 'line']
            ]
        ]);

        return view('admin.graficos.reserva',['lava' => $lava]);

    }


}
