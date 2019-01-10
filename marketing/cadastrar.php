<?php
	session_start();	
	
	$nome = ucfirst($_GET["nome"]);	
	$nivel = ucfirst($_GET["nivel"]);
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Marketing Multi-Nivel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>		
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
	<head>
	<body>
		<div class="container">
			<?php require_once "nav.php"  ?>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form class="border rounded" method="POST" style="margin-top:200px;" id="salvar">							
						<div class="form-group">
							<div class="col-md-12">
								<label for="id">Nome:</label>
								<input class="form-control" type="text" name="nome"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="id">E-mail:</label>
								<input class="form-control" type="text" name="email"/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="id">Senha:</label>
								<input class="form-control" type="password" name="senha"/>
							</div>
						</div>
						<div class="form-group mr-3 d-flex justify-content-end">
							<button class="btn btn-primary" type="submit">Cadastrar</button>							
						</div>
					</form>										
				</div>
			</div>
		</div>	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>		
	<body>
</html>