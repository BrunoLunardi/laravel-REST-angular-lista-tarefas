<?php

use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'usuario',
            'email' => 'usuario@provedor.com.br',
            'password' => '1234',
            'api_token' => '123456'
        ]);
    }
}
