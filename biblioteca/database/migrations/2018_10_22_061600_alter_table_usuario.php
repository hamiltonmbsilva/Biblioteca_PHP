<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::update('usuarios', function (Blueprint $table) {

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idusuario');
            $table->string('nome');
            $table->string('email');
            $table->string('password');
            $table->integer('idade');
            $table->integer('cpf');
            $table->string('rg');

        });
    }
}
