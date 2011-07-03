<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/REC-html40/strict.dtd">

<html xml:lang="en" version="-//W3C//DTD XHTML 1.1//EN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>phpMyRedis Login</title>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link href="frontend/common.css" rel="stylesheet" type="text/css" />
<link href="frontend/navigation.css" rel="stylesheet" type="text/css" />
<link href="frontend/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: none">
	<div id="container">

	<div id="loginform">
		<form name="loginform" method="post">
		<div class="loginspacer">
					<table cellpadding="0" id="tb">
			<tr>
			<td colspan="2"><div class="loginheader"><h3><strong>Login</strong></h3><a href="http://www.sqlbuddy.com/help/" title="Help">Help!</a></div></td>
			</tr>
						<tr>

			<td class="field"></td>
			<td>
			
			</td>
			</tr>

						</table>
			<table cellpadding="0" id="REGOPTIONS">
			<tr>
			<td class="field">Host:</td>
			<td><input type="text" class="text" name="host" value="127.0.0.1" /></td>
			</tr>
			<tr>
			<td class="field">Port:</td>

			<td><input type="text" class="text" name="port" value="6379" /></td>
			</tr>
			<tr>
			<td class="field">Password:</td>
			<td><input type="password" class="text" name="password" id="PASS" /></td>
			</tr>
			</table>
			<table cellpadding="0" id="LITEOPTIONS" style="display: none">

			<tr>
			<td class="field">Database:</td>
			<td></td>
			</tr>
			</table>
			<table cellpadding="0">
			<tr>
			<td class="field"></td>

			<td><input type="submit" class="inputbutton" value="Submit" /></td>
			</tr>
			</table>
					</div>
		</form>
	</div>
	</div>
</body>
</html>