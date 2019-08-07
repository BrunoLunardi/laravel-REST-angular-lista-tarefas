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

        //função para adicionar tarefa
        //acessada pelo resources/views/index.php ->  ng-submit="adicionarTarefa()
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

        //função para alterar status da tarefa
        //acessada pelo resources/views/index.php -> ng-click="mudarStatus"
        $scope.mudarStatus = function(id, status){
            //recebe o novo dados de status
            dadosPost = {'status':status};
            //recebe os dados para altera a tarefa (recebe de resoucer/views/index.php)
            var requisicao = $http({method:"put",
                //passa para a rota laravel a id da tarefa e os dados novos da tarefa 
                //(no caso só a alteração do status)
                url:"api/tarefas/"+id,data:dadosPost}).success(function(data, status){
                    if(data.id == id && status == 201){//status agora é o status da resposta HTTP recebido de $http.
                        //atualiza tabela com novos dados
                        $scope.loadData();
                    }else{
                        window.alert("Não foi possível alterar a tarefa.");
                    }
                });
        }


        //função para excluir dados
        //acessada pelo resources/views/index.php -> ng-click="excluirTarefa()"
        $scope.excluirTarefa = function(id){
            //confirm -> método nativo do javascript para confirmar ação do usuário
            if(confirm("Confirma a exclusão da tarefa?")){
                //se ação for confirmada envia dados para o controller laravel
                var requisicao = $http({method:"delete",
                    url:"api/tarefas/"+id}).success(function(data, status){
                        if(data == 1 && status == 200){
                            //recarrega dados da página
                            $scope.loadData();
                        }else{
                            window.alert("Não foi possível excluir a tarefa.");
                        }
                    });
            }
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
