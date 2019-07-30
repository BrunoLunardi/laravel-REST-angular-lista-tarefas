<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //desabili mecanismo de proteção dos models Laravel
        Model::unguard();
        //executa seeds da classe informada
        $this->call(ListaDeTarefas::class);
        //mensagem de sucesso
        $this->command->info(
            'Tarefas adicionadas com sucesso a tabela ListaDeTarefas'
        );
        Model::reguard();
    }
}
