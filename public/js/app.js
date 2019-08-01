(function(){
    //define o nome do modulo que estamos utilizando
    //está em resoucers/views/index.php
    var app = angular.module('tarefas', []);

    //criação do controller
    //$scope -> objeto que se refere ao modelo de aplicativo (contexto de execuções para expressõe)
    //$http -> serviço do angular facilita comunicação http
    app.controller('TarefasController', function($scope, $http){
        //função para carregar os dados da api
        $scope.loadData = function(){
            //obtém os dados que serão retornados para esta URL
                //pega os dados retornados da rota e do controller laravel
            $http.get('http://localhost:8000/api/tarefas').success(function(data){
                //armazena os dados obtidos na url
                $scope.dadostarefas = data;
            });
        }

        $scope.loadData();
    });

})();


/*
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
*/
