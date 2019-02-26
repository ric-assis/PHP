<?php
	require_once "connect.class.php";
	
	function excluir_anuncio($id_anuncio){
	
		$pdo = Connect::getPDO();
		
		if(isset($id_anuncio) && !empty($id_anuncio)){										
			//Seleciona o anuncio apartir do id recebido
			$stm = $pdo->prepare("SELECT id_usuario FROM anuncio WHERE id=?");
			$stm->bindValue(1, $id_anuncio);
			$stm->execute();
			if($stm->rowCount() > 0){
				$anuncio = $stm->fetch(PDO::FETCH_ASSOC);		
			}
			
			//Verifica se é o usuario dono do anuncio
			if($_SESSION["id"] != $anuncio["id_usuario"]){
				header("location:logar.php?pag-acessada=meus-produtos.php");
			}else{
				//Procura todas as fotos com o id_anuncio indicado
				$stm = $pdo->prepare("SELECT foto FROM fotos WHERE id_anuncio=?");
				$stm->bindValue(1, $id_anuncio);
				$stm->execute();
				if($stm->rowCount() > 0){
					$fotos = $stm->fetchAll(PDO::FETCH_ASSOC);		
				}			
				
				//Exclui todos os arquivos das fotos
				foreach($fotos as $foto){				
					unlink($foto["foto"]);					
				}			
				
				//Apaga os registros das fotos do DB
				$stm = $pdo->prepare("DELETE FROM fotos WHERE id_anuncio=?");
				$stm->bindValue(1, $id_anuncio);
				$stm->execute();
							
				//Apaaga o anuncio
				$stm = $pdo->prepare("DELETE FROM anuncio WHERE id=?");
				$stm->bindValue(1, $id_anuncio);
				$stm->execute();			
				
			}
		}
	}		
