<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

    protected $fillable = [
        'tipo',

    ];

    public function users(){

        return $this->hasMany(Tipo::class,'tipos_id');
    }
}
