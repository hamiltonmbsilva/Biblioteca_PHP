<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $table = 'users';

    protected $fillable = [

        'name', 'email', 'password', 'idade','cpf','rg','tipos_id',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reservas(){

        return $this->hasMany(Reserva::class,'users_id');
    }



    public function tipo(){

        return $this->belongsTo(User::class);
    }
}
