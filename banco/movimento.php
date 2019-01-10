<?php
	session_start();
?>
<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Movimentação</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>		
	</head>
	<body>		
		<div class="container">
			<h1 class="text-center">Banco Mundial</h1><hr/>
			<div class="row  d-flex align-items-start ">
				<div class="col-md-3 mt-3 d-flex flex-column">											
						<button id="btnDeposito" class="btn btn-primary btn-block mb-2">Depósito</button>
						<div><hr/></div>	
						<button id="btnTransferencia" class="btn btn-primary btn-block mb-2">Transferência</button>	
						<div><hr/></div>	
						<button id="btnSair" class="btn btn-primary btn-block mb-2">Sair</button>	
				</div>				
			
				<div class="col-md-6 d-flex justify-content-center  border-right border-left">
					<img class="img-response" src="imagens/caixa1.png"/>
				</div>
				<div class="col-md-3 mt-3 d-flex flex-column">								
					<button id="btnSaque" class="btn btn-primary btn-block mb-2">Saque</button>
					<div><hr/></div>
					<button id="btnSaldo" class="btn btn-primary btn-block mb-2">Saldo</button>
					<div><hr/></div>
					<button id="btnExtrato" class="btn btn-primary btn-block mb-2">Extrato</button>
				</div>			
			</div>
		</div>
	
	</body>	
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
	<script src="jquery.mask.min.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
</html>