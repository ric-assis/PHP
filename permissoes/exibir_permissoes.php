<?php
	session_start();
	require_once "connect.class.php";
	
	/*Por default todas as páginas são acessiveis sendo bloquei o acesso onde achar necessario*/
	if(!isset($_SESSION["id"]) || empty($_SESSION["id"])){
		header("location:index.php");
	}
	
	$pdo = Connect::getPDO();
		$stm = $pdo->prepare("SELECT usuario.cpf, permissao.descricao FROM ((usuario_permisao_permissoes AS permissoes 
							 INNER JOIN  usuario_permissoes AS usuario ON usuario.id = permissoes.id_usuario)
							 INNER JOIN  permissao_permissoes AS permissao ON permissao.id = permissoes.id_permissao) ORDER BY usuario.cpf");
		$stm->execute();
		
		if($stm->rowCount() > 0){
			$stm = $stm->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($stm);			
		}else{
			echo "CPF não encontrado";
		}
?>