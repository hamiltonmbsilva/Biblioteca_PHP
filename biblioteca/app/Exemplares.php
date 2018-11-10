<?php

namespace App;
use App\Reserva;
use App\Emprestimo;

use Illuminate\Database\Eloquent\Model;

class Exemplares extends Model
{
   protected $table = 'exemplares';

    protected $fillable = [

        'codigo', 'circular', 'ano','livros_id','reservas_id','qtda',
    ];

    //Estou falando que meu emxemplar tem um livro na ligação  com o banco
    public function livro(){

        return $this->belongsTo(Livro::class, 'livros_id');
    }

    public function reservas(){

        return $this->belongsToMany(\App\Reserva::class,'reservas_has_exemplares','exemplares_id',
            'reservas_id')->withTimestamps();
    }

    public function emprestimos(){

        return $this->belongsToMany(\App\Emprestimo::class,'emprestimo_has_exemplares','exemplares_id','emprestimos_id')->withTimestamps();
    }
}
