        		<?php 
        			if($_POST) {
						switch($_POST) {
							case 'flushdb'	: $redis->flushdb();	 break;
						}
        			}
        		?>
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="?rf=list">Select Key</a></li>
                    	<li><a href="?rf=add&type=string">Create a new key</a></li>
                    	<li><a href="?rf=dbfunc">Database Functions</a></li>
                	</ul>
                    <!-- // .sideNav -->
         		</div>    
                <!-- // #sidebar -->
                <div id="main">
                	<form action="index.php?rf=dbfunc" method="post" class="jNice">
						<fieldset>
                   	  		<p><label>Flushdb:</label><input type="submit" value="execute" name="flushdb" /></p>
                   	  		<p><label>FlushAll:</label><input type="submit" value="execute" name="flushall" /></p>
                   	  		<p><label>Shutdown:</label><input type="submit" value="execute" name="shutdown" /></p>
                   	  		<p><label>Save:</label><input type="submit" value="execute" name="save" /></p>
                   	  		<p><label>BGReWriteAOF:</label><input type="submit" value="execute" name="bgrewriteaof" /></p>
                   	  		<p><label>BGSsave:</label><input type="submit" value="execute" name="bgsave" /></p>
                      	</fieldset>
                    </form>
                </div>
                <!-- // #main -->
                
