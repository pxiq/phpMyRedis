        		<?php 
        			if($_POST) {
        				$type = $_GET['type'];
        				if($type == 'string') {
        					if($_POST['key'] == '') {
        						$error ="No key name entered";
        					} else {
        						$redis->set($_POST['key'],$_POST['value']);
        						header("Location: ?rf=view&view=".$_POST['key']);
        					}
        				} else if($type == 'list') {
        					
        				}
        			}
        		?>
        		<div id="sidebar">
                	<ul class="sideNav">
                		<li><a href="?rf=add&type=string" class="active">Add String</a></li>
                		<li><a href="?rf=add&type=list" class="active">Add List</a></li>
                	</ul>
                    <!-- // .sideNav -->
         		</div>    
                <!-- // #sidebar -->
                <div id="main">
                	<form action="index.php" method="post" class="jNice">
                		<?php 
                			if($_GET['type'] == 'string'):
                		?>
						<h3>Add String</h3>
						<fieldset>
                   	  		<p><label>Key:</label><input type="text" class="text-long" id="key" name="key" /></p>
                   	  		<p><label>Value:</label><input type="text" class="text-long" id="value" name="value" /></p>
                   	  		<input type="submit" value="Add" />
                      	</fieldset>
                      	<?php 
                      	elseif ($_GET['type'] == 'list'):
                      	?>
						<h3>Add List</h3>
						<fieldset>
                   	  		<p><label>Key Name:</label><input type="text" class="text-long" id="key" name="key" /></p>
                   	  		<p><label>Value:</label><input type="text" class="text-long" id="value" name="value" /></p>
                   	  		<input type="submit" value="Add" />
                      	</fieldset>                      	
                      	<?php 
                      	endif;
                      	?>
                    </form>
                </div>
                <!-- // #main -->
                
