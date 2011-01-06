<?php
	class core {
		var $error = null;
		/*
		
		 */
		public function defineStatic($page) {
			switch($page) {
				case 'login': 
					if($_POST)
						$this->doRedisLogin($_POST);
					else
						$this->template('login');	
				break;
			}
		}	
		public function doRedisLogin($s){
			# Check if the host is valid
			$fp = @fsockopen($s['host'], $s['port'], $errno, $errstr, 30);
			if(!$fp) {
				$this->error = "The Host and/or port is invalid";
				$this->template("login");
			} else if(!is_numeric($s['database'])){
				$this->error = "The Database must be a number (try 1)";
				$this->template("login");
			} else {
				$_SESSION['phpmyredis.session'] = true;
				$_SESSION['phpmyredis.host'] = $s['host'];
				$_SESSION['phpmyredis.port'] = $s['port'];
				$_SESSION['phpmyredis.database'] = $s['database'];
				$_SESSION['phpmyredis.password'] = $s['password'];
				header("Location: index.php");
			}
		}
		public function template($t) {
			global $redis; # Posiable a security issue. Will adress on a later release
			include 'static/header.tpl.php'; # That was very werid
			include 'static/'.$t.'.tpl.php';
			include 'static/footer.tpl.php';
		}
		
		// Function Router
		public function runWithConnection() {
			if(!isset($_GET['rf'])) {
				$this->template('root');
			} else {
				switch ($_GET['rf']) {
					case 'list'	: $this->template('list');				break;
					case 'view' : $this->template('view');				break;
					case 'edit' : $this->template('edit');				break;
					case 'add' : $this->template('add');				break;
					case 'changeSort' : $this->template('changeSort'); 	break;
				}
			}
		}
		// Functions
		
	}
	
	$core = new core();
?>