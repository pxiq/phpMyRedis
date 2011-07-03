<?php
	// I could not figure out a batter name

	function execute_redis_command($a,$b = false) {
		global $redis;
		$cmdSet = $redis->createCommand($a);
		
		if(is_array($b) or $b != false)
			$cmdSet->setArguments($b);
		
		return $redis->executeCommand($cmdSet);
	}
	
	function check_update($ver) {
		$file = @fopen ("http://api.archangel.io/version.php/phpMyRedis/".$ver, "r"); //GTFOMF
		if (!$file) {
			echo "Unable to connect to api.archangel.io";
		} else {
			while (!feof ($file)) {
				//$file is the file
			}
			fclose($file);	
		}
	}
	
	function display($what) {
		include 'pages/'.$what.'.page.php';
	}
	
	function set_expire_time($key, $type, $time) {
		global $redis;
		
		
	}
?>


