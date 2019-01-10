<?php
	require_once "connect.php";
	
	$pag = addslashes($_GET["pag"]); //Pagina atual			
	$tipo = addslashes($_GET["tipo"]);//Determina a organizacao a ser motrada ao carregar a pagina, por novela, ano ou por ordem de inserção
	
	if((isset($tipo) && isset($pag)) && (!empty($tipo) && !empty($pag))){
		$reg_inicial = ($pag - 1) * 5; //Reponsavel por indicar onde se inicia a paginacao
		
		switch($tipo){
			case "default":					
				$sql = $pdo->query("SELECT * FROM novelas ORDER BY id DESC LIMIT $reg_inicial, 5");
				if($sql->rowCount() > 0){
					$sql = $sql->fetchAll();
					echo json_encode($sql);
				}else{
					echo "Ocorreu um erro, tente novamente.";
				}
				break;
			case "nome":
				$sql = $pdo->query("SELECT * FROM novelas ORDER BY novela LIMIT $reg_inicial, 5");
				if($sql->rowCount() > 0){
					$sql = $sql->fetchAll();
					echo json_encode($sql);
				}else{
					echo "Ocorreu um erro, tente novamente.";
				}			
				break;
			case "ano":
				$sql = $pdo->query("SELECT * FROM novelas ORDER BY ano LIMIT $reg_inicial, 5");
				if($sql->rowCount() > 0){
					$sql = $sql->fetchAll();
					echo json_encode($sql);
				}else{
					echo "Ocorreu um erro, tente novamente.";
				}
				break;		
		}	
		
	}else{
		echo "Ocorreu um erro, tente novamente mais tarde.";
	}
?>