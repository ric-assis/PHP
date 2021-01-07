<?php
	abstract class abstractDAO{
				
		abstract public function getPrimeiroReg();
		
		abstract public function getUltimoReg();
		
		abstract public function getAnteriorReg($idAtual);
		
		abstract public function getProximoReg($idAtual);
		
		abstract public function Salvar(Object $obj);

	}