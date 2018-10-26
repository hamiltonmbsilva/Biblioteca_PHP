<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [

        'nome', 'descricao', 'assunto',
    ];

    //Estou falando que minha categoria  tem Varios livros ligação com o banco
    public function livros(){

        return $this->hasMany(Livro::class);
    }
}
