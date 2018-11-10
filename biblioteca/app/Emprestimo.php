<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';

    protected $fillable = [

        'dataEmprestimo', 'dataDevolucao','users_id',
    ];


    //Estou falando que meu livro tem uma categoria
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function exemplares(){

        return $this->belongsToMany(Exemplares::class,'emprestimo_has_exemplares',
            'emprestimos_id','exemplares_id')->withTimestamps();
    }



    public function getDataEmprestimoAttribute(){

        $dataEmprestimo = explode('-', $this->attributes['dataEmprestimo']);
        $dataEmprestimo = $dataEmprestimo[2].'/'.$dataEmprestimo[1].'/'.$dataEmprestimo[0];

        return $dataEmprestimo;
    }

    public function getDataDevolucaoAttribute(){

        $dataDevolucao = explode('-', $this->attributes['dataDevolucao']);
        $dataDevolucao = $dataDevolucao[2].'/'.$dataDevolucao[1].'/'.$dataDevolucao[0];

        return $dataDevolucao;
    }
}
