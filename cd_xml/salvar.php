<?php
	//XML trabalha com GET
		
	$title = $_GET["title"];
	$artist = $_GET["artist"];
	$country = $_GET["country"];	
	$company = $_GET["company"];
	$price = $_GET["price"];
	$year = $_GET["year"];		
	
	$dados = array("title" => $title,	
					"artist" => $artist,
					"country" => $country,
					"company" => $company,
					"price" => $price,
					"year" => $year);
	
	echo json_encode($dados);		
?>
	
	