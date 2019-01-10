<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>XML</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet">
	</head>	
	<body>
		<div class="container">
			<h1 class="text-center">XML</h1><hr/>
			<div class="row justify-content-center">
				<div  class="col-md-6">
					<form method="GET" class="p-2">
						<div class="form-group">
							<label for="cd">CD:</label>
							<select>
								<option>Selecione um CD</option>
							</select>	
						</div>							
						<div class="form-group">
							<button id="btnSubmit" class="btn btn-primary" type="submit">Enviar</button>
						</div>
					</form>					
				</div>				
			</div>
			<div class="row justify-content-center">
				<div  class="col-md-6">
					<div id="div"></div>
				</div>
			</div>
		</div>
		<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="bootstrap.bundle.js" type="text/javascript"></script>
		<script src="ajax.js" type="text/javascript"></script>
	</body>
</html>