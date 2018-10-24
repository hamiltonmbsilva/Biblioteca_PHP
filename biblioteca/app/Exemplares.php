<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplares extends Model
{
   protected $table = 'exemplares';

    protected $fillable = [

        'codigo', 'circular', 'ano',
    ];


}
