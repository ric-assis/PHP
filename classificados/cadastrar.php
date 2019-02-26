<?php 
	session_start();
	
	require_once "cadastrar.class.php";
		
	if((isset($_POST["email"]) && !empty($_POST["email"])) && (isset($_POST["nome"]) && !empty($_POST["nome"]))){
		if((isset($_POST["senha"]) && !empty($_POST["senha"]) && ($_POST["senha"] == $_POST["confirmar_senha"]))){
			$email = addslashes($_POST["email"]);
			$senha = addslashes($_POST["senha"]);
			$nome = addslashes($_POST["nome"]);		
			$telefone = addslashes($_POST["telefone"]);
				
			$cadastrar = new Cadastrar($email, $senha, $nome, $telefone);	
			
			$pdo = Connect::getPDO();					
			
			$stm = $pdo->prepare("INSERT INTO usuario(email, senha, nome, telefone) VALUES(?, ?, ?, ?)");
			$stm->bindValue(1, $cadastrar->getEmail());
			$stm->bindValue(2, $cadastrar->getSenha());
			$stm->bindValue(3, $cadastrar->getNome());
			$stm->bindValue(4, $cadastrar->getTelefone());
			$stm->execute();
			
			$id = $pdo->lastInsertId();			
			
			if(!empty($id)){
				$_SESSION["id"] = $id;
				header("location:index.php");
			}else{
				echo "<script> alert('Cadastro não realizado, erro no DB, tente novamente.')</script>";
			}			
		}else{
			echo "<script>alert('Verifique a senha digitada')</script>";			
		}		
	}
?>

<!Doctype html>
<html>
	<head>
		<meta charset="uft-8"/>
		<title>Classificados</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="assets/bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style>
			html,
			body{
				height:100%;
			}
		</style>	
	</head>
	<body class="bg-dark">
		<div class="container h-100">
			<div class="row h-100 d-flex justify-content-center align-items-center">
				<div class="row d-flex justify-content-center align-items-center bg-light rounded">
					<div class="col-md-6 mt-3">
						<img class="img-fluid w-100" src="imagens/logop.png" />
					</div>
					<div class="col-md-6 border-left mt-3">						
						<h4 class="text-center">Cadastro de usuários</h4>
						<form id="frmLogin" method="POST">
							<div class="form-group">								
								<input class="form-control" name="nome" type="text" placeholder="Nome"/>
							</div>
							<div class="form-group">								
								<input class="form-control" name="email" type="email" placeholder="Email"/>
							</div>
							<div class="form-group">
								<input class="form-control" name="telefone" type="text" placeholder="Telefone"/>
							</div>
							<div class="form-group">
								<input class="form-control" name="senha" type="password" placeholder="senha"/>
							</div>
							<div class="form-group">
								<input class="form-control" name="confirmar_senha" type="password" placeholder="Digite a senha novamente"/>
							</div>																					
							<div class="form-group d-flex justify-content-end">
								<button class="btn btn-primary" type="submit">Cadastrar</button>
							</div>	
						<form>
					</div>
				</div>
			</div>
		</div>
	
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/jquery.mask.min.js" type="text/javascript"></script>
		<script src="assets/conf.js" type="text/javascript"></script>		
	</body>
</html>