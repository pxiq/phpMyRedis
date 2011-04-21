        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=add&type=string">Create a new key</a></li>
                    </ul>
                    <!-- // .sideNav -->
            	</div>    
                <!-- // #sidebar -->

                <div id="main">
                	<pre>
<?php
if(!isset($_GET['view']))
	header("Location: ?rf=list");
	
if($redis->type($_GET['view']) == 'string') {
	$cmdGetReply = $redis->get($_GET['view']);
	echo "Key Name: ".$_GET['view']."\nSeconds left to live: NULL\n\nKey Value:\n".$cmdGetReply."\n\n\n";	
} else if($redis->type($_GET['view']) == 'list') {
	$c = $redis->llen($_GET['view']);
	$cmdGetReply = $redis->lrange($_GET['view'],0,$c);
	$j = count($cmdGetReply);
	echo "Key Name: ".$_GET['view']."\n";
	echo "Key Length: $c\n";
	for($i = 0; $i<$j; $i++) {
		echo "[$i] => '".$cmdGetReply[$i]."'\n";
	}
	
}
	

?>
					</pre>
				</div>