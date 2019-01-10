<?php 
	session_start();
	
	require_once "connect.php";
	
	if(isset($_GET["id"]) && !empty($_GET["id"])){
		$id = addslashes($_GET["id"]);
	}
	
	if((isset($_POST["nome"]) && isset($_POST["senha"])) && (!empty($_POST["nome"]) && !empty($_POST["senha"]))){
		$nome = addslashes($_POST["nome"]);
		$senha = addslashes($_POST["senha"]);
		
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare("UPDATE usuario SET nome=?, senha=? WHERE id=?");
		$stm->bindValue(1, $nome);
		$stm->bindValue(2, md5($senha));
		$stm->bindValue(3, $id);		
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$novo_hash = md5(time().rand(0,999).rand(0,999));
			
			$sql = $pdo->query("UPDATE token SET token_usado = 0,  token_hash = '$novo_hash'");
			
			$_SESSION["id"] = $id;
			
			header("location:logado.php");			
		}else{
			echo "Erro ao atualizar senha.";
		}
	}
?>


<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Esqueci minha senha</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style>
			body, 
			html{
				height:100%;
			}
			
			.container{
				height:100%;
			}			
		</style>
	</head>
	<body>
		<div class="container d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" class="border rounded shadow">
						<div class="form-row p-2">
							<div class="col-md-12">
								<label for="nome">Nome</label>
								<input class="form-control" name="nome" type="text"/>
								<label for="senha">Senha</label>
								<input class="form-control" name="senha" type="password"/>
							</div>
							<div class="col-md-12 d-flex justify-content-end mt-2">
								<button class="btn btn-primary" type="submit">Atualizar</button>
							</div>														
						</div>
					</form>					
				</div>
			</div>
		</div>			
		
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>