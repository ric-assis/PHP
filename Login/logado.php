<?php
	session_start();			
		
	if(isset($_SESSION["ids"]) && !empty($_SESSION["ids"])){		
		echo '<h1 class="text-center">Usuário Logado '.$_SESSION["ids"].'</h1>';			
	}else{
		echo '<h1 class="text-center">Usuário Deslogado</h1>';	
	}
	
	
?>