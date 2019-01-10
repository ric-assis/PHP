<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Crud</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Crud</h1><hr/>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form method="POST" class="border shadow rounded p-2">
						<div class="form-row justify-content-center">
							<div class="col-md-1 form-group">
								<label for="id">ID:</label>
								<input class="form-control" type="text" name="id" disabled />
							</div>	
							<div class="col-md-11 form-group">
								<label for="nome">Nome:</label>
								<input class="form-control" type="text" name="nome"/>
							</div>
							<div class="col-md-12 form-group">								
								<label for="nome">E-mail:</label>
								<input class="form-control" type="email" name="email"/>
							</div>
							<div class="col-md-6 form-group">
								<label for="nome">Telefone:</label>
								<input class="form-control" type="tel" name="telefone">
							</div>
							<div class="col-md-6 form-group">
								<label for="nome">CPF:</label>
								<input class="form-control" type="text" name="cpf">
							</div>
						</div><hr/>
						<div class="col-md-12 d-flex justify-content-center flex-wrap">
							<div class="btn-group mb-2">
								<button class="btn btn-primary">Primeiro</button>
								<button class="btn btn-primary">Anterior</button>
								<button class="btn btn-primary">Proxímo</button>
								<button class="btn btn-primary">Ultimo</button>
							</div>
							<div class="btn_group_2">
								<input class="btn btn-primary ml-1" type="submit" value="Salvar"/>
								<button class="btn btn-danger ml-1">Excluir</button>
								<button class="btn btn-primary ml-1">Atualizar</button>
							</div>
						</div>
						
					</form>
				</div>				
			</div>
			
		</div>
		
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="jquery.mask.min.js" type="text/javascript"></script>
		<script src="jScript.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>