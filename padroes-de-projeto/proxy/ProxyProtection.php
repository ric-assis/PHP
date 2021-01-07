<?php
	/*Os tipos de proxy:
	Protection Proxy: esse é o tipo de proxy que utilizamos no exemplo. 
	Eles controlam o acesso aos objetos, por exemplo, verificando se quem 
	chama possui a devida permissão.
	Virtual Proxy: mantem informações sobre o objeto real, adiando o 
	acesso/criação do objeto em si. É utilizado um Proxy que guarda algumas informações 
	sobre uma imagem, não necessitando criar a imagem em si para acessar parte de suas informações.
	Remote Proxy: fornece um representante local para um objeto em outro espaço de endereçamento. 
	Por exemplo, considere que precisamos codificar todas as solicitações enviadas ao banco 
	, utilizaríamos um Remote Proxy que codificaria a solicitação e só então faria o envio.
	Smart Reference: este proxy é apenas um susbtituto simples para executar ações adicionais quando o objeto 
	é acessado, por exemplo para implementar mecanismos de sincronização de acesso ao objeto original.
	Proxy de registro: Este é quando você quer manter um histórico de pedidos ao objeto do serviço.(nosso log)
	*/
	
	class ProxyProtection extends ConcreteDownload{		
		private $user;
		private $senha;
		
		public function __construct($user, $senha){		
			$this->user = $user;
			$this->senha = $senha;
		}
				
		public function getDownload(){			
			if($this->verificaPermissao() == true){	
				return parent::getDownload();					
			}else{				
				return null;
			}
		}			
		
		private function verificaPermissao(){
			if($this->user = "admin" && $this->senha == "1234"){
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo copiado\n", FILE_APPEND);				
				return true;
			}else{
				file_put_contents("log.txt", date("d/m/Y h:i:s")." - Arquivo não copiado - senha incorreta\n", FILE_APPEND);
				return false;
			}
		}
	}