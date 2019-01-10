<?php
	session_start();
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Sessao com login</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>		
		<style type="text/css">
			html, body{ 
				height:100%;				
			}

			#row{
				width:400px;
			}
			
			input{
				border-right:0 !important;
				border-left:0  !important;
				border-top:0  !important;
				border-radius:0  !important;
				border-botton:2px solid #blue  !important;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid h-100 d-flex align-items-center justify-content-center">
			<div class="row" id="row">
				<div class="col-md-12">
					<form id="cadastrar" method="POST">				
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Nome" name="nome"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" placeholder="Senha" name="senha"/>
						</div>
						<div class="form-group">							
							<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
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