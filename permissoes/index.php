<?php
	session_start();
	require_once "connect.class.php";
	
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
		header("location:cadastro.php");
	}
	
	
	if((isset($_POST["nome"]) && isset($_POST["senha"])) && (!empty($_POST["nome"]) && !empty($_POST["senha"]))){
		$nome = addslashes($_POST["nome"]);	
		$senha = addslashes($_POST["senha"]);
		$senha = md5($senha);
		
		$pdo = Connect::getPDO();
		
		$stm = $pdo->prepare("SELECT id FROM usuario_permissoes WHERE (nome=? OR cpf=?) AND senha=?");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, $nome);
		$stm->bindValue(3, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$_SESSION["id"] = $stm["id"];
			
			header("location:cadastro.php");
		}else{
			echo "<script> alert('Senha ou usuario inválidos') </script>";
		}			
	}	
	
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Permissões</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style type="text/css">
			html,body{
				height:100%;
			}	
			
			.row{
				width:400px;
			}
		</style>
	</head>
	<body>
		<div class="container h-100 d-flex justify-content-center align-items-center">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" class="border rounded shadow p-2">
						<div class="form-group">
							<label for="nome">Nome/CPF:</label>
							<input class="form-control" type="text" name="nome"/>
						</div>
						<div class="form-group">
							<label for="senha">Senha:</label>
							<input class="form-control" type="password" name="senha"/>
						</div><hr/>
						<div class="d-flex justify-content-end">
							<button class="btn btn-primary" type="submit">Logar</button>
						</div>
					</form>
				</div>
			<div>
		</div>
				
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
	</body>
</html>