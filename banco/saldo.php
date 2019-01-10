<?php
	session_start();
	
	date_default_timezone_set("America/Sao_Paulo");
		
	$id = $_SESSION["id"];
	
	$data_atual = date("d/m/Y");
	$hora_atual = date("H:i:s");
	
	
	
	if(isset($id) && !empty($id)){
		require "connect.php";
		
		$stm = $pdo->prepare("SELECT id, titular, agencia, conta, saldo FROM contas WHERE id=?");
		$stm->bindValue(1, $id);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);	
			
		}				
	}	
	

?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Banco Mundial</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style type="text/css">						
			.conf_saldo{
				padding-left:30px;				
				background-color: #F8EF7A;	
				max-width:399px;	
			}
		</style>
	</head>
	<body>		
		<div class="container mt-3"><h1 class="text-center">Banco Mundial - Saldo</h1><hr/></div>
		<div class="container d-flex align-items-center justify-content-center">			
			<div class="container d-flex align-items-center flex-column">				
				<div id="relatorio_saldo" class="row largura-campo justify-content-center mt-3">
					<div id="relatorioInt" class="col-md-10 mt-3 pt-2 conf_saldo">							
						<?php echo $data_atual ?> <strong>Banco Mundial</strong> <br/> 
						<?php echo $hora_atual ?> <br></hr><br/>
						Identificação da Conta: <?php echo $id ?> 
						<br/>Agência: <?php echo $stm["agencia"] ?> 
						<br/>Conta: <?php echo $stm["conta"] ?>						
						<br/>Titular: <?php echo $stm["titular"] ?> 							
						<br/>==========================														
						<br/><strong>Saldo: ----------- R$ <?php echo $stm["saldo"] ?></strong><br/>
						<br/>++++++++++++++++++++++++++<br/>v1.0	
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


