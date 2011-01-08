			    <div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=changeSort" title="Allows you to change the prameters to the keys command">Change Sort</a></li>
                    	<li><a href="?rf=add&type=string">Create a new key</a></li>
                    </ul>
                    <!-- // .sideNav -->
            	</div>    
                <!-- // #sidebar -->

                <div id="main">
                	<h3>Select A Key</h3>
                	<table cellpadding="0" cellspacing="0">
<?php
$cmdSet = $redis->createCommand('keys');
if(isset($_POST['keys_manualInput'])) {
	$cmdSet->setArguments($_POST['keys_manualInput']);
	echo "	<tr>
		<td width=\"543\">Quering ".$_POST['keys_manualInput']."</td>
		<td width=\"155\" class=\"action\"></td>
	</tr>";	
} else {
	$cmdSet->setArguments('*');
}
$cmdGetReply = $redis->executeCommand($cmdSet);

foreach($cmdGetReply as $data) {
	echo "	<tr>
		<td width=\"543\">$data</td>
		<td width=\"155\" class=\"action\"><a href=\"?rf=view&view=$data\" class=\"view\">View</a><a href=\"?rf=edit&edit=$data\" class=\"edit\">Edit</a><a href=\"?rf=del&del=$data\" class=\"delete\" onclick=\"warn($data)\">Delete</a></td>
	</tr>";
}
?>
					</table>
				</div>