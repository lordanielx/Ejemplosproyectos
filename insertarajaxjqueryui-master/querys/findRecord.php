<?php 

	if (!empty($_POST['entity']) && !empty($_POST['id'])) {
		include '../config/configuration.php';
		$con->connect();
		$entity = $_POST['entity'];
		$id = $_POST['id'];
		$query = "SELECT * FROM $entity WHERE id = '$id'";
		$con->setQuery($query);
		$arrayResult = $con->getArrayRecord();
		$arrayRecord = [
			'id' => $arrayResult['id'],
			'name' => utf8_encode($arrayResult['nombre']),
			'email' => $arrayResult['correo'],
			'img' => $arrayResult['foto'],
			'message' => ''
		];
	}else{
		$arrayResult = ["message" => "Datos incompletos."];
	}

	echo json_encode($arrayRecord);