<?php
	function set_hash($key,$data) {
		global $redis;
		
		if(!is_array($data))
			die();
			
		foreach($data as $a => $b) {
			execute_redis_command('hset',array($key,$a,$b));
		}
	}
	
	function get_hash($key) {
		global $redis;
		
		return execute_redis_command('hgetall',$key);;
	}
	
	function remove_hash_value($key, $val) {
		global $redis; 
		
		execute_redis_command('hdel',array($key, $val));
	}
?>