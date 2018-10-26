<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableExemplarAddForeignLivro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('exemplares', function (Blueprint $table){

           $table->integer('livro_id')->unsigned();
           $table->foreign('livro_id')->references('livros')->on('id');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exemplares', function (Blueprint $table){

            $table->dropForeign('livro_id');
            $table->dropColumn('livro_id');

        });
    }
}
