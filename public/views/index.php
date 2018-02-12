<!DOCTYPE html>
<html>
<head>
	<title>Laravel/Angular Alzheimer APP</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	        <!-- Carrega bibliotecas Javascripts (AngularJS, JQuery, Bootstrap) -->
    
</head>
<body ng-app="listaUsuarios" ng-controller="usuariosController" >
	    <h1 class = "text-center">Sistema para identificação de pessoas portadoras de Alzheimer</h1>

	    <table class="table table-responsive table-hover">
	        <thead>
	            <tr>
	                <th>ID</th>
	                <th>Nome</th>
	                <th>Telefone</th>
	                <th>Endereco</th>
	                <th>QR Code</th>
	                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar novo usuario</button></th>
	            </tr>
	        </thead>
	        <tbody>
	            <tr data-ng-repeat="usuario in usuarios">
	                <td>{{ usuario.id }}</td>
	                <td>{{ usuario.nome }}</td>
	                <td>{{ usuario.telefone }}</td>
	                <td>{{ usuario.endereco }}</td>
	                <td>
	                	<img src="https://chart.googleapis.com/chart?cht=qr&chl=Nome:{{usuario.nome}}+Endereco:{{usuario.endereco}}Telefone:+{{usuario.telefone}}&chs=150x150&chld=L|0">
	                	<!-- <a href="https://chart.googleapis.com/chart?cht=qr&chl={{usuario.nome}}+{{usuario.endereco}}+{{usuario.telefone}}&chs=160x160&chld=L|0">QR-Code</a></td> -->
	                <td>
	                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', usuario.id)">Editar</button>
	                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(usuario.id)">Excluir</button>
	                </td>
	            </tr>
	        </tbody>
	    </table>

<!-- Modal (Pop up quando o botão de detalhes é clicado) -->
	            <div class="modal fade" name = "myModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                <div class="modal-dialog">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
	                        </div>
	                        <div class="modal-body">
	                            <form name="frmUsuarios" class="form-horizontal" novalidate="">
	
	                                <div class="form-group error">
	                                    <label for="nome" class="col-sm-3 control-label">Nome</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome completo" value="{{nome}}"
	                                        ng-model="usuario.nome" ng-required="true">
	                                        <span class="help-inline"
	                                        ng-show="frmUsuarios.nome.$invalid && frmUsuarios.nome.$touched">Nome é obrigatório.</span>
	                                    </div>
	                                </div>
	
	                                <div class="form-group">
	                                    <label for="url" class="col-sm-3 control-label">Endereco</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{endereco}}"
	                                        ng-model="usuario.endereco" ng-required="true">
	                                        <span class="help-inline"
	                                        ng-show="frmUsuarios.endereco.$invalid && frmUsuarios.endereco.$touched">Endereco é obrigatório.</span>
	                                    </div>
	                                </div>
	
	                                <div class="form-group">
	                                    <label for="telefone" class="col-sm-3 control-label">Telefone</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="telefone" ui-mask="9.999,99" name="telefone" placeholder="Telefone" value="{{telefone}}"
	                                        ng-model="usuario.telefone" ng-required="true">
	                                    <span class="help-inline"
	                                        ng-show="frmUsuarios.telefone.$invalid && frmUsuarios.telefone.$touched">Telefone é obrigatório.</span>
	                                    </div>
	                                </div>
	                            </form>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmUsuarios.$invalid">Salvar alterações</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
    <footer class="footer">
      <div class="container text-center">
        <span class="text-muted">Criado por Messias Vituriano - 2018</span>
      </div>
    </footer>

</body>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <!-- AngularJS Application Scripts -->
	<script type="text/javascript" src="../app/app.js"></script>
	<script type="text/javascript" src="../controllers/usuarios.js"></script>
	
	<script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("#telefone");
        $seuCampoCpf.mask('(00) 0000-0000', {reverse: true});
    });
	</script>

	<style type="text/css">
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 40px;
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 40px;
	  line-height: 40px; /* Vertically center the text there */
	  background-color: #f5f5f5;
	}
	.table td th{
   		text-align: center;   
	}
	</style>
</html>