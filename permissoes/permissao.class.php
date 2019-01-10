<?php
	require_once "connect.class.php";
	/*Objeto responsável pela liberação do acesso dos usuarios a informacao do site
	*Com o uso de um objeto para a tarefa permit facilidade além de reutilização, 
	*caso amanhã surja uma nova restrição rapidamente a mesma é cadastrada no 
	*DB e recebida como argumento pelo objeto que irá liberar o acesso ou não aos usuários
	*/
	Class Permissao{
		/*São recebidos somente o id do usuário logado através da sessão e o tipo de permissão requisitado por esse usuários
		*o objeto decidirá se tem ou não permissão retornando true ou false*/
		public function getPermissao($id_sessao, $cod_permissao){
			$pdo = Connect::getPDO();
			$sql = $pdo->query("SELECT * FROM usuario_permisao_permissoes WHERE id_usuario = $id_sessao AND id_permissao = $cod_permissao");
			if($sql->rowCount() > 0){
				return true;
			}else{
				return false;
			}
		}		
		
	}
?>