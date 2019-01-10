<?php
	require "connect.php"; 
	
	$sql = $pdo->query("SELECT * FROM post");
		
	if($sql->rowCount() > 0){	   
		$sql = $sql->fetchAll();
		echo json_encode($sql);
	}
?>