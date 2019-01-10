<?php
		session_start();
		require_once "connect.class.php";
		
		$cpf = addslashes($_POST["cpfAdicionar"]);
		$descricao = addslashes($_POST["permissao"]);
	
		if((isset($cpf) && !empty($cpf) && isset($descricao) && !empty($descricao))){
			$pdo = Connect::getPDO();			
			
			$stm = $pdo->prepare("select * from usuario_permisao_permissoes where 
								id_usuario = (select id from usuario_permissoes where cpf=?) and 
								id_permissao = (select id from permissao_permissoes where descricao=?)");
			$stm->bindValue(1, $cpf);
			$stm->bindValue(2, $descricao);
			$stm->execute();
			
			if($stm->rowCount() > 0){
				echo "permissão já concedida a esse usuário.";
			}else{				
				$stm = $pdo->prepare("insert into usuario_permisao_permissoes(id_usuario, id_permissao) values(
									(select id from usuario_permissoes where cpf=?), 
									(select id from permissao_permissoes where descricao=?))");
				$stm->bindValue(1, $cpf);
				$stm->bindValue(2, $descricao);
				$stm->execute();
				
				echo 1;				
			}
		}else{
			echo "Dados inválidos";
		}

?>