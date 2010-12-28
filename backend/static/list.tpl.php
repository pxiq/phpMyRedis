			    <div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=new">Create a new key</a></li>
                    	<li><a href="?rf=list&keys=post" title="Allows you to change the prameters to the keys command">Change Sort</a></li>
                    </ul>
                    <!-- // .sideNav -->
            	</div>    
                <!-- // #sidebar -->

                <div id="main">
                	<h3>Select A Key</h3>
                	<table cellpadding="0" cellspacing="0">
<?php
$cmdSet = $redis->createCommand('keys');
if(isset($_POST['keys.manualInput'])) {
	$cmdSet->setArguments($_POST['keys.manualInput']);
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