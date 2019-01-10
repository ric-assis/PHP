<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>CRUD OO</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
		<style>
			html, body{
				height:90%;
			}
				
		</style>
	</head>
	<body>
		<div class="container h-100">
			<h1 class="text-center">CRUD OO</h1><hr/>
			<div class="row justify-content-center h-100 d-flex align-items-center">
				<div class="col-md-8">
					<form method="POST" class="border shadow p-2">
						<div class="form-row">
							<div class="col-md-2">
								<div class="form-group">
									<label for="id">Código:</label>
									<input class="form-control" type="text" name="id" readonly="true" />									
								</div>
							</div>	
							<div class="col-md-10">
								<div class="form-group">									
									<label for="nome">Nome:</label>
									<input class="form-control" type="text" name="nome"/>									
								</div>
							</div>								
							<div class="col-md-12">
								<div class="form-group">									
									<label for="email">E-mail:</label>
									<input class="form-control"type="text" name="email"/>									
								</div>
							</div>							
							<div class="col-md-12">
								<div class="form-group">
									<label for="rua">Rua</label>
									<input class="form-control" type="text" name="rua"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="bairro">Bairro:</label>
									<input class="form-control" type="text" name="bairro"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="numero">Numero:</label>
									<input class="form-control" name="numero" type="text"/>
								</div>
							</div>
							<div class="col-md-12 d-flex justify-content-center mt-2 mb-2">
								<div class="btn-group">
									<button class="btn btn-primary" id="btnPrimeiro">Primeiro</button>
									<button class="btn btn-primary" id="btnAnterior">Anterior</button>
									<button class="btn btn-primary" id="btnProximo">Proxímo</button>
									<button class="btn btn-primary" id="btnUltimo">Último</button>
								</div>
								<button class="btn btn-success ml-1" type="submit" id="btnSalvar">Salvar</button>
								<button class="btn btn-primary ml-1" id="btnNovo">Novo</button>
								<button class="btn btn-danger ml-1" id="btnExcluir">Excluir</button>
								<button class="btn btn-primary ml-1" id="btnAtualizar">Atualizar</button>
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