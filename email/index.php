<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>E-mail</title>		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>	
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">E-mail</h1><hr/>
			<div class="row justify-content-center">				
				<div class="col-md-8">
					<form method="POST" class="border rounded shadow p-2" >
						<div class="form-row">
							<div class="col-md-12 form-group">								
									<label for="nome">Nome:</label>
									<input class="form-control" type="text" name="nome"/>								
							</div>
							<div class="col-md-12 form-group">	
								<label for="email">E-mail:</label>
								<input class="form-control" type="text" name="email"/>
							</div>
							<div class="col-md-12 form-group">	
								<label for="emaildestino">E-mail de destino:</label>
								<input class="form-control" type="text" name="email-destino"/>
							</div>
							<div class="col-md-12 form-group">								
									<label for="titulo">Titulo:</label>
									<input class="form-control" type="text" name="titulo"/>								
							</div>
							<div class="col-md-12 form-group">	
								<label for="mensagem">Mensagem:</label>
								<textarea class="form-control" type="text" name="mensagem" rows="6"></textarea>						
							</div>	
							<div class="col-md-12 form-group d-flex justify-content-end">
								<button class="btn btn-primary" type="submit">Enviar</button>
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