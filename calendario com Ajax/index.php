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
			<div class="row justify-content-center">	
				<div id="data_extenso" class="col-md-6"></div>					
			</div>	
				<div class="row justify-content-center">					
					<div class="col-md-8">
						<form method="GET">
							<div class="row justify-content-center">
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
								<div id="divAno" class="col-md-5">
									
								</div>									
							</div>								
						</form>
					</div>
				</div>
				<div class="row justify-content-center">	
					<div class="col-md-8 d-flex justify-content-between">
						<div id="ant" class="btn btn-link" style="font-weight:bold; text-decoration:none;"><h1>&#8592;</h1></div>
						<div id="prox"  class="btn btn-link" style="font-weight:bold; text-decoration:none;"><h1>&#8594;</h1></div>
					</div>
				</div>	
				<div class="row justify-content-center">
					<div class="col-md-8 table-responsive">
						<table class="table table-lg table-brdered text-center">
							<thead class="thead-dark">
								<th>Dom</th>
								<th>Seg</th>
								<th>Ter</th>
								<th>Qua</th>
								<th>Qui</th>
								<th>Sex</th>
								<th>Sáb</th>							
							</thead>
							<tbody>
								
							</tbody>
						</table>											
					</div>
				</div>
			</div>

	
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>	
</html>