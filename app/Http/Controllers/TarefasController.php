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

}
