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
if(!isset($_GET['view']))
	header("Location: ?rf=list");
	
$cmdGetReply = $redis->get($_GET['view']);
echo "<div><pre>Key Name: ".$_GET['view']."\nSeconds left to live: NULL\n\nKey Value:\n".$cmdGetReply."\n\n\n</pre></div>";
?>
				</div>