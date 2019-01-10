﻿<?php
	header("Content-type:text/html;charset=utf-8");
	require_once "connect.class.php";
	
	class LangPage{
		private $lang_usado; //Linguagem padr�o e tamb�m a usada que tamb�m sera chamada ao carregar
		private $file_ini; //Para armazenar um array com o conteudo do arq. ini
		private $pdo;//Recebe a classe connect 
		private $lang_db; //Para armazenar um array com o conteudo do db
		
		//Para definir uma linguagem padr�o no construtor
		public function __construct(){
			$this->lang_usado = "pt-br";
			
			/*Verifica se a sessao n�o � vazia ou nula e se existe realmente um arquivo ini com o nome da 
			sess�o. Para evitar que o usuario digite qualquer coisa no parametro e que isso seja pego*/
			if(!empty($_SESSION["lang"]) && file_exists($_SESSION["lang"].".ini")){
				$this->lang_usado = $_SESSION["lang"]; 
			}
			
			//Pega o arquivo ini com o conteudo da lang_usado
			$this->file_ini = parse_ini_file($this->lang_usado.".ini");
			
			//Pega o conteudo do DB de acordo com a linguagem
			$pdo = Connect::getPDO();
			$stm = $pdo->prepare("SELECT chave, valor FROM lang WHERE language=?");
			$stm->bindValue(1, $this->lang_usado);
			$stm->execute();
			
			if($stm->rowCount() > 0){
				foreach($stm->fetchAll() as $item){//N�o tem necessidade de usar fetch_ASSOC pois o mesmo transformaria o stm em array ja iremos faze-lo
					$this->lang_db[$item["chave"]]=$item["valor"];
				}				
			}
			
		}
		
		/*O parametro $word � a palavra procurada, e a variavel $return indica se o getLang retornar� 
		o valor encontrado no dicionario para que possa ser usado em uma variavel no index ou se ele 
		simplesmente exibir� no local indicado no index com o echo, para retornar basta chamar getLang
		passando true como parametro $return*/
		public function getLang($word, $return = false){
			$text = $word;//Recebe a palavra do index para verifica-la no dicionario .ini
			
			/*If $file_ini[$word] existe ent�o pega o conteudo com a chave equivalente a palavra repassada,
			se encontrar, text agora ter� o valor armazenado na chave $word e se nao encontrar devolve o valor antigo de $word*/
			if(isset($this->file_ini[$word])){
				$text = $this->file_ini[$word];				
			}elseif(isset($this->lang_db[$word])){
				$text = $this->lang_db[$word];
			}				
			
			//Retorna text ou imprime na tela			
			if($return){
				return $text;
			}else{
				echo $text;
			}
				
		}
		
		//Retorna a linguagem que est� sendo usada
		public function getLangUsado(){
			return $this->lang_usado;
		}		
	}
?>