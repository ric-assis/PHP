<?php
	session_start();
	
	date_default_timezone_set("America/Sao_Paulo");
		
	$id = $_SESSION["id"];
	
	$data_atual = date("d/m/Y");
	$hora_atual = date("H:i:s");
	
	
	
	if(isset($id) && !empty($id)){
		require "connect.php";
		
		$stm = $pdo->prepare("SELECT id, tipo, valor, data_op FROM historico WHERE id_conta=?");
		$stm->bindValue(1, $id);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			//$ext = array();
			$stm = $stm->fetchAll(PDO::FETCH_ASSOC);	
			
		}				
	}	
	
	$sql = $pdo->query("SELECT agencia, conta, titular, saldo FROM contas WHERE id='$id'");
	if($sql->rowCount() > 0){
		$sql = $sql->fetch();
	}
	
	
	//A chave que marca a posicao no array criado $hist marca a posicao de regravacao no array principal	
	foreach($stm as $chave => $hist){
		$dia = substr($hist["data_op"], 8, 2);
		$mes = substr($hist["data_op"], 5, 2);
		$ano = substr($hist["data_op"], 0, 4);		
		
		$hist["data_op"] = $dia."/".$mes."/".$ano;
		$stm[$chave] = $hist;
		
		/*OBS: S data assim como um datetime do DB nao precisa desse processo simplesmente faça onde será mostrada a data e ate o horario:
			echo date(d/m/Y H:i, strtotime($stm["data_op"]));
			Date pega a data em string do vetor e converte para data entao altera o formato como o indicado antes.
		*/
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
		<div class="container mt-3"><h1 class="text-center">Banco Mundial - Extrato</h1><hr/></div>
		<div class="container d-flex align-items-center justify-content-center">			
			<div class="container d-flex align-items-center flex-column">				
				<div id="relatorio_saldo" class="row  justify-content-center mt-3">
					<div id="relatorioInt" class="col-md-10 mt-3 pt-2 conf_saldo shadow">							
						<?php echo $data_atual ?> <strong>Banco Mundial</strong><br/> 
						<?php echo $hora_atual ?> <br></hr><br/>
						Identificação da Conta: <?php echo $id ?> 
						<br/>Agência: <?php echo $sql["agencia"] ?> 
						<br/>Conta: <?php echo $sql["conta"] ?>						
						<br/>Titular: <?php echo $sql["titular"] ?> 							
						<br/>========================
						<table >
							<thead>
								<tr>
									<th>Data</th>
									<th></th>
									<th>Valor</th>
								</tr>
							</thead>
							<tbody>
								<?php  
									foreach($stm as $mov){
										?>
											<tr>
												<td>
													<?php echo $mov["data_op"]; ?>
												</td>
												<td width="105px" align="right">
													<?php 
														if((intval($mov["tipo"] == 0)) || (intval($mov["tipo"] == 2)))
															echo "-";
														else
															echo "+";	
													?>
												</td>
												<td>
													<?php echo "R$ ".$mov["valor"]; ?>
												</td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>	
						<br/><br/>========================		
						<br/><strong>Saldo: ----------- R$ <?php echo $sql["saldo"] ?></strong><br/>
						<br/>+++++++++++++++++++++++++<br/>v1.0	
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


