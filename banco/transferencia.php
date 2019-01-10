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
			.conf_rel_trans {
				padding-right:30px;				
				background-color:#F8EF7A;	
				max-width:399px;			
			}
		</style>
	</head>
	<body>		
		<div class="container mt-3"><h1 class="text-center">Banco Mundial - Transferência</h1><hr/></div>
		<div class="container d-flex align-items-center justify-content-center">			
			<div class="container d-flex align-items-center flex-column">
				<div class="col-md-12 d-flex justify-content-center">
					<div class="row  mb-3">
						<div class="col-md-12 pr-0">
							<div class="d-flex justify-content-center">						
								<form method="POST" id="frmTransferencia">	
									<div class="form-row border-1">
										<div class="col-md-5 border-right">
											Sua conta:
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="agencia" type="text" placeholder="Agência" />	
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="conta" type="text" placeholder="Conta" />	
						
										</div>
										<div class="col-md-5">	
											Beneficiado:
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="ag_beneficiado" type="text" placeholder="Agência" />	
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="ct_beneficiado" type="text" placeholder="Conta beneficiado" />			
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="valor" type="text" placeholder="Valor" />	
										</div>	
									</div>
									<hr/>
									<div class="form-row justify-content-center">
										<div class="col-6">
											Confirme sua senha:
											<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="senha" type="password" placeholder="Senha"/>
										</div>
									</div>											
								</form>							
							</div>							
						</div>			
					</div>					
				</div>
				<div class="row largura justify-content-center">
					<div class="col-md-12 p-0 m-0">
						<button class="btn btn-primary mb-1 btn-block" onclick="$('#frmTransferencia').submit()">Transferir</button>								
					</div>					
				</div>
				<div id="relatorio_trans" class="row largura-campo justify-content-center mt-3">
					<div id="relatorioInt" class="col-md-10 mt-3 pt-2">							
							
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