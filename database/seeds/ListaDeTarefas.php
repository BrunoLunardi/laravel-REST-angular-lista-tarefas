<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

//arquivo para inserir registros no BD
class ListaDeTarefas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserir registros na tabela do BD
        DB::table('listaDeTarefas')->insert([
            'texto' => 'Comprar passagens aéreas.',
            'autor' => 'John doe',
            'status' => 'Concluido',
            'created_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('listaDeTarefas')->insert([
            'texto' => 'Reservar hotel.',
            'autor' => 'John doe',
            'status' => 'Concluido',
            'created_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('listaDeTarefas')->insert([
            'texto' => 'Preparar slides para apresentação.',
            'autor' => 'John doe',
            'status' => 'Pendente',
            'created_at' => date('Y-m-d h:i:s')
        ]);

    }
}
