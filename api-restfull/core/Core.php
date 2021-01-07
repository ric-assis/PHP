<?php	
	namespace core;		
	
	ini_set('display_errors',"off");
	error_reporting(E_ALL);
	ini_set('error_log', './api_restfull_erro.log');
	
    class Core{
        public function iniciar(){
            $url = '/';
            $parametros = array();

            if(isset($_GET['url'])){                
                $url.=$_GET['url'];  
            }

           $url = $this->routerUrl($url);
            
            if(!empty($url) && $url != '/'){
                $url = explode('/', $url);

                array_shift($url);

                $controllerAtual = ucwords($url[0]).'Controller';

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
            
			//Adiciona o namespace no controller chamado
			$prefixo = 'controller\\';

            /*if(!file_exists('controller/'.$controllerAtual.'.php') || !method_exists($prefixo.$controllerAtual, $actionAtual)) {                				
				$controllerAtual = 'Erro404Controller';				
                $actionAtual = 'index';				
            }*/
			
			$newController = $prefixo.$controllerAtual;
			
            $controller = new $newController();
	
            call_user_func_array(array($controller, $actionAtual), $parametros);				
        } 
        
        public function routerUrl($url){
        /*
        * Através de expressoes regulares os valores do routers será testado para ver se bate com a url recebida
        */
        global $router;              
            
        //Procura no router tudo que está entre{} e substitui por ([a-z0-9-]{1,}) transformando a chave do array global em uma expressao regular
        foreach($router as $chave => $novaUrl){
            $padrao = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $chave);
              
            //Procura dentro de padrão pela nossa url se achar algo armazena em matches  
            if(preg_match('#^('.$padrao.')*$#i', $url, $matches) === 1){                    
                //Os primeiros 2 valores armazenados no match sao irrelevantes repete a url toda                
                array_shift($matches);
                array_shift($matches);                               
                
                //procura os valores dentro da {} na $chave do array e armazena em $m					
                $itens = array();                
                if(preg_match_all('(\{[a-z0-9]{1,}\})', $chave, $m)){
                    //Retira as {} trocando por nada em m[0] e salvando em itens                    
                    $itens = preg_replace('(\{|\})', '', $m[0]);
                }	
               
                //Substitui os valores referentes a chave pelo valor de matches digitado na url
                $arg = array();
                foreach($matches as $chave => $match){
                    $arg[$itens[$chave]] = $match; 
                }
                 
                //Substitui os valores do array {:titulo} por argValor em novaUrl
                foreach($arg as $argChave => $argValor){
                    
                    $novaUrl = str_replace(':'.$argChave, $argValor, $novaUrl);
                }
                                                
                $url = $novaUrl;                 
                break;
            }
        }
       
        return $url;            
        }
    }