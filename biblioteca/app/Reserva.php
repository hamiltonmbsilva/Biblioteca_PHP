<?php

namespace App;
use App\Exemplares;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{

    protected $table = 'reservas';

    protected $fillable = [

        'dataReserva','users_id',
    ];

    //Estou falando que meu livro tem uma categoria
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function exemplares(){

        return $this->belongsToMany(\App\Exemplares::class,'reservas_has_exemplares',
            'reservas_id','exemplares_id')->withTimestamps();
    }

    public function getDataReservaAttribute(){

        $dataReserva = explode('-', $this->attributes['dataReserva']);
        $dataReserva = $dataReserva[2].'/'.$dataReserva[1].'/'.$dataReserva[0];

        return $dataReserva;
    }
}
