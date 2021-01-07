<?php 
	error_reporting(E_ALL);
    ini_set('display_errors',"on");  

	define("BASE_URL", "http://localhost/mvc/");
	
		
?>
<html>
	<head>
		<title><?php echo $viewData["titulo"] ?></title>
		<link href="assets/css/arq_css.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<h1>Topo da página</h1>
		<h3>Barra de menus</h3>
		<a href="<?php echo BASE_URL ?>">Home</a>
		<a href="<?php echo BASE_URL ?>galeria">Galeria</a>
		<a href="<?php echo BASE_URL ?>galeria/teste">Galeria/teste</a>
		<hr/>
		 <?php $this->loadViewInTenplate($viewName, $viewData); ?>
		<hr/>
		<footer>
			<h3>Exemplo MVC</h3>
			<p>O exemplo praticamente nao tem código extra sendo que o mesmo pode ser removido deixando somente o MVC</br>
			que poderá ser usado como molde para qualquer projeto</p>
		</footer>
	</body>
</html>