<?php
	session_start();
	
	require_once "connect.php";
	
	//date_default_timezone_set("America/Sao_Paulo");
	
	function get_client_ip(){
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress; 
	}
	
	function movimentacao($id_conta, $tipo, $valor, $pdo){
	
		$data_hist = Date("Y-m-d");
		$ip_hist = get_client_ip();
			
		$sql = $pdo->query("INSERT INTO historico(id_conta, tipo, valor, data_op, ip) VALUES('$id_conta', '$tipo', '$valor', '$data_hist', '$ip_hist')");  
	}	

?>