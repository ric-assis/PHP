<?php
	class Core{
		public function iniciar(){
			$url = '/';
			$parametros = array();
			
			if(isset($_GET['url'])){
				$url.=$_GET['url'];
			}
			
			if(!empty($url) && $url != '/'){
				$url = explode('/', $url);
								
				array_shift($url);
				
				$controllerAtual = $url[0].'Controller';
				
				array_shift($url);
							
				if(isset($url[0]) && !empty($url[0])){
					$actionAtual = $url[0];
					
					array_shift($url);
				}else{
					$actionAtual = 'index';
				}					
				
				if(count($url) > 0){
					$parametros = $url;						
				}				
								
			}else{
				$controllerAtual = 'HomeController';
				$actionAtual = 'index';
			}
			
			$controller = new $controllerAtual();
			
			call_user_func_array(array($controller, $actionAtual), $parametros);				
			
		}
	}