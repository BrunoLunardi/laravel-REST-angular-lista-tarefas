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
        //método para adicionar tarefa
        $scope.adicionarTarefa = function(){
            dadosPost = {'texto':$scope.texto, 'autor':$scope.autor,
                'status':$scope.status}
            //realiza requisição do tipo post, para gravar dados
            //envia dos dados do formulário pelo array dadosPost para a rota de url, que acessará o controller Laravel
                //TarefasController no método store (requisição post)
            var requisicao = $http({method:"post", url:"api/tarefas",
            data:dadosPost}).success(function(data,status){
                //se gravou os dados
                if(data && status == 201){//status agora recebe o status da resposta HTTP de $http
                    //atualiza dados exibidos na tela e limpa os campos do formulário resoucers/views/index.php
                    $scope.loadData(function(){
                        $scope.texto ='';
                        $scope.autor ='';
                        $scope.status ='';
                      });
                }else{
                    window.alert("Não foi possível adicionar tarefa.");
                }
            });
        }
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
