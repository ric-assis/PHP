<<<<<<< HEAD
<?php 
    /**
    * <b>CalcLatLong</b> 
    * Converte a latitude e longitude do tipo DD(Distância Decimal) em GMS(Graus Minutos e Segundos)
    * calculando a distância em metros dos pontos longitudinais informados
    * 
    * Recebe as latitudes e longitudes que irão ser utilizadas para calcular a distância!
    *    
    * Ex:
    *               
    * $distanciaCalculada = new CalcLatLong(-5.253652, -40.124589, -5.451236, -40.785638);  
    * 
    * @copyright (c) 2019, Alonso Ricardo Assis a.ric.c.assi@gmail.com
    */

    class CalcLatLongModel extends Model{		
        private $distancia;        
        
        public function __construct($latitudeInicial, $longitudeInicial, $latitudeFinal, $longitudeFinal){			
            $diferencaLatELong = $this->dLatDlong(
                $this->converteLatLongEmGMS(
                    array(
                        'latIni' => $latitudeInicial, 
                        'longIni' => $longitudeInicial, 
                        'latFin' => $latitudeFinal, 
                        'longFin' => $longitudeFinal
                        )
                    )
                );	

            $this->distancia = $this->calculaDistancia($diferencaLatELong);												
        }
        
        /*
        *Converte a lat e long digitadas para o formato GMS(Graus Minutos e Segundos)
        */	
        private function converteLatLongEmGMS($cordenadasDecimais){
            
            $cordenadasGMS = array();						

            foreach($cordenadasDecimais as $chave => $cordenada){
                    $cordenadaAbsoluta = abs($cordenada);

                    $graus = floor($cordenadaAbsoluta);			
                    $min = floor(($cordenadaAbsoluta - $graus) * 60);
                    $sec = round(($cordenadaAbsoluta - $graus - $min / 60) * 3600);

                    $cordenadasGMS[$chave] = $graus.'-'.$min.'-'.$sec;
            }
            return $cordenadasGMS;
        }		

        /*
        * Para transformar GMS em MN(Milhas Nauticas) multiplica-se o grau por 60
        * O minuto por 1 então se mantem e os segundos divide por 60
        */
        private function dLatDlong($cordenadas){           
            extract($cordenadas);

            $latIni = explode('-', $latIni);
            $latFin = explode('-', $latFin);
            $longIni = explode('-', $longIni);
            $longFin = explode('-', $longFin);	

            $latSegFinal = floatval($latFin[2]) / 60;
            $latSegInicial = floatval($latIni[2]) / 60;
            $latMinFinal = floatval($latFin[1]) * 1;
            $latMinInicial = floatval($latIni[1]) * 1;
            $latGFinal = floatval($latFin[0]) * 60;
            $latGInicial = floatval($latIni[0]) * 60;

            $lonSegFinal = floatval($longFin[2]) / 60;
            $lonSegInicial = floatval($longIni[2]) / 60;
            $lonMinFinal = floatval($longFin[1]) * 1;
            $lonMinInicial = floatval($longIni[1]) * 1;
            $lonGFinal = floatval($longFin[0]) * 60;
            $lonGInicial = floatval($longIni[0]) *60;

            $milhasNauticaLatIni = floatval($latGInicial + $latMinInicial + $latSegInicial);
            $milhasNauticaLatFin = floatval($latGFinal + $latMinFinal + $latSegFinal);
            $milhasNauticaLonIni = floatval($lonGInicial + $lonMinInicial + $lonSegInicial);
            $milhasNauticaLonFin = floatval($lonGFinal + $lonMinFinal + $lonSegFinal);

            $dla = abs($milhasNauticaLatIni - $milhasNauticaLatFin);
            $dlo = abs($milhasNauticaLonIni - $milhasNauticaLonFin);


            return array("dla" => $dla, "dlo" => $dlo);	
        }

        /*Com o teorema de Pitágoras é possivel descobrir uma distancia aproximada em m entre os pontos.
        *Através da formula do triangulo retangulo se obtem a hipotenusa que é a distância procurada e 
        *a DLO distância da longitude e DLA distancia da latitude será o valor dos catetos.
        *Como o valor da diferença da longitude e latitude são em NM(Milha Nautica) multiplica-se por
        *1852 convertendo o valor em metros.
        *O valor será acrescido de um fator de ajuste de 1.15 devido as curvas das estradas nos mapas aumentando a rota
        */
        private function calculaDistancia($dLatLong){			
            
            extract($dLatLong);

            $distancia = pow(($dla * 1852), 2) + pow(($dlo * 1852), 2);
            $distancia = sqrt($distancia) * 1.15;		

            return $distancia;
        }

        /**  
        * @return float Retorna a distância em metros com a difereça entre as latitudes iniciais e finais e as 
        * longitudes iniciais e finais informadas. Ex: 293.244532232 
        */        
        public function getDistancia(){            
            return $this->distancia;
        }
    }
