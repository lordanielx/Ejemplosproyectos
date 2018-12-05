<?php 
	
	$query = "SELECT * FROM usuario";
	$con->setQuery($query);
	$nreg = $con->totalRecords();
 ?>