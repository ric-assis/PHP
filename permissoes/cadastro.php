<?php 
	session_start();
	
	require_once "connect.class.php";
	require_once "permissao.class.php";
	
	if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){		
		header("location:index.php");
	}

	$permissao = new Permissao();	
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
			<h1 class="text-center">Cadastro de usuários</h1>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-end">
				<?php if($permissao->getPermissao($_SESSION["id"], 5)): //Mostra ou não o html contido dentro do if ?>	
					<a href="permissoes.php" class="btn btn-link">Cadastrar Permissões</a>
				<?php endif ?>	
					<a href="sair.php" class="btn btn-primary">Sair</a>
				</div>
			</div><hr/>
		
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form method="POST" class="border rounded shadow p-2">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input class="form-control" type="text" name="nome"/>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input class="form-control" type="text" name="email"/>
						</div>
						<div class="form-row">						
							<div class="col-md-8">
								<label for="email">Rua:</label>
								<input class="form-control" type="text" name="rua"/>						
							</div>
							<div class="col-md-4">
								<label for="email">Número:</label>
								<input class="form-control" type="text" name="numero"/>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-2 divSalvar">							
							<button class="btn btn-primary btnSalvar" type="submit">Cadastrar</button>					
							<button class="btn btn-primary btnGravarAtualizacao" type="button" >Atualizar</button>																				
						</div>
					</form>
				</div>
			</div><hr/>		
		
			<div class="row justify-content-center">
				<div class="col-md-12 table-responsive">
					<table id="tabela" class="table">
						<thead>
							<th>ID</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Rua</th>
							<th>Número</th>
							<th>Opções</th>
						</thead>
						<tbody>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
				
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>