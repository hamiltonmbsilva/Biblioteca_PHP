<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable =[

        'nome', 'password', 'idade', 'cpf', 'rg','email'
    ];
}
