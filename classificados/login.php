<?php
	session_start();
	require_once "connect.class.php";
	require_once "login.class.php";
		
	$email = addslashes($_POST["email"]);
	$senha = addslashes($_POST["senha"]);
		
	/*if(isset($_POST["chk"])){
		$lemb_senha = addslashes($_POST["chk"]);
	}*/
	
	if(isset($email) && !empty($email) && isset($senha) && !empty($senha)){
		$pdo = Connect::getPDO();
		
		$login = new Login($email, $senha);
				
		
		if(!empty($login->getLogin())){
			
			$_SESSION["id"] = $login->getLogin();
			
			if(isset($_POST["chk"]) && !isset($_COOKIE["classificados[pass]"]) && !isset($_COOKIE["classificados[user]"])){
				setcookie("classificados[user]", $login->getEmail(), strtotime("+10 days"), "/");//Não foram aplicados os devidos sistemas de segurança por ser um exemplo 				
				/*A barra no final pode ser usado caso o cookie nao seja reconhecido em todas as paginas
				é o caminho dele no caso no site todo por devido a /
				*/
				/*
				$options = ["cost" => 10];
				$cookie = password_hash($login->getSenha(), PASSWORD_ARGON2I, $options);
				
				*INFELISMENTE O SERVIDOR DE HOSPEDAGEM NAO POSSUI SUPORTE AO PASSWORD_ARGON2I
				*/
				
				$cookie = md5($login->getSenha());
				setCookie("classificados[pass]", $cookie,strtotime("+10 days"));	
				$id = $login->getLogin();
				$sql = $pdo->query("UPDATE usuario SET cookie='$cookie' WHERE id=$id");
			
			}
			
			echo "1";	//Login encontrado
		}else{
			echo "0"; //Login nao encontrado			
		}			
	}
	
?>