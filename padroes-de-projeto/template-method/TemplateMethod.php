<?php
	/*O Template Method é formado pela classe abstrata com os metodos template e suas classes
	*derivadas, a fabrica Editor nao faz parte do padrao.
	*Esse padrao ajuda na reutilização de código. Eles conduzem a uma estrutura de inversão 
	*de controle “em inglês Inversion of Control IoC”ou princípio da dependência inversa,
	*comumente conhecida como “o princípio de Hollywood”, ou seja: “não nos chame, nós 
	*chamaremos você”. Isto se refere a como uma classe-mãe chama as operações de uma 
	*subclasse, e não o contrário. É o que vemos no metodo salvar.		
	*/

	abstract class TemplateMethod{
		protected $texto;
			
		public function __construct($texto){
			$this->texto = $texto;
		}		
		
		public function salvarTexto(){	//Template Method		
			
			$salvar = file_put_contents("texto.txt", $this->getTexto());
			
			if($salvar != false){
				echo "Tamanho do arquivo salvo ".$salvar."bytes"; 
			}else{
				echo "Ocorreu um erro ao salvar";
			}		
			
		}
		
		public function imprimirTexto(){ 
			$contArquivo = file_get_contents("texto.txt");			
			if($contArquivo !== false){
				return $contArquivo;
			}else{
				echo "Ocorreu um erro ao abrir o arquivo";			
			}			
		}
		
		protected abstract function getTexto();
	}