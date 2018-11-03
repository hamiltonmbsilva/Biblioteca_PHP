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

        return $this->belongsToMany(Exemplares::class,'emprestimo_has_exemplares','emprestimos_id','exemplares_id')->withTimestamps();
    }
}
