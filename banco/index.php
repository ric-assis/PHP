<?php
	session_start();
	
	/*if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){		
		header("location:movimento.php");
	}*/
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Banco Mundial</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style type="text/css">
			html, body{
				height:90%;				
			}			
			
			.largura{
				width:200px;
			}
			
			.largura-campo{
				width:200px;
			}
			
			.backspace{
				margin-left: -3px;
			}
		</style>
	</head>
	<body>		
		<div class="container mt-3"><h1 class="text-center">Banco Mundial</h1><hr/></div>
		<div class="container h-100 d-flex align-items-center justify-content-center">			
			<div class="container d-flex align-items-center flex-column">
				<div class="row largura-campo mb-3">
					<div class="col-md-12 ml-2 pr-0">
						<div class="d-flex justify-content-center">						
							<form method="POST" id="login" action="">								
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0 mb-2" name="conta" type="text" placeholder="Conta" />				
								<input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" name="senha" type="password" placeholder="Senha"  />
							</form>							
						</div>							
					</div>			
				</div>
				<div class="row largura justify-content-center">
					<div class="col-1 mr-2">
						<button class="btn btn-primary mb-1">7</button>	
						<button class="btn btn-primary mb-1">4</button>	
						<button class="btn btn-primary mb-1">1</button>	
						<button class="btn btn-primary mb-1">0</button>	
					</div>
					<div class="col-1 mr-2">
						<button class="btn btn-primary mb-1">8</button>	
						<button class="btn btn-primary mb-1">5</button>	
						<button class="btn btn-primary mb-1">2</button>		
						<button class="btn btn-primary mb-1">-</button>	
					</div>
					<div class="col-1 mr-2">
						<button class="btn btn-primary mb-1">9</button>	
						<button class="btn btn-primary mb-1">6</button>	
						<button class="btn btn-primary mb-1">3</button>	
						<button class="btn btn-primary mb-1 backspace">&#8592;</button>							
					</div>
					<div class="col-1 mr-2 d-flex ">						
						<button class="btn btn-primary mb-block ml-1 mb-1" onClick="$('#login').submit()">&#8629;</button>		
					</div>					
				</div>
				<div id="alerta"></div>
			</div>
		</div>
	
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
	<script src="jquery.mask.min.js" type="text/javascript"></script>
	<script src="teclado.js" type="text/javascript"></script>
	</body>	
</html>