<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplares extends Model
{
   protected $table = 'exemplares';

    protected $fillable = [

        'codigo', 'circular', 'ano','livros_id',
    ];

    //Estou falando que meu emxemplar tem um livro na ligação  com o banco
    public function livro(){

        return $this->belongsTo(Livro::class, 'livros_id');
    }

    public function reserva(){

        return $this->belongsTo(Reserva::class, 'reservas_id');
    }
}
