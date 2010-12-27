<?php
# Copyright (c) 2010, Colum McGaley
# All rights reserved.

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

	session_start();
	
	include "backend/core.lib.php";
	include "backend/Predis.php";
	
	if(isset($_GET['d']) and $_GET['d'] == "true") {
		unset($_SESSION["phpmyredis.session"]);
	}
	
	if(isset($_SESSION["phpmyredis.session"])) {
		$s = array(
			"host" => $_SESSION['phpmyredis.host'],
			"port" => $_SESSION['phpmyredis.port'],
			"database" => $_SESSION['phpmyredis.database'],
			"password" => $_SESSION['phpmyredis.password']
		);
		$redis = new Predis_Client(array(
		    'host'     => $s['host'],
		    'password' => $s['password'], 
		    'database' => $s['database'], 
		));
		# Because Predis does not thorw an error when the class is created
		# We can check because this command will return an array if true
		# String if it is false
		$cmdSet = $redis->createCommand('keys');
		$cmdSet->setArguments('*');
		@$cmdGetReply = $redis->executeCommand($cmdSet);
		if(!is_array($cmdGetReply))
			echo "Login Fail";
		else
			$core->runWithConnection();
	} else {
		$core->defineStatic("login");
	}
?>