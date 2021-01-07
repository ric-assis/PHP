<?php
	
?>

<!Doctype html>
<html>
	<head>
		<title>Consumindo API RestFull</title>
		<link href="bootstrap.css" style="text/css" rel="stylesheet">
		<style>
			#btn-atualizar{
				display:none;
			}
		</style>
	</head>
	<body>
		<div class="container pt-4">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form class="p-2 border rounded border-secondary">
						<div class="form-group">
							<label for="id">ID:</label>
							<input type="number" name="id" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" name="nome" class="form-control">
						</div>
						<div class="form-group">
							<label for="idade">Idade:</label>
							<input type="date" name="nascimento" class="form-control">
						</div>	
						<div class="row">
							<div class="div-btn col-md-12 d-flex justify-content-end">
								<button class="btn btn-success" type="submit">Enviar</button>
								<button id="btn-atualizar" class="btn btn-success">Atualizar</button>								
							</div>
						</div>	
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button id="btn-listar" class="btn btn-primary">Exibir todos os clientes</button>
				</div>
				<div class="listar-api col-md-12">
					
				</div>
			</div>
		</div>
		
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="script-js.js" type="text/javascript"></script>
	</body>
</html>		