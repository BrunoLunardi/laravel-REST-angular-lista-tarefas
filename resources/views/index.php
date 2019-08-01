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
    
    <!-- Tabelas para exibir os dados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Autor</th>
                <th>Status</th>
            </tr>
        </thead>
        <!-- Loop para apresentar os dadostarefas encontrado em public/js/app.js -->
        <tr ng-repeat="tarefa in dadostarefas">
            <td>{{tarefa.texto}}</td>
            <td>{{tarefa.autor}}</td>
            <td>{{tarefa.status}}</td>
        </tr>
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