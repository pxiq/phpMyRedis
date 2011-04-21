        		<?php 
        			if(!$_GET['step'] or $_GET['step'] != 1 or $_GET['step'] != 2):        			
        		?>
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=add&type=string">Create a new key</a></li>
                    	<li><a href="?rf=dbfunc">Database Functions</a></li>
                	</ul>
         		</div>    
                <div id="main">
                	<div id="cmdmsg" style="color:red; font-size:20px;"></div>
                	<form action="index.php?rf=dbfunc&step=1" method="post" class="jNice">
						<fieldset>
							<script type="text/javascript">
								function err(e) {
									document.getElementById('cmdmsg').innerHTML = 'Warning! You should refer to the <a href="http://http://redis.io/commands/'+ e.value +'">documentation</a> before running this command!';
								}
							</script>
						  <select name="execute" id="execute" onchange="err(this);">
						    <option value="">Select Command</option>
						    <option value="flushall">Flush Database</option>
						    <option value="flushdb">Flush Table</option>
						    <option value="shutdown">Shutdown</option>
						    <option value="save">Save</option>
						    <option value="bgrewriteaof">BGReWriteAOF</option>
						    <option value="bgssave">BGSsave</option>
						  </select>
                   	  		<p><input type="submit" value="execute" name="bgsave" /></p>
                      	</fieldset>
                    </form>
                </div>
        		<?php
        			elseif($_GET['step'] == 2 and $_POST):
        		?>
        			
        		<?php
        			if($_POST) {
						switch($_POST) {
							case 'flushdb'	: $redis->flushdb();	 break;
						}
        			}
        		?>