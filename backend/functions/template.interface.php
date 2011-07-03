<?php
	class TemplateInterface {
		public static function Display($name) {
			$file = _PATH_ . 'pages/'.$name.'.page.php';
			if(!file_exists($file))
				phpMyRedis::Error();
			require_once $file;
		}
	}
?>