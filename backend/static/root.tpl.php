        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=new">Create a new key</a></li>
                    </ul>
                    <!-- // .sideNav -->
            	</div>    
                <!-- // #sidebar -->

                <div id="main">
<?php
$cmdSet = $redis->createCommand('info');
$data = $redis->executeCommand($cmdSet);
echo "<pre>
Redis Info:

Redis Version: ".$data['redis_version']."
Uptime: ".$data['uptime_in_days']." days (".$data['uptime_in_seconds']." seconds)
Memory Used: ".$data['used_memory_human']." (".$data['used_memory']." bytes)

Clients Connected: ".$data['connected_clients']."
Slaves Connected: ".$data['connected_slaves']."
</pre>";
?>
				</div>