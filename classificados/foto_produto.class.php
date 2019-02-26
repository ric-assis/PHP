<?php
	require_once "redimensiona_img.class.php";
	
	class FotoProduto{
		private $ft_name;
		private $ft_size;
		private $ft_error;
		private $ft_type;
		private $ft_tmpName;
		private $quant_fotos;
		private $nome_do_arquivo = null;
		
		public function __construct(){	
			/*Verificar se existe pelo menos 1 arquivo
			*A função Global _FILES gera um array em branco com a variavel size contendo 4 bytes
			*devido a isso ao contarmos qualquer um dos atributos de _FILES mesmo nao tendo ocorrido
			*o envio de mensagem ele contabiliza 1 envio por isso usar o loop abaixo para verificar 
			*se o valor nao está vazio, evitando conta-ló*/
			$cont = 0;
			while($cont < count($_FILES["fotos"]["tmp_name"])){
				if($_FILES["fotos"]["tmp_name"][$cont] != "")
					++$cont;
				else
					break;			
			}
			
			$this->quant_fotos = $cont;
			
			if($this->quant_fotos > 0){								
				$this->ft_name = $_FILES["fotos"]["name"];								
				$this->ft_size = $_FILES["fotos"]["size"];
				$this->ft_error = $_FILES["fotos"]["error"];
				$this->ft_type = $_FILES["fotos"]["type"];
				$this->ft_tmpName = $_FILES["fotos"]["tmp_name"];		
		
				//Tipos de extensões aceitas e tamanho máximo do arquivo 1024bytes * 2048bytes = 2Mb
				$tipo = array("image/png", "image/jpg", "image/jpeg", "image/pjpeg");
				$tamanho = 1024 * 2048;
				
				//Verificação de extensões					
				if(!in_array(0, $this->ft_error)){	
					echo "<script> alert('Ocorreu um erro no upload dos arquivos.')</script>";
					header("refresh:0");
				}else{			
					//Verifica se o tipo do arquivo está no array tipo se sim conta + 1 , o cont não pode ser menor q quant_fotos
					for($i = 0, $cont=0; $i < $this->quant_fotos; $i++){
						if(in_array($this->ft_type[$i],$tipo)){
							$cont++;					
						}
					}					
					
					//Se pelo menos 1 arquivo teve extensão diferente se exibe o alert recarrega a página e para o fluxo do arquivo php 
					if($cont < $this->quant_fotos){
						echo "<script> alert('Tipo de arquivo inválido as extensões permitidas são jpg, jpeg, png e pjpeg.')</script>";	
						header("refresh:1");
						exit();				
					}				
					
					//Verificação de tamanhos
					// Se um dos arquivos for maior que tamanho incrementa cont
					for($i = 0, $cont = 0; $i < $this->quant_fotos; $i++){					
						if($this->ft_size[$i] > $tamanho){
							$cont++;					
						}					
					}
					//Se cont for > 0 pelo menos um arquivo é maior que 2mb
					if($cont > 0){			
						echo "<script> alert('O tamanho de um ou mais arquivos excede 2MB.')</script>";
						header("refresh:1");
						exit();
					}				
					
					//Se nenhuma das condições anteriores foi executada o arquivo é criado com um novo nome e movido para a pasta img
					$this->nome_do_arquivo = array();
					for($i = 0; $i < $this->quant_fotos; $i++){
						$name_f = explode(".", $this->ft_name[$i]);
						$ext = end($name_f);
						$this->nome_do_arquivo[$i] = "img/".md5(rand(0,9999).time()).".".$ext; 
						move_uploaded_file($this->ft_tmpName[$i], $this->nome_do_arquivo[$i]);
						//Passa o arquivo para a funcao gd_img redimensionalo e adicionar marga d'agua
						gd_img($this->nome_do_arquivo[$i]);							
					}	
				}
			}else{
				/*Caso não sejá enviado foto do produto uma imagem é colocada no lugar para todos os anuncios 
				*economizando espaço, pois todos sem foto aponta para a mesma imagem*/
				$this->nome_do_arquivo[0] = "img/sem_foto.png";
			}
		}	
				
		public function getFotoProduto(){
			return $this->nome_do_arquivo;
		}
		
	}
