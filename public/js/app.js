(function(){
    //define o nome do modulo que estamos utilizando
    //está em resoucers/views/index.php
    var app = angular.module('tarefas', []);

    //criação do controller
    app.controller('TarefasController', function(){
        this.tarefa = tarefa;
    });

    var tarefa = {'texto':'Teste','autor':'Eu mesmo','status':'concluido'};

})();

