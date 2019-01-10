<?php
	require "connect.php";
	
	$id = addslashes($_GET['id']);

	if(isset($id) && !empty($id)){ 
				
		$stm = $pdo->prepare("SELECT * FROM cliente WHERE id > ?");
		$stm->bindValue(1, $id);
		$stm->execute();
			
		if($stm->rowCount() > 0){	  	
			$cadastro = $stm->fetch(PDO::FETCH_ASSOC);		
			echo json_encode($cadastro);		
		}
	}
?>