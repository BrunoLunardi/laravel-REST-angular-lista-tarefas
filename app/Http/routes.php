<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//pagina inicial
Route::get('/', function () {
    return view('index');
});

//grupo de rotas com o prefixo api
Route::group(array('prefix' => 'api'), function(){
    //rota api/tarefas 
    Route::resource('tarefas', 'TarefasController');
});