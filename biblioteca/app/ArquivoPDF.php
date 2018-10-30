<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivoPDF extends Model
{
    protected $table = 'pdfs';

    protected $fillable = [
        'pdf','livros_id',
    ];


    public function livro(){

        return $this->belongsTo(Livro::class,'livros_id');
    }
}
