<?php
	if(isset($_GET["nome"])){
		$nome = addslashes($_GET["nome"]);
		$email = addslashes($_GET["email"]);
		$descricao = $_GET["descricao"];
		$descricao2 = $_GET["descricao"];		
		
		$retorno = array("nome" => $nome, 
						"email" => $email,
						"descricao" => $descricao
						);
						
		
		echo json_encode($retorno);
		exit;
	}		
?>

<!Doctype html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Editor de Texto</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<link href="summernote-bs4.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="text-center">Editor de Texto</h1><hr/>
					
					<div id="editor"></div>	
					<form method="GET">
						<div class="form-group">
							<input class="form-control mb-2" type="text" name="nome" placeholder="Nome" />
							<input class="form-control" type="text" name="email" placeholder="Email" />
						</div>
						<div class="form-group">
							<textarea class="summernote" name="descricao"></textarea>
						</div>
						<div class="d-flex justify-content-end">
							<button class="btn btn-primary" type="submit">Enviar</button>
						</div>	
					</form>					
				</div>
			</div><hr/>
			<div class="row">
				<div class="col-md-8">
					<textarea class="summernote" name="descricao-recebida"></textarea>
				</div>
			</div>	
		</div>
	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="summernote-bs4.js" type="text/javascript"></script>
		<script src="conf.js" type="text/javascript"></script>
		<script src="lang/summernote-pt-BR.js" type="text/javascript"></script>	<!-- Adicionar o idioma -->	
	</body>	
</html>