=======
<?php 
    /**
    * <b>CalcLatLong</b> 
    * Converte a latitude e longitude do tipo DD(Distância Decimal) em GMS(Graus Minutos e Segundos)
    * calculando a distância em metros dos pontos longitudinais informados
    * 
    * Recebe as latitudes e longitudes que irão ser utilizadas para calcular a distância!
    *    
    * Ex:
    *               
    * $distanciaCalculada = new CalcLatLong(-5.253652, -40.124589, -5.451236, -40.785638);  
    * 
    * @copyright (c) 2019, Alonso Ricardo Assis a.ric.c.assi@gmail.com
    */

    class CalcLatLongModel extends Model{		
        private $distancia;        
        
        public function __construct($latitudeInicial, $longitudeInicial, $latitudeFinal, $longitudeFinal){			
            $diferencaLatELong = $this->dLatDlong(
                $this->converteLatLongEmGMS(
                    array(
                        'latIni' => $latitudeInicial, 
                        'longIni' => $longitudeInicial, 
                        'latFin' => $latitudeFinal, 
                        'longFin' => $longitudeFinal
                        )
                    )
                );	

            $this->distancia = $this->calculaDistancia($diferencaLatELong);												
        }
        
        /*
        *Converte a lat e long digitadas para o formato GMS(Graus Minutos e Segundos)
        */	
        private function converteLatLongEmGMS($cordenadasDecimais){
            
            $cordenadasGMS = array();						

            foreach($cordenadasDecimais as $chave => $cordenada){
                    $cordenadaAbsoluta = abs($cordenada);

                    $graus = floor($cordenadaAbsoluta);			
                    $min = floor(($cordenadaAbsoluta - $graus) * 60);
                    $sec = round(($cordenadaAbsoluta - $graus - $min / 60) * 3600);

                    $cordenadasGMS[$chave] = $graus.'-'.$min.'-'.$sec;
            }
            return $cordenadasGMS;
        }		

        /*
        * Para transformar GMS em MN(Milhas Nauticas) multiplica-se o grau por 60
        * O minuto por 1 então se mantem e os segundos divide por 60
        */
        private function dLatDlong($cordenadas){           
            extract($cordenadas);

            $latIni = explode('-', $latIni);
            $latFin = explode('-', $latFin);
            $longIni = explode('-', $longIni);
            $longFin = explode('-', $longFin);	

            $latSegFinal = floatval($latFin[2]) / 60;
            $latSegInicial = floatval($latIni[2]) / 60;
            $latMinFinal = floatval($latFin[1]) * 1;
            $latMinInicial = floatval($latIni[1]) * 1;
            $latGFinal = floatval($latFin[0]) * 60;
            $latGInicial = floatval($latIni[0]) * 60;

            $lonSegFinal = floatval($longFin[2]) / 60;
            $lonSegInicial = floatval($longIni[2]) / 60;
            $lonMinFinal = floatval($longFin[1]) * 1;
            $lonMinInicial = floatval($longIni[1]) * 1;
            $lonGFinal = floatval($longFin[0]) * 60;
            $lonGInicial = floatval($longIni[0]) *60;

            $milhasNauticaLatIni = floatval($latGInicial + $latMinInicial + $latSegInicial);
            $milhasNauticaLatFin = floatval($latGFinal + $latMinFinal + $latSegFinal);
            $milhasNauticaLonIni = floatval($lonGInicial + $lonMinInicial + $lonSegInicial);
            $milhasNauticaLonFin = floatval($lonGFinal + $lonMinFinal + $lonSegFinal);

            $dla = abs($milhasNauticaLatIni - $milhasNauticaLatFin);
            $dlo = abs($milhasNauticaLonIni - $milhasNauticaLonFin);


            return array("dla" => $dla, "dlo" => $dlo);	
        }

        /*Com o teorema de Pitágoras é possivel descobrir uma distancia aproximada em m entre os pontos.
        *Através da formula do triangulo retangulo se obtem a hipotenusa que é a distância procurada e 
        *a DLO distância da longitude e DLA distancia da latitude será o valor dos catetos.
        *Como o valor da diferença da longitude e latitude são em NM(Milha Nautica) multiplica-se por
        *1852 convertendo o valor em metros.
        *O valor será acrescido de um fator de ajuste de 1.15 devido as curvas das estradas nos mapas aumentando a rota
        */
        private function calculaDistancia($dLatLong){			
            
            extract($dLatLong);

            $distancia = pow(($dla * 1852), 2) + pow(($dlo * 1852), 2);
            $distancia = sqrt($distancia) * 1.15;		

            return $distancia;
        }

        /**  
        * @return float Retorna a distância em metros com a difereça entre as latitudes iniciais e finais e as 
        * longitudes iniciais e finais informadas. Ex: 293.244532232 
        */        
        public function getDistancia(){            
            return $this->distancia;
        }
    }
>>>>>>> d9771503004b13693d35b0e3b49e5ad1b230e757
