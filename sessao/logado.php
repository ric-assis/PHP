<?php
	session_start();
	
	$id = $_SESSION["id"];
	
	require "connect.php";
	
	$sql = $pdo->query("SELECT nome, chave FROM usuario WHERE id='$id'");
	$sql = $sql->fetch();
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Sessao com login</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>		
		<style type="text/css">		
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Área de usuários logados</h1><hr/>
					<h1>Bem vindo(a) <?php echo strtoupper($sql["nome"]); ?></h1>
					<h5>Abra ou envie o link a um amigo:</h5>
					<h3 class="btn btn-link"><?php echo "<a href='http://localhost/sessao/verifica_chave.php?chave=".$sql["chave"]."'>Criar nova conta através de convite</a>"; ?></h3>	
					<hr/>
					<button class="btn btn-danger" id="sair">Sair</button>					
				</div>
			</div>			
		</div>
	
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>