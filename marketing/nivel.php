<?php
	
	ob_start(); //Indica onde deve es iniciar a captura de buffer
	
	require_once "patente.php";	
	require_once "fn-patente.php";//Se já foi chamada não chamará novamente
	
	$conteudo_de_patente = ob_get_contents(); // guarda o conteúdo do arquivo na variável (parseado normal).
	ob_end_clean(); // limpa a memória podendo agora escolher a variavel a se usar
	
	$sql =  $pdo->query("SELECT id FROM cliente");
	if($sql->rowCount() > 0){		
		$sql = $sql->fetchAll();		
		
		foreach($sql as $chave => $clientes){
			$sql[$chave]["filhos"] =  calcular_patentes($clientes["id"], $limite);
		}
	}
	
	$p_sql = $pdo->query("SELECT nivel, qtponto FROM niveis ORDER BY qtponto DESC");
	if($p_sql->rowCount() > 0){
		$p_sql = $p_sql->fetchAll();
	}
	
	foreach($sql as $cliente){		
		foreach($p_sql as $patente){		
			if(intval($cliente["filhos"]) >= intval($patente["qtponto"])){					
				$stm = $pdo->prepare("UPDATE cliente SET nivel=? WHERE id=?"); 
				$stm->bindValue(1, $patente["qtponto"]);
				$stm->bindValue(2, $cliente["id"]);
				$stm->execute();
				break;
			}			
		}		
	}
	
?>






