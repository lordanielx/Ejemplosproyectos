<?php 
	// Modelo de delete con Ajax
	include '../config/configuration.php';
	$con->connect();
	if (!empty($_POST['entity']) && !empty($_POST['id'])) {
		$entity = $_POST['entity'];
		$id = $_POST['id'];
		$query = "DELETE FROM $entity WHERE id = $id";
		$con->setQuery($query);
		if ($con->getQuery()) {
			$message = "Registro eliminado";
		}else{
			$message = "Registro no se pudo eliminar";
		}
		
	}
	else{
		$message = "No ha suminstrado suficinete información";
	}
	echo json_encode(['message' => $message]);

