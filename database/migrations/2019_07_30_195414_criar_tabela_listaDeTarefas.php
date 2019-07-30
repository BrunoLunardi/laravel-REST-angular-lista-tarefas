<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaListaDeTarefas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listaDeTarefas', function(Blueprint $table){
            //campos da tabela que será criada pela migration
            $table->increments('id');//chave primário com auto-incremento
            $table->string('texto');
            $table->string('autor');
            $table->string('status');
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
        //excluir tabela
        Schema::drop('listaDeTarefas');
    }
}
