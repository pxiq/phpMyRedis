<?php
	session_start();
	
	include "backend/core.php";
	include "backend/Predis.php";
	if(isset($_SESSION["phpmyredis.session"])) {
		$s = array(
			"host" => $_SESSION['phpmyredis.host'],
			"port" => $_SESSION['phpmyredis.port'],
			"database" => $_SESSION['phpmyredis.database'],
			"password" => $_SESSION['phpmyredis.password']
		);
		$redis = new Predis_Client(array(
		    'host'     => $s['host'],
		    'port'	   => $s['port'], 
		    'password' => $s['password'], 
		    'database' => $s['database'], 
		));
	}
?>