<?php 
	/**
	 * Clase que va a serla pagina maestra.
	 */
	class MasterPage 
	{
		
		function __construct()
		{
			
		}

		function __destruct()
		{
			
		}

		public function getHead()
		{
			include '../pages/templates/head.php';
		}
		public function getHeader()
		{
			include '../pages/templates/header.php';
		}
		public function getNav()
		{
			include '../pages/templates/nav.php';
		}
		public function getScripts()
		{
			include '../pages/templates/scripts.php';
		}
	}
 ?>