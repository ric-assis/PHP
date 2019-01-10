<?php
	$novela = addslashes($_POST["novela"]);
	$ano = addslashes($_POST["ano"]);
	$resumo = addslashes($_POST["resumo"]);
	
	$capa = $_FILES["capa"];
	
	$cpSize = $_FILES["capa"]["size"];
	$cpError = $_FILES["capa"]["error"];
	$cpName = $_FILES["capa"]["name"];
	$cpType = $_FILES["capa"]["type"];
	
	$tipo = array("image/png", "image/jpg", "image/jpeg", "image/pjpeg");
	$tamanho = 2048 * 1024;
	
	if($cpError == 0){
		if(!in_array($cpType, $tipo)){
			echo "Tipo de arquivo inválido. Tipos compativeis: png, jpg, jpeg, pjpeg";
			exit;
		}
		if($cpSize > $tamanho){
			echo "Tamanho maior que 2MB";
			exit;
		}		
	}
	
	$ext = explode(".", $cpName);
	$extensao = end($ext);
	
	$nome_do_arquivo = md5(time().rand(0,99)).".".$extensao;
	
	if((isset($capa["tmp_name"])) && (!empty($capa["tmp_name"]))){
		require_once "connect.php";
		
		move_uploaded_file($capa["tmp_name"], "capas/".$nome_do_arquivo);
		
		$stm = $pdo->prepare("INSERT INTO novelas(novela, ano, resumo, capa) VALUES(?, ?, ?, ?)");
		$stm->bindValue(1, $novela);
		$stm->bindValue(2, $ano);
		$stm->bindValue(3, $resumo);
		$stm->bindValue(4, "capas/".$nome_do_arquivo);
		$stm->execute();

	}else{
		echo "Ocorreu um erro ao salvar a novela tente novamente.";	
	}
	
?>