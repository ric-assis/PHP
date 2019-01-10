<?php
	session_start();
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"]))
		header("location:conteudo.php");
		
?>

<!Doctype html>
<html>
	<header>
		<meta charset="UTF-8"/>
		<title>Marketing Multi-Nivel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>		
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<style type="text/css">
			html, body{
				height:100%;
			}
			
			.row{
				width:400px;
			}		
		</style>
	</header>
	<body>
		<div class="container-fluid h-100 d-flex justify-content-center align-items-center">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center text-secondary">Marketing Multi-Nivel</h3><hr/>
					<form id="logar" method="POST">
						<div class="form-group">
							<input class="form-control mb-2" type="text" name="email" placeholder="E-mail"/>			
							<input class="form-control"type="password" name="senha"placeholder="Senha"/>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" type="submit">Efetuar login</button>
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

