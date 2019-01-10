<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Login PHP</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>	
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<h1 class="text-center">Login com PHP</h1>
					<a id="fecharLog" href="sair.php" class="btn btn-danger">Fechar sessão</a>
				</div>
			</div><hr/>
			<div class="row justify-content-center">
				<div class="col-4 border">
					<form id="login" method="POST">
						<label for="lblNome">Usuário</label>
						<input class="form-control" name="nome" type="text"  />
						<label for="lblSenha">Senha</label>
						<input class="form-control" name="senha" type="password" />
						<div class="form-group mt-2 border-top d-flex justify-content-end">
							<input type="submit" class="btn btn-primary mt-2" value="Logar"/>
						</div>
					</form>
				</div>
			</div><hr/>
			<h1 class="text-center">Cadastro de usuário</h1><hr/>
			<div class="row justify-content-center">				
				<div class="col-4 border">
					<form id="cadastro" method="POST">						
						<label for="lblNome">Usuário</label>
						<input class="form-control" name="nomeCad" type="text"  />
						<label for="lblSenha">Senha</label>
						<input class="form-control" name="senhaCad" type="password" />
						<div class="form-group mt-2 border-top d-flex justify-content-end">
							<input type="submit" class="btn btn-primary mt-2" value="Cadastrar"/>
						</div>					
					</form>
				</div>
			</div><hr/>
			<?php 							
				require "logado.php";		
			?>
		</div>
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>