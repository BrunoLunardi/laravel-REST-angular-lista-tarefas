<!DOCTYPE html>
<html ng-app="tarefas">
<head>

    <meta charset="UTF-8">
    <title>Minha Lista de tarefas</title>
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<!-- aciona controller de public/js/app.js (TarefasController) -->
<!-- ng-controller liga o controller TarefasController com o alias tarefas-->
<body class="container" ng-controller="TarefasController as tarefas">
    <div class="page-header">
        <h2>Minha lista de tarefas</h2>
    </div>
    
    <!-- ng-submit -> angular para manipular dados do formulário -->
    <!-- Dados do formulário serão enviados para o controller do angular (public/js/app.js) -->
    <form ng-submit="adicionarTarefa()">
        <!-- ng-model é similar ao atributo name -->
        <label for="texto">Tarefa</label>
        <input id="texto" type="text" ng-model="texto" required
            placeholder="Texto" class="form-control" />
        <label for="autor">Autor</label>
        <input id="autor" type="text" ng-model="autor" required
            placeholder="Autor" class="form-control" />
        <label for="status">Status</label>
        <select id="status" ng-model="status" required class="form-control">
            <option value="Concluído">Concluído</option>
            <option value="Pendente">Pendente</option>
        </select>

        <input type="submit" value="Cadastrar" class="btn btn-default" />

    </form>


    <!-- Tabelas para exibir os dados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>X</th>
                <th>Tarefa</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Alterar</th>
            </tr>
        </thead>
        <tbody>
            <!-- recupera os dados via angular -->
            <!-- Loop para apresentar os dadostarefas encontrado em public/js/app.js -->
            <tr ng-repeat="tarefa in dadostarefas">
                <td>
                    <!-- chama método para excluir tarefa -->
                    <!-- método está em public/js/app.js -->
                    <span ng-click="excluirTarefa(tarefa.id)"
                        class="glyphicon glyphicon-remove"
                        aria-hidden="true"> </span>
                </td>
                <td>{{tarefa.texto}}</td>
                <td>{{tarefa.autor}}</td>
                <td>{{tarefa.status}}</td>
                <td width='10%'>
                    <!-- Verifica pelo angular o status da tarefa -->
                    <!-- Se for concluído, pode alterar para pendente -->
                    <span ng-if="tarefa.status == 'Concluído'">
                        <input type="button" value="Marcar como Pendente"
                            class="btn btn-success"
                            ng-click="mudarStatus(tarefa.id, 'Pendente')" />
                    </span>
                    <!-- Verifica pelo angular o status da tarefa -->
                    <!-- Se for diferente de concluído, pode alterar para concluído -->
                    <span ng-if="tarefa.status != 'Concluído'">
                    <input type="button" value="Marcar como Concluído"
                            class="btn btn-warning"
                            ng-click="mudarStatus(tarefa.id, 'Concluído')" />
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- 
    <div>
        //Exibe dados recuperados da controller TarefasController de public/js/app.js
        <h3>Tarefa: {{tarefas.tarefa.texto}}</h3>
        <h4>Autor: {{tarefas.tarefa.autor}}</h4>
        <h4>Status: {{tarefas.tarefa.status}}</h4>
    </div>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular.js">
    </script>
    <script src="js/app.js"></script>
</body>

</html>