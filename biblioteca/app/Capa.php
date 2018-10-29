<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    protected $table = 'capas';

    protected $fillable = [
        'capa','livros_id',
    ];

    public function livro(){

        return $this->belongsTo(Livro::class);
    }
}
