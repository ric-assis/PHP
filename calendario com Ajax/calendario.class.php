<?php
	header("Content-type:text/html;charset=utf-8");
	date_default_timezone_set("America/Sao_Paulo");
	
	class Calendario{		
		private $data;
		private $totalDiasMes;
		private $dia1;
		private $linha;
		//private $dia1;
		private $dataInicial;
		private $dataFinal;
		
		public function __construct($ano, $mes){		
			if(!isset($ano)) $ano = date("Y"); 
			if(!isset($mes)) $mes = date("m"); 
			if((strlen($ano) == 4) && (strlen($mes) <= 2 && strlen($mes) > 0)){
				if(($ano > 1900 && $ano < 2100) and ($mes > 0 && $mes <=12)){
					$this->data = date($ano."-".$mes);
					$this->totalDiasMes = date("t", strtotime($this->data));
					$this->dia1 = date("w", strtotime($this->data));
					$this->linha = ceil(($this->totalDiasMes + $this->dia1)/7);
					$this->dia1 = -($this->dia1);
					$this->dataInicial = date("Y-m-d", strtotime($this->dia1."days", strtotime($this->data)));//A data - os dias do outro mes que iniciam o calendario ex: 02/02 -3days = 31/01 é o 1 dia que será mostrado
					$this->dataFinal = date("Y-m-d", strtotime(($this->dia1 + ($this->linha * 7)-1)."days", strtotime($this->data)));
				}else{
					echo "Valor inválido.";
				}
			}else{
				echo "Data inválida";
			}		
		}	
		
		public function getCalendario(){
			$calendario = array("data" => $this->data, 
								"totalDiasMes" => $this->totalDiasMes,
								"dia1" => date("w", strtotime($this->data)),
								"linha" => $this->linha,
								"dataInicial" => $this->dataInicial,
								"dataFinal" => $this->dataFinal
								);
			return 	json_encode($calendario);
		}

	}

?>

