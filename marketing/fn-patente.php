<?php
	function patentes($id, $limite){
		global $pdo;
		
				
		$sql =  $pdo->query("SELECT cliente.id, cliente.nome, cliente.email, cliente.data_cad, 
							cliente.nivel, niveis.nivel as n_nivel FROM cliente LEFT JOIN niveis ON 
							niveis.qtponto = cliente.nivel WHERE cliente.id_pai='$id'");
		if($sql->rowCount() >= 0 ){
			$sql = $sql->fetchAll();//Seleciona todos os ids em ordem da raiz ate a folha				
			
				
			foreach($sql as $chave => $clientes){
				if($limite > 0){//Limite de filhos					
					//Reescreve o formato da data nos arrays que serao exibidos
					/*$sql[$chave]["data_cad"] = substr($clientes["data_cad"],8,2)."/".substr($clientes["data_cad"],5,2)."/".substr($clientes["data_cad"],0,4);
					$sql[$chave][3] = substr($clientes[3],8,2)."/".substr($clientes[3],5,2)."/".substr($clientes[3],0,4);*/
					$sql[$chave]['filhos'] = patentes($clientes['id'], --$limite); /*Pega todos os arrays com id_pai = id recursivamente e adiciona no novo campo ou array filhos criado*/
				}
			}
		}		
		return $sql;
	}
	
	function calcular_patentes($id, $limite){
		global $pdo;
		
				
		$sql =  $pdo->query("SELECT id, nome, email, data_cad, nivel FROM cliente WHERE id_pai='$id'");
		$nivel = 0;
		if($sql->rowCount() >= 0 ){
			$nivel = $sql->rowCount();	
			$sql = $sql->fetchAll();					
					
			foreach($sql as $chave => $clientes){
				if($limite > 0){				
					$nivel += calcular_patentes($clientes['id'], --$limite);			
				}
			}
		}//Se ela retorna nivel seu tipo é nivel entao nivel pode receber seu return		
		return $nivel;
	}
?>