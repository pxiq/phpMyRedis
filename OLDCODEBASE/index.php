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
	
	include "functions/Predis.php";
	include "functions/site.php";
	
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
		try {
			$redis = new Predis_Client(array(
		    	'host'     => $s['host'],
		    	'password' => $s['password'], 
		    	'database' => $s['database'], 
			));
		} catch (Exception $e) {
			die("Connection Error. ".$e->getMessage());
		}
		
		if(isset($_GET['do']))
			display($_GET['do']);
		else	
			display('home');
	} else {
		if($_POST) {
			$s = $_POST;
			$fp = fsockopen($s['host'], $s['port'], $errno, $errstr, 30);
			if(!$fp) {
				echo "The Host and/or port is invalid";
			} else {
				$_SESSION['phpmyredis.session'] = true;
				$_SESSION['phpmyredis.host'] = $s['host'];
				$_SESSION['phpmyredis.port'] = $s['port'];
				$_SESSION['phpmyredis.database'] = 15;
				$_SESSION['phpmyredis.password'] = $s['password'];
				header("Location: index.php");
			}
		}
		display('login');
	}
?>