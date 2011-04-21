<?php

	function get_key($key) {
		
		if($key == "")
			return false; # Break if we have no input
		
		return execute_redis_command('get',$key);
	}
	
	function set_key($key,$value) {
		
		if($key == "" or $value == "")
			return false; # Break if we have no input
		
		return execute_redis_command('set',array($key,$value));

	}
	
	
?>
