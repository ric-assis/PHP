<?php
	session_start();

	use core\Core;
	
	require_once __DIR__ ."/vendor/autoload.php";
	
	$core = new Core();
	$core->run();
	
	
