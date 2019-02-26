<?php
	header("Content:text/html;charset=utf-8");
	date_default_timezone_set("America/Sao_Paulo");
	
	if(isset($_GET["mes"]) && isset($_GET["ano"])){
		$mes =$_GET["mes"];
		$ano =$_GET["ano"];
		$data = date($ano."-".$mes);		
	}else{	
		$data = date("Y-m");
	}
	//echo "Data: ".$data;
	$totalDiasMes = date("t", strtotime($data));
	//echo "<br/>Dias do mes: ".$totalDiasMes;
	$dia1 = date("w", strtotime($data));
	//echo "<br/>1Dia: ".$dia1;
	$linha = ceil(($totalDiasMes+$dia1)/7);
	//echo "<br/>Linha: ".$linha;
	$dia1 = -$dia1;
	//echo "<br/>Dias antes: ".$dia1;
	$dataInicial = date("Y-m-d", strtotime($dia1."days", strtotime($data)));//A data - os dias do outro mes que iniciam o calendario ex: 02/02 -3days = 31/01 é o 1 dia que será mostrado
	//echo "<br/>1 dia do calendário: ".$dataInicial;
	$dataFinal = date("Y-m-d", strtotime(($dia1 + ($linha * 7)-1)."days", strtotime($data))); 
	//echo "<br/>Ultimo dia do calendário: ".$dataFinal;
	

?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Calendário</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Calendário</h1><hr/>	
				</div>	
			</div>
			<div class="row justify-content-center mb-2">	
				<div class="col-md-6">
					<form method="GET">
						<div class="form-row">
							<div class="col-md-5">
								<select class="form-control" name="mes">
									<option></option>
									<option value="1">Janeiro</option>
									<option value="2">Fevereiro</option>
									<option value="3">Março</option>
									<option value="4">Abril</option>
									<option value="5">Maio</option>
									<option value="6">Junho</option>
									<option value="7">Julho</option>
									<option value="8">Agosto</option>
									<option value="9">Setembro</option>
									<option value="10">Outubro</option>
									<option value="11">Novembro</option>
									<option value="12">Dezembro</option>											
								</select>
							</div>
							<div class="col-md-5">
								<select class="form-control"  name="ano">
									<option></option>
									<?php for($i=2051; $i>1970; $i--): ?>
										<option value= <?php echo $i ?>> <?php echo $i ?> </option>
									<?php endfor ?>
								</select>
							</div>
							<div class="col-md-2">
								<button class="btn btn-primary" type="submit">Selecionar</button>
							</div>	
						</div>								
					</form>											
				</div>	
			</div>
			<div class="row">
				<div class="col-md-12 table-responsive">
					<table class="table table-lg table-brdered">
						<thead class="thead-dark text-center">
							<th>Dom</th>
							<th>Seg</th>
							<th>Ter</th>
							<th>Qua</th>
							<th>Qui</th>
							<th>Sex</th>
							<th>Sáb</th>							
						</thead>
						<tbody class="text-center">
							<?php for($l = 0; $l < $linha; $l++): ?>
								<tr>
									<?php for($c = 0; $c < 7; $c++): ?>
										<?php $celula = date("d", strtotime($c + ($l * 7)."days", strtotime($dataInicial))); ?>
										<td> <?php echo $celula; ?> </td>
									<?php endfor ?>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>											
				</div>
			</div>
		</div>
	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
	</body>	
</html>