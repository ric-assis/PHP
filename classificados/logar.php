<?php
	session_start();
	require_once "connect.class.php";
	
	if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
		header("location:index.php");
	}

	if(isset($_COOKIE["classificados"])){
		$email = $_COOKIE["classificados"]["user"];
		$senha = $_COOKIE["classificados"]["pass"];		
		
		$pdo = Connect::getPDO();
		$stm = $pdo->prepare("SELECT id, senha FROM usuario WHERE email=? AND cookie=?");
		$stm->bindValue(1, $email);
		$stm->bindValue(2, $senha);
		$stm->execute();
		
		if($stm->rowCount() > 0){			
			$stm = $stm->fetch(PDO::FETCH_ASSOC);			
			
			/*if(password_verify($stm["senha"], $senha)){
			*INFELISMENTE O SERVIDOR DE HOSPEDAGEM NAO POSSUI SUPORTE AO PASSWORD_ARGON2I		
			*/			
			$_SESSION["id"] = $stm["id"];
			header("location:index.php");
		}else{
			header("location:logar.php?pag-acessada=index.php");	//Lembra a pagina que tentou aacessar	
		}
	}		
	
	if(!empty($_GET["pag-acessada"])){
		$redirect = $_GET["pag-acessada"];
	}		
	
?>
	
<!Doctype html>
<html>
	<head>
		<meta charset="uft-8"/>
		<title>Classificados</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="assets/bootstrap.css" type="text/css" rel="stylesheet"/>	
		<style>
			html,
			body{
				height:100%;
			}
		</style>	
	</head>
	<body class="bg-dark">
		<div class="container h-100">
			<div class="row h-100 d-flex justify-content-center align-items-center">
				<div class="row d-flex justify-content-center align-items-center bg-light rounded">
					<div class="col-md-6 mt-3">
						<img class="img-fluid w-100" src="imagens/logop.png" />
					</div>
					<div  class="col-md-6 border-left mt-3">
						<form id="frmLogin" method="POST" data-redirect="<?php echo $redirect ?>">
							<div class="form-group">
								<input class="form-control" name="email" type="email" placeholder="Email"/>
							</div>
							<div class="form-group">
								<input class="form-control" name="senha" type="password" placeholder="Senha"/>
							</div>
							<div class="col-md-12 d-flex justify-content-between pl-0 pr-0">
								<div class="form-group border-right pl-3 pr-3">
									<button class="btn btn-primary" type="submit">Logar</button>
								</div>
								<div class="form-group pl-3 pr-3">
									<button class="btn btn-primary" type="button">Cadastrar</button>
								</div>
							</div>
							<div class="form-group form-check">
								<input class="form-check-input" type="checkbox" name="chk" value="0"> 
								<label class="form-label-check text-secondary" for="chk">Lembrar de mim</label>
							</div>
						<form>
						<div id="divForm"></div>	
					</div> 
				</div>
			</div>
		</div>
	
		<script src="assets/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="assets/bootstrap.bundle.js" type="text/javascript"></script>
		<script src="assets/ajax.js" type="text/javascript"></script>
	</body>
</html>