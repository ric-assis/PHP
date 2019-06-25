<?php
	class Core{
		public function run(){
			$url = '/'; //Caso nao tenha parametros
			$params = array();
			
			if(isset($_GET['url'])){
				$url.= $_GET['url'];
			}
			
			if(!empty($url) && $url != '/'){
				$url = explode('/', $url);
				//Remover o primeiro registro do get que nao tem valor
				array_shift($url);
				//Agora o array[0] será o controler devido a ordem
				//Concatenando url[0] com Controller ficara o valor 0 do array que é o controler concatenado com Controler formando por ex: homeController
				$currentController = $url[0].'Controller';
				//Como o controller ja foi usado podemos remove-lo
				array_shift($url);
				
				if(isset($url[0]) && !empty($url[0])){
					$currentAction = $url[0];
					//Como já pegou a action remove deixando so os parametros
					array_shift($url);
				}else{
					$currentAction = 'index';
				}
				
				//Os valores que sobram seram os parametros 
				if(count($url) > 0){
					$params = $url;
				}
				
			}else{
				//Se nao foi enviado na no get seta o valor definido como padrao sendo homeController o controller e index o action
				$currentController = 'homecontroller';
				$currentAction = 'index';
			}
			
			//Como nao sabemos o nome de qual controler esta na variavel currentController estanciamos a variavel e o que estiver nela sera instanciado
			$controller = new $currentController();
			//Agora vamos iniciar o action que é um metodo do controller, nao podemos simplement chamar o metodo porque queremos passar parametros 
			call_user_func_array(array($controller, $currentAction), $params);
			
		}				
		
	}