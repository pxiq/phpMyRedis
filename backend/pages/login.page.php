<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>login</title>
    <style type="text/css">
	* {
	margin: 0;
	padding: 0;
	font-size: 11px;
   	font-family: Verdana, sans-serif;
}

body {
    font-size: 11px;
   	font-family: Verdana, sans-serif;
	background: #fff;
}
h3 { font-size: 16px; padding: 15px 0 5px 0; }
input, textarea {
    width: 100%;
    margin: 0 0 4px 0;
    padding: 2px 2px 2px 5px;
}
#content {
    margin: 60px 0 0 40px;
}
#login_container #login_form {
    width: 200px;
}


	</style>
</head>

<body>
<div id="content">
	<div id="login_container">
		<h3>Log in:</h3><br/>
		<form id="login_form" action="?" method="post">
			<input type="text" name="host" value="host" default="host" /> <br />
			<input type="password" name="pass" value="password" default="password" /> <br />
			<input type="text" name="dbid" value="database" default="database" /> <br />
			<button>ok</button>
		</form>
	</div>
	<div id="response">
	</div>
</div>

</body>
</html>
