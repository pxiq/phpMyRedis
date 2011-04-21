<?php
	
	function database_list_keys($pattern) {
		
		if($pattern == "")
			$pattern = "*";
		
		return execute_redis_command('keys','*');
	}
?>
