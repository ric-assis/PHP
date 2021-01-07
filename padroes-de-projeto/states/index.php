<?php

	require_once "Tocador.php";
	
	$tocar = new Tocador(new Pendrive());
	
	echo $tocar->play()."<hr/>";
	echo $tocar->pause()."<hr/>";
	echo $tocar->stop()."<hr/>";
	
	
	echo $tocar->play()."<hr/>";	
	echo $tocar->stop()."<hr/>";
	
	
	echo $tocar->play()."<hr/>";