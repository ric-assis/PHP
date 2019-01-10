<?php
	session_start();
	
	require_once "connect.php";
	
	$pdo = Connect::getPDO();
	$id = $_SESSION["id"];
	$sql = $pdo->query("SELECT nome FROM usuario WHERE id=$id"); 
	$sql = $sql->fetch();
	
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Logado</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>			
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Olá <?php echo $sql["nome"]; ?></h1>
					<h1><?php if($id) echo "Você esta logado"; else echo "Não logado"; ?></h1><hr/>
					<button id="btnSair" class="btn btn-primary">Sair</button>
				</div>
			</div>
		</div>
		
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>