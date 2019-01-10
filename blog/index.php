<!Doctype html>
<html>
	<header>
		<meta charset="UTF-8"/>
		<title>Blog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<link href="bootstrap.css" type="text/css" rel="stylesheet"/>		
	</header>
	<body>
		<div class="container">
			<h1 class="text-center">BLOG</h1><hr/>
			<div class="row">
				<div class="col-md-12" id="local"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6">
								<label for="avatar">Avatar:</label>
								<input class="form-control-file" type="file" name="avatar"/>
							</div>
							<div class="col-md-6">								
								<label for="nome">Nome:</label>
								<input class="form-control" type="text" name="nome"/>	
							</div>
							<div class="col-md-12 mt-3">								
								<textarea class="form-control" rows="4" name="postagem"></textarea>	
							</div>
							<div class="col-md-12 mt-3 mb-3">								
								<button class="btn btn-primary" type="submit">Adicionar post</button>	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="bootstrap.bundle.js" type="text/javascript"></script>
	<script src="ajax.js" type="text/javascript"></script>
</html>