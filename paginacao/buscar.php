<?php
	$txtBusca = addslashes($_GET["txtBusca"]);
	
	if(isset($txtBusca) && !empty($txtBusca)){
		require_once "connect.php";
		//Buscar o id
		$stm = $pdo->prepare("SELECT id FROM novelas WHERE novela = ?");
		$stm->bindValue(1, $txtBusca);
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetch(PDO::FETCH_ASSOC);
			$pos = $stm["id"];			
			
			//Como a lista é decrescente procura os ids maiores
			$sql = $pdo->query("SELECT COUNT(id) as posId FROM novelas WHERE id >= $pos");
			$sql = $sql->fetch();
			$pos = $sql["posId"];
			
			//Retorna a pagina
			$pg = $pos / 5;
			echo ceil($pg);			
		}else{
			echo "Novela não encontrada.";
		}
		
	}
?>


