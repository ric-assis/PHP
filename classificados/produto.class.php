<?php
	require_once "connect.class.php";
	require_once "foto_produto.class.php";
	
	class Produto{
		private $titulo;
		private $categoria;
		private $estado;
		private $valor;
		private $descricao;			
		private $fotos; 
		
		public function __construct($dados_literais){						
			$this->titulo = $dados_literais["titulo"];
			$this->categoria = $dados_literais["categoria"];
			$this->estado = $dados_literais["estado"];
			$this->valor = $dados_literais["valor"];
			$this->descricao = $dados_literais["descricao"];			
			$this->fotos = new FotoProduto();	
			
			//Caso o produto seja novo o site da um desconto de 5% ao comprador e ressarci o vendedor
			if($this->estado == "Novo"){
				$this->valor = (floatval($this->valor) - ((5/100)) * floatval($this->valor));
				$this->estado = 1;
			}else{
				$this->estado = 0;
			}
			
			
			//Conecta na tabela categoria para verificar se a mesma existe, caso sim, recupera seu id
			$pdo = Connect::getPDO();
			$stm = $pdo->prepare("SELECT id FROM categoria WHERE categoria = ?");
			$stm->bindValue(1, $this->categoria);
			$stm->execute();
			if($stm->rowCount() > 0){
				$stm = $stm->fetch(PDO::FETCH_ASSOC);
				$this->categoria = $stm["id"];
			}			
		}
		
		public function getTitulo(){
			return $this->titulo;			
		}
		
		public function getCategoria(){
			return $this->categoria;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function getValor(){			
			return $this->valor;
		}
		
		public function getDescricao(){
			return $this->descricao;
		}
		
		public function getFotos(){			
			return $this->fotos->getFotoProduto();			
		}
		
	}

