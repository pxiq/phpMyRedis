<?php
	require 'pages/header.tpl.php';
	if($_POST) {
		if($_POST['key_type'] == 'string') {
			set_key($_POST['key_name'],$_POST['value_1']);
		} else if($_POST['key_type'] == 'hash') {
			$d = array();
			for($i = 0; $i<$_POST['count']; $i++) {
				$d = array($_POST['hash_field_'.$i], $_POST['hash_value_'.$i]);
			}
			set_hash($_POST['key_name'], $d);
		}
		
		
		if($_POST['expires_type'] != 'none')
			set_expire_time($_POST['key_name'], $_POST['expires_type'], $_POST['expire_time']);

	}
?>
<div id="rightside">
	<div id="content">
		<div class="corners">
			<div class="tl"></div>
			<div class="tr"></div>
		</div>
		<div id="innercontent" style="min-height: 311px;">
			<div class="pane" id="pane0" style="">
				<table width="750" cellpadding="0" style="margin: 5px 7px 0" class="dboverview">
					<tbody>
						<tr>
							<td>
								<div style="margin-bottom: 15px">
									<div class="inputbox">
										<h4>Add new value</h4>
										<form onsubmit="createTable(); return false">
											<div id="fieldlist">
												<div class="fieldbox">
													<table cellpadding="0" class="overview">
														<tbody>
															<tr>
																<td class="secondaryheader"> Name: </td>
																<td><input type="text" onkeyup="updateFieldName(this)" name="key_name" class="text"></td>
																<td style="padding-left: 5px" class="secondaryheader"> Type: </td>
																<td>
																	<select name="key_type" onchange="updateKeyType(this.value);">
																		<option>Select</option>
																		<option value="string">string</option>
																		<option value="hash">hash</option>
																		<option value="unsorted_set">Unsorted Set</option>
																		<option value="sorted_set">Sorted Set</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td class="secondaryheader"> Expires: </td>
																<td class="inputarea"><input type="text" name="expire_time" id="expire_time" class="text" disabled="disabled"></td>
																<td style="padding-left: 5px" class="secondaryheader"> Type: </td>
																<td class="inputarea"><select onchange="changeExpire(this.value);" name="expires_type">
																    <option value="none">no expire</option>
																    <option value="seconds">seconds</option>
																    <option value="timestamp">timestamp</option>
																  </select>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div id="fieldlist">
												<div class="fieldbox">
													<table width="370" cellpadding="0" id="add_container">
														
													</table>
												</div>
											</div>
											<!-- Submit and Add Field button -->
											<table width="370" cellpadding="0" id="fieldcontrols">
												<tbody>
													<tr>
														<td style="padding: 5px 0 4px"><input type="submit" value="Submit" class="inputbutton"></td>
														<td valign="top" align="right" style="padding: 0px 4px 0"><a style="font-size: 11px !important; display:none;" id="add_field" onclick="addField()">Add field</a>
														</td>
													</tr>
												</tbody>
											</table>
											<input type="hidden" name="count" id="count" value="1" />
										</form>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="corners">
			<div class="bl"></div>
			<div class="br"></div>
		</div>
	</div>
</div>