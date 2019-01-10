<?php
	session_start();
	
	if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){
		header("location:index.php");
	}
	
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Permissões</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>			
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Configurações das permissões</h1><hr/>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-end">					
					<a href="cadastro.php" class="btn btn-primary  mr-1">Voltar</a>
					<a href="sair.php" class="btn btn-primary">Sair</a>					
				</div>
			</div><hr/>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form id="frmSalvar" method="POST">
						<div class="form-row">
							<div class="col-md-6">
								<label for="cpf">CPF:</label>
								<select name="cpfAdicionar" class="form-control cpf">
									<option class="form-control">Selecione o usuário</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="permissao">Permissão:</label>
								<select name="permissao" class="form-control">
									<option>Selecione uma permissao</option>
								</select>
							</div>
							<div class="col-md-12 d-flex justify-content-end mt-2">
								<button class="btn btn-success" type="button" onclick="enviar()">Adicionar</button>
							</div>							
						</div>
					</form>
				</div>
			</div><hr/>
			
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form id="frmRemover" method="POST">
						<div class="form-row">
							<div class="col-md-6">
								<label for="cpf">CPF:</label>
								<select id="removerCPF" name="cpfRemover" class="form-control cpf">
									<option class="form-control">Selecione o usuário</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="permissao">Permissão:</label>
								<select name="permissao_remover" class="form-control">
									<option>Selecione uma permissao</option>
								</select>
							</div>
							<div class="col-md-12 d-flex justify-content-end mt-2">
								<button class="btn btn-danger mr-1" type="button" onclick='remover()'>Remover</button>
							</div>							
						</div>
					</form>
				</div>
			</div><hr/>
		
			<div class="row justify-content-center">
				<div class="col-md-8 table-responsive">
					<table class="table table-dark table-hover text-center">
						<thead>								
								<th>Usuário</th>
								<th>Permissão</th>							
						</thead>
						<tbody>
							
						</tbody>
					</div>
				</div>
			</div>
		</div>
				
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax_permissoes.js" type="text/javascript"></script>
	</body>
</html>