<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';

    protected $fillable = [

        'titulo', 'ISBN', 'autores','edicao', 'editora', 'ano', 'assuntos','categorias_id',
    ];

    //Estou falando que meu Livro tem Vario Exemplares ligação com o banco
    public function exemplares(){

        return $this->hasMany(Exemplares::class);
    }

    //Estou falando que meu livro tem uma categoria
    public function categoria(){

        return $this->belongsTo(Categoria::class);
    }
}
