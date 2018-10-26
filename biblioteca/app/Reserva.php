<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    protected $table = 'reservas';

    protected $fillable = [

        'dataEmprestimo', 'dataDevolucao','users_id',
    ];


    //Estou falando que meu livro tem uma categoria
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function exemplares(){

        return $this->hasMany(Exemplares::class);
    }
}
