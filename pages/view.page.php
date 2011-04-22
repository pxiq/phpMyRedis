<?php
	require 'pages/header.tpl.php';
	if(!isset($_GET['key']) or !execute_redis_command('exists',$_GET['view'])) {
		echo "Key not found";
		require 'pages/footer.tpl.php';
		die();
	}
	
	$type = execute_redis_command('type',$_GET['view']);
	if($type == 'string')
		$responce = execute_redis_command('get', $_GET['view']);
	else if ($type == 'hash') 
		$responce = execute_redis_command('hgetall', $_GET['view']);
		
	$time = execute_redis_command('ttl', $_GET['view']);
?>

<div id="rightside">
	<div id="content">
    	<div class="corners">
        	<div class="tl"></div>
        	<div class="tr"></div>
        </div>
        <div id="innercontent" style="min-height: 311px;">
        	<div class="pane" id="pane0" style="">
				<table class="hometable">
	              <tbody>
	                	<tr>
	                		<td><h4>Welcome to phpMyRedis</h4></td>
	                	</tr>
	                	<tr>
	                		<td>
								<pre>
Key Type: <?php echo $type; ?>
Key Expression: <?php echo $time; ?>
Key Data:
<?php echo var_dump($responce); ?>
								</pre>
							</td>
	                	</tr>
					</tbody>
	            </table>
	            
			</div>
		</div>
		<div class="corners">
	    	<div class="bl"></div>
	        <div class="br"></div>
		</div>
	</div>
</div>
<?php
	require 'pages/footer.tpl.php';
?>