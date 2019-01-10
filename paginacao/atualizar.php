<?php
	$tipo = addslashes($_GET["tipo"]);//Determina se a atualizacao ira alterar a capa, 0 nao 1 sim
	
	$id = addslashes($_GET["id"]);
	$novela = addslashes($_POST["novela"]);
	$ano = addslashes($_POST["ano"]);
	$resumo = addslashes($_POST["resumo"]);
	
	switch($tipo){	
		case 0:
			if((isset($id) && isset($novela)) && (!empty($id) && !empty($novela))){
				require_once "connect.php";
				
				$stm = $pdo->prepare("UPDATE novelas SET novela = ?, ano = ?, resumo = ?  WHERE id = ?");
				$stm->bindValue(1, $novela);
				$stm->bindValue(2, $ano);
				$stm->bindValue(3, $resumo);
				$stm->bindValue(4, $id);
				$stm->execute();		
			}else{
				echo "Valores inválidos";
			}
			break;
			
		case 1:
			$capaAtual = addslashes($_GET["foto"]);
			
			if(isset($capaAtual) && !empty($capaAtual)){
				unlink($capaAtual);
				
			}
					
			$capa = $_FILES["capa"];
			
			$cpName = $_FILES["capa"]["name"];
			$cpSize = $_FILES["capa"]["size"];
			$cpError = $_FILES["capa"]["error"];
			$cpType = $_FILES["capa"]["type"];
			
			$tipoExt = array("image/png", "image/jpg", "image/jpeg", "image/pjpeg");
			$tamanho = 2048 * 1024;
					
			if($cpError == 0){
				if(!in_array($cpType, $tipoExt)){
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
			
			if((isset($capa["tmp_name"]) && isset($id) && isset($novela)) && (!empty($capa["tmp_name"]) && !empty($id) && !empty($novela))){
				require_once "connect.php";
				
				move_uploaded_file($capa["tmp_name"], "capas/".$nome_do_arquivo);
				
				$stm = $pdo->prepare("UPDATE novelas SET novela = ?, ano = ?, resumo = ?, capa = ? WHERE id = ?");
				$stm->bindValue(1, $novela);
				$stm->bindValue(2, $ano);
				$stm->bindValue(3, $resumo);
				$stm->bindValue(4, "capas/".$nome_do_arquivo);
				$stm->bindValue(5, $id);
				$stm->execute();		
			}else{
				echo "Ocorreu um erro ao salvar a novela tente novamente.";	
			}		
			break;
	}	
?>