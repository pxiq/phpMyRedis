<?php
	abstract class DashboardInterface{
		public function run() {
			TemplateInterface:Display('dashboard');
		}
	}
?>