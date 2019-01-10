<?php
	session_start();
?>
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Banco Mundial</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style type="text/css">						
			.conf_rel_sac{
				padding-left:30px;				
				background-color: #F8EF7A;	
				max-width:399px;		
			}
		</style>
	</head>
	<body>		
		<div class="container mt-3"><h1 class="text-center">Banco Mundial - Saque</h1><hr/></div>				
		<div class="container d-flex align-items-center justify-content-center">				
				<div class="row mb-3 d-flex flex-column align-items-center">				
					<div class="col-md-12">
											
							<form id="frmSaque" method="POST">	
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="agencia" type="text" placeholder="Agência" />	
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="conta" type="text" placeholder="Conta" />				
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="valor" type="text" placeholder="Valor" /><hr/>	
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="senha" type="password" placeholder="Senha" />		
							</form>							
													
					</div>			
				
				
					<div class="col-md-12 mt-3 mb-3">
						<button class="btn btn-primary mb-1 btn-block" onclick="$('#frmSaque').submit()">Confirmar</button>								
					</div>					
				
				<div id="relatorio_sac" class="col-md-12 justify-content-center mt-3">
					<div id="relatorioInt" class="col-md-12 mt-3 pt-2">							
							
					</div>	
				</div>				
			</div>
		</div>
	
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
	<script src="jquery.mask.min.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
	</body>	
</html>