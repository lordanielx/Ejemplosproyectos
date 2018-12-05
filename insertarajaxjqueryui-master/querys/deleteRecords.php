<?php 
	include '../config/configuration.php';
	$con->connect();
	if (!empty($_GET['table'] && $_GET['id'])) {
		$table = $_GET['table'];
		$id = $_GET['id'];
		$query = "DELETE FROM $table WHERE id = $id";
		$con->setQuery($query);
		$message = "Registro eliminado";
	}
	else{
		$message = "RNo ha suminstrado suficinete información";
	}
	echo "<script>alert('$message'); window.location='../pages/users.php';</script>";

 ?>