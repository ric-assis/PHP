<html>
	<head>
		<title>MVC</title>
	</head>
	<body>
		<h1>Topo da página</h1>
		<h3>Barra de menus</h3>
		<a href="home">Home</a>
		<a href="galeria">Galeria</a>
		<hr/>
		 <?php $this->loadViewInTenplate($viewName, $viewData); ?>
	</body>
</html>