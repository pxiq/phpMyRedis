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

	class phpMyRedis {
		protected $connection = null;
		private function loadFunction($f) {
			$p = _PATH_ . 'functions/'.$f.'.interface.php';
			if(!file_exists($p))
				self::Error();
			
			if(require_once $p)
				echo "Loaded";
		}
		
		private function processLogin($data) {
			try {
				$dummy = new Predis_Client(array(
	    			'host'     => '127.0.0.1', 
	    			'port'     => 6379, 
	    			'database' => 0,
					#'password' => ''
				));
			} catch(exception $e) {
				echo "Login Failed. ".$e->getMessage();
			}
			//unset($dummy);
			
			header("Location: ?r=dashboard");
		}
		
		private function validateConnection($data) {
			try {
				$dummy = new Predis_Client($data);
			} catch(exception $e) {
				die('Redirect to login page, as connection is invalid');
			}
			if(isset($dummy))
				self::$connection = $dummy;
		}
		
		private function processURL($url) {
			if($url == "" or !isset($url))
				$url == "dashboard";
			self::loadFunction($url);
			$f = $url.'Interface';
			$f::run();
		}
		
		public static function newSession() {
			if(!is_array($_SESSION['phpMyRedis.LoginInfo']) or !isset($_SESSION['phpMyRedis.LoginInfo'])) { # We do not have valid login info
				self::loadFunction('template');
				if($_POST)
					self::processLogin($_POST);
				TemplateInterface::Display('login');
			} else {
				self::validateConnection($_SESSION['phpMyRedis.LoginInfo']);
				self::processURL($_GET['r']);
			}
		}
	}
?>