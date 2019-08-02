<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Classe Response para enviar resposta do tipo JSON
use Illuminate\Http\Response;

use App\Http\Requests;
//inclui model
use App\ListaDeTarefas;

class TarefasController extends Controller
{
    //metodo principal
    public function index(){
        return Response()->json(listaDeTarefas::orderBy('id', 'desc')->get(), 200);
    }

    //metodo para armazenar dados
    //método acessado pelo url fornecida em adicionarTarefas, no angular (public/js/app.js)
    public function store(Request $request){
        //request para trabalhar com os dados enviados do formulário, pelo controller do angular
        //model
        $tarefa = new listaDeTarefas();

        //recebe dados enviado do formulário resources/views/index.pgp
        $tarefa->texto = $request->input('texto');
        $tarefa->autor = $request->input('autor');
        $tarefa->status = $request->input('status');

        //grava dados no bd
        if($tarefa->save()){
            //resposta enviada para o controller do angular (public/js/app.js)
            return Response("1", 201);
        }else{
            //resposta enviada para o controller do angular (public/js/app.js)
            return Response("0", 304);
        }
    }

}
