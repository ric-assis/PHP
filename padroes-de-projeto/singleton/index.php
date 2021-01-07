<?php

	require_once 'singleton.php';
	
	$adm = Administrador::getAdm();
	$adm->setNomeAdm('Alonso');
	
	echo 'Adminstrador: '.$adm->getNomeAdm().'<br/>';
	
		
	$adm2 = Administrador::getAdm();
		$adm2->setNomeAdm('Ricardo');
	
	echo 'Adminstrador 2: '.$adm2->getNomeAdm().'<br/>';
	
	echo 'Adminstrador: '.$adm->getNomeAdm().'<br/>';