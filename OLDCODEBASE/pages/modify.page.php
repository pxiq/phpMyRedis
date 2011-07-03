<?php
	require 'pages/header.tpl.php';
?>
        <div id="rightside">
            <div id="content">
                <div class="corners">
                    <div class="tl"></div>
                    <div class="tr"></div>
                </div>
                <div id="innercontent" style="min-height: 311px;">
                    <div class="pane" id="pane0" style="">
			<form>
				<table class="hometable">
				    <tbody>
					<tr>
					    <td><h4>Did you know...</h4></td>
					</tr>
					<tr>
					    <td style="padding: 0 0 10px 10px;">
						<?php
							$type = execute_redis_command('type',$_GET['key']);
						?>
	Type: <?php echo $type;?><br />
	TTL: 				
						<table class="keyboardtable">
							<tbody>
								<?php
									if($type == 'string') {
										$r = execute_redis_command('get',$_GET['key']);
										echo "<tr>
											<th>Value</th>
											<th>$r</th>
										</tr>";
									} elseif($type == 'hash') {
										$r = execute_redis_command('hgetall',$_GET['key']);
										foreach($r as $a => $b) {
											echo "<tr>
												<th style='width:200px'>$a</th>
												<th style='padding:0;'><input type='text' value='$b' id='".$_GET['key']."_$a' onclick='edit_hash(this.id);' style='border:none; width:100%;' /></th>
											</tr>";
										}
									} elseif($type == 'list') {
									} elseif($type == 'set') {
									}
								?>
								      
							</tbody>
						</table>
						<?php
                                            ?>
					</td>
				    </tr>
					<tr>
						<td>
							Save Edits?
						</td>
					</tr>
				</tbody>
			    </table>
			
			</form>
                    </div>
                </div>
                <div class="corners">
                    <div class="bl"></div>
                    <div class="br"></div>
                </div>
            </div>
        </div>
<?php
	require 'pages/footer.tpl.php';
?>