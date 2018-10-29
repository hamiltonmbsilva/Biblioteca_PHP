<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';

    protected $fillable = [
        'foto','users_id','livros_id',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function livro(){

        return $this->belongsTo(Livro::class);
    }
}
