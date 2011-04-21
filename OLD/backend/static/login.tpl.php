        		<div id="sidebar">
                	<ul class="sideNav">
                		<li><a href="#" class="active">Login</a></li>
                	</ul>
                    <!-- // .sideNav -->
         		</div>    
                <!-- // #sidebar -->
                <div id="main">
                	<div style="color:red"><?php if($this->error) echo $this->error; ?></div>
                	<form action="index.php" method="post" class="jNice">
						<h3>Login</h3>
						<fieldset>
                   			<p>
                   			  <label>Redis Host: </label><input type="text" class="text-long" id="host" name="host" value="127.0.0.1" />
                   				<input type="text" class="text-long" id="host" name="port" style="width:60px !important" value="6379" />
                   			</p>
                   	  		<p><label>Redis Database:</label><input type="text" class="text-long" id="database" name="database" value="1" /></p>
                   	  		<p><label>Database Password:</label><input type="password" class="text-long" id="password" name="password" /></p>
                   	  		<input type="submit" value="Login" />
                      	</fieldset>
                    </form>
                </div>
                <!-- // #main -->
                
