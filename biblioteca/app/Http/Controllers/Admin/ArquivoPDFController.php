<?php

namespace App\Http\Controllers\Admin;

use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArquivoPDFController extends Controller
{
    public function index($id){

        $livro_id = $id;
        return view('admin.pdfs.index', compact('livro_id'));
    }

    public function save(Request $request, $id){



        foreach ($request->file('pdfs') as $pdf){

            $newName = sha1($pdf->getClientOriginalName()). uniqid(). '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('arquivosPDF'), $newName);

            $livro = Livro::find($id);
            $livro->pdfs()->create([
                'pdf' => $newName
            ]);
           //dd($livro);
            flash()->success('PDF cadastrado com sucesso');
            //dd($id);
            return redirect()->route('livro.store',['id'=>$id]);

        }

    }
}
