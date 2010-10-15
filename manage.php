<?php
include "Predis.php";
$redis = new Predis_Client();
$f = null;
if($_GET['f']) {
	switch($_GET['f']) {
		case 'list' :
			$cmdSet = $redis->createCommand('keys');
			$cmdSet->setArguments('*');
			$cmdGetReply = $redis->executeCommand($cmdSet);
			$f = "list";
		break; 
		case 'view' :
			if($_GET['do']) {
				if($_GET['do'] == 'del') {
					$cmdSet = $redis->createCommand('del');
					$cmdSet->setArguments($_GET['view']);
					$cmdGetReply = $redis->executeCommand($cmdSet);
					header("Location: ?f=list");
				}
			} else {
				$cmdGetReply = $redis->get($_GET['view']);
				$f = "view";
			}
		break;
		case 'edit' :
			$key = $_GET['view'];
			if($_POST and $key) {
				if($_POST['keyname'] != $key and $_POST['keyvalue'] === $redis->get($key)) {	# We changed the key name, but not the content, we just use RENAME
					$cmdSet = $redis->createCommand('rename');
					$cmdSet->setArguments(array($key,$_POST['keyname']));
					$cmdGetReply = $redis->executeCommand($cmdSet);
				} else if($_POST['keyname'] == $key and $_POST['keyvalue'] != $redis->get($key)) {	# We have the value changed
					$redis->set($_POST['keyname'],$_POST['keyvalue']);
				} else if($_POST['keyname'] != $key and $_POST['keyvalue'] != $redis->get($key)) {	# We have both changed
					$redis->set($_POST['keyname'],$_POST['keyvalue']);
					$cmdSet = $redis->createCommand('del');
					$cmdSet->setArguments($key);
					$cmdGetReply = $redis->executeCommand($cmdSet);
				}
				header("Location: ?f=list");
			}
			$f = "edit";
		break;
		case 'new':
			if($_POST){
				$redis->set($_POST['keyname'],$_POST['keyvalue']);
				header("Location: ?f=list");
			}
			$f = "add";
		break;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transdmin Light</title>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->
<script type="text/javascript">
function warn(val){
	if(confirm("!!!!!!!!!!!! Warning !!!!!!!!!!!!\nThis will delete all the data in this key")) {
		window.location = "?f=view&view="+val+"&do=del";
	}
}
</script>
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Transdmin Light</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet --><!-- // #end mainNav -->
        
      <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?f=list">Select Key</a></li>
                    	<li><a href="?f=new">Create a new key</a></li>
                    </ul>
                    <!-- // .sideNav -->
            	</div>    
                <!-- // #sidebar -->

                <div id="main">
					<?php
						if($f == "list"){
							echo "<h3>Select Key</h3>
	                    	<table cellpadding=\"0\" cellspacing=\"0\">";
							foreach($cmdGetReply as $data) {
								echo "	<tr>
		                                <td width=\"543\">$data</td>
		                                <td width=\"155\" class=\"action\"><a href=\"?f=view&view=$data\" class=\"view\">View</a><a href=\"?f=edit&view=$data\" class=\"edit\">Edit</a><a href=\"?f=view&view=$data&do=del\" class=\"delete\" onclick=\"warn($data)\">Delete</a></td>
		                            </tr>";
							}
							echo "</table>";
						} else if($f == "view") {
							echo "<div><pre>Key Name: ".$_GET['view']."\nSeconds left to live: NULL\n\nKey Value:\n".$cmdGetReply."\n\n\n</pre></div>";
						} else if($f == "edit") {
							echo"<form action=\"\" class=\"jNice\" method='post'>
								<h3>Edit Key ".$redis->get($key)."</h3>
			                    	<fieldset>
			                        	<p><label>Key Name:</label><input type=\"text\" name=\"keyname\" class=\"text-long\" value=\"".$key."\" /></p>
			                        	<p><label>Key Valeu:</label><textarea rows=\"1\" cols=\"1\" name='keyvalue'>".$redis->get($key)."</textarea></p>
			                            <input type=\"submit\" value=\"Submit Query\" />
			                        </fieldset>
			                    </form>";
						} else if ($f == "add"){
							echo"<form action=\"\" class=\"jNice\" method='post'>
								<h3>Add Key</h3>
			                    	<fieldset>
			                        	<p><label>Key Name:</label><input type=\"text\" name=\"keyname\" class=\"text-long\" /></p>
			                        	<p><label>Key Valeu:</label><textarea rows=\"1\" cols=\"1\" name='keyvalue'></textarea></p>
			                            <input type=\"submit\" value=\"Submit Query\" />
			                        </fieldset>
			                    </form>
			                ";
						} else {
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
						}
					?>
                </div>
                <div class="clear"></div>
            </div>
        </div>	
        <p id="footer">Feel free to use and customize it. <a href="http://www.perspectived.com">Credit is appreciated.</a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>
