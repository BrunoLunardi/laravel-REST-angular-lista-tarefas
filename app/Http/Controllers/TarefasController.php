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

    //função para alterar o status da tarefa no BD
    //acessada pela url enviada de public/js/app.js
    public function update($id, Request $request){
        //localiza a tarefa do BD pela id
        $tarefa = listaDeTarefas::find($id);
        //objeto $tarefa recebe novo status
        $tarefa->status = $request->input('status');
        //atualiza novo status no BD
        if($tarefa->save()){
            //retorna json e valor da resposta de sucesso de alteração de dados
            return Response()->json($tarefa, 201);
        }else{
            //erro ao inserir dados
            return Responser("0", 304);
        }
    }

    //função para exclusão de tarefas no BD
    //acessada pela url enviada de public/js/app.js
    public function destroy($id){
        $tarefa = listaDeTarefas::find($id);
        if($tarefa->delete()){
            //retorna json e valor da resposta de sucesso de alteração de dados
            return Response("1", 200);
        }else{
            //erro ao inserir dados
            return Response("0", 304);
        }
    }

}